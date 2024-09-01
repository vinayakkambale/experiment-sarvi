<?php

namespace App\Http\Controllers;

use App\Models\UserData;
use App\Models\UserProfile;
use App\Models\DropdownData;
use App\Models\VehicleData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserDataController extends Controller
{
    // Handles Registered users and Login users fetched data
    public function handleRegisteredUsersData()
    {
        $data['users'] = UserData::getAllRegisteredUsers(); // store all registered users data

        $profiles = []; // empty array for storing profiles
        
        foreach($data['users'] as $user) {
            $email_id = $user['email_id'];
            $profile_data = UserProfile::getUserProfileDataByEmail($email_id); // Get the User Profile email to match with the registered users email id
            
            // Check profile data is exist or not
            if($profile_data) {
                // If it's exist
                $profiles[$email_id] = $profile_data->toArray();
            }
        }
        
        $data['profiles'] = $profiles;
        
        if (isset($profiles[$email_id])) {
            $data['countries'] = DropdownData::fetchUserSelectedCountries($profiles[$email_id]['country']);
            
            if (isset($data['countries'])) {
                $data['states'] = DropdownData::fetchUserSelectedStates($profiles[$email_id]['state']);
            }
        
            if (isset($data['states'])) {
                $data['districts'] = DropdownData::fetchUserSelectedDistricts($profiles[$email_id]['district']);
            }
        }

        return view('registered_users_table', $data);
    }
    
    // Handle add new user form
    public function addNewUserData(Request $request)
    {
        $page_data = [];
        
        if ($request->isMethod('post')) {
            $request->validate([
                'user_name' => 'required|string',
                'email_id' => 'required|email',
            ]);

            // Generate a random password to add a new user with a password
            $password = Str::random(10); // Generates a 10-character random string

            $user_data = [
                'user_name' => $request->input('user_name'),
                'email_id' => $request->input('email_id'),
                'password' => bcrypt($password), // Hash the password before storing
                'created_at' => now()
            ];

            // Data Storage Status
            if (UserData::create($user_data)) {
                $page_data['status_message'] = 'New User Added Successfully!';
            } else {
                $page_data['status_message'] = 'Failed to add a user';
            }
        }

        return view('add_new_users', $page_data);
    }
    
    // Handle different actions for vehicle data
    public function handleUsersVehicleData(Request $request, $action, $id = null)
    {
        switch ($action) {
            case 'view':
                $user_data = DB::connection('mentor_db')->table('vehicle_data')->get();
                return view('users_vehicle_data.view_vehicles_data', [
                    'user_vehicle_data' => $user_data,
                ]);
    
            case 'add':
                if ($request->isMethod('post')) {
                    // Handle form submission
                    $validated = $request->validate([
                        'new_user_id' => 'required',
                        'vehicle_name' => 'required',
                        'vehicle_number' => ['required', 'regex:/^[A-Z]{2}\d{2}[A-Z]{2}\d{4}$/'],
                    ], [
                        'vehicle_number.regex' => 'Please enter a valid number in the format XX00XX0000.'
                    ]);
                    
                    $user = DB::connection('mentor_db')->table('register_form')->where('id', $request->input('new_user_id'))->first();
                    
                    
                    if (!$user) {
                        return back()->withErrors(['status_message' => 'Failed to add - User doesn\'t exist!']);
                    }
                    
                    VehicleData::create([
                        'user_id' => $request->input('new_user_id'),
                        'user_name' => $user->user_name,
                        'vehicle_name' => $request->input('vehicle_name'),
                        'vehicle_number' => $request->input('vehicle_number'),
                        'created_at' => now()->timestamp, // Store current Unix timestamp
                        'updated_at' => now()->timestamp, // Store current Unix timestamp
                        'sort_order' => 0,  // Default value if needed
                        'status' => 0, // Using default value
                    ]);
                    
                        return back()->with('status_message', 'Added Successfully!');
                    } else {
                        // Handle GET request - Show form
                        $vehicles_name = DB::connection('mentor_db')->table('vehicle_data')->select('vehicle_name')->get();
                        return view('users_vehicle_data.add_vehicles_data');
                    }
                
                case 'edit':
                    if ($request->isMethod('post')) {
                        $validated = $request->validate([
                            'new_user_id' => 'required',
                            'vehicle_name' => 'required',
                            'vehicle_number' => ['required', 'regex:/^[A-Z]{2}\d{2}[A-Z]{2}\d{4}$/'],
                        ]);
                        
                        $user = DB::connection('mentor_db')->table('register_form')->where('id', $request->input('new_user_id'))->first();
                        
                        if (!$user) {
                            return back()->withErrors(['status_message' => 'Failed to update - User doesn\'t exist!']);
                        }
                        
                        VehicleData::where('id', $id)->update([
                            'user_id' => $request->input('new_user_id'),
                            'user_name' => $user->user_name,  // Added to update user_name
                            'vehicle_name' => $request->input('vehicle_name'),
                            'vehicle_number' => $request->input('vehicle_number'),
                            'updated_at' => now()->timestamp,
                        ]);
                        
                        return redirect()->route('users-vehicle-data.view')->with('status_message', 'Updated Successfully!');
                    }
                    
                    $user_data = VehicleData::where('id', $id)->first();
                    return view('users_vehicle_data.edit_vehicles_data', [
                        'edit_user_data' => $user_data
                    ]);

                case 'delete':
                    if ($id) {
                        DB::connection('mentor_db')->table('vehicle_data')->where('id', $id)->delete();
                        return redirect()->route('users-vehicle-data.view')->with('status_message', 'Deleted Successfully!');
                    }
                    break;
        }
    }

    // Check User ID Existence (AJAX)
    public function checkUserId(Request $request)
    {
        $new_user_id = $request->input('new_user_id');
        $user = DB::connection('mentor_db')->table('register_form')->where('id', $new_user_id)->first();

        if ($user) {
            return response()->json([
                'exists' => true,
                'user_name' => $user->user_name,
            ]);
        }

        return response()->json([
            'exists' => false,
        ]);
    }
}
