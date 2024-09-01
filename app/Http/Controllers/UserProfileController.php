<?php
namespace App\Http\Controllers;

use App\Models\UserData;
use App\Models\UserProfile;
use App\Models\DropdownData;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function viewProfile($user_id)
    {
        // Fetch the user profile data
        $profile = UserProfile::getUserData($user_id);

        // Check if profile data exists
        if (!$profile) {
            // If the profile does not exist, preparing data with null profile
            $userdata = [
                'profile' => null,
                'country_name' => 'N/A',
                'state_name' => 'N/A',
                'district_name' => 'N/A',
                'profile_error' => 'User profile not found',
            ];
            
        } else {
             // Fetch country, state, and district names from the Dropdown model
             $country = DropdownData::fetchUserSelectedCountries($profile['country']);
             $state = DropdownData::fetchUserSelectedStates($profile['state']);
             $district = DropdownData::fetchUserSelectedDistricts($profile['district']);
             
            // isset to handle values
            $country_name = isset($country[0]->country_name) ? $country[0]->country_name : 'N/A';
            $state_name = isset($state[0]->state_name) ? $state[0]->state_name : 'N/A';
            $district_name = isset($district[0]->district_name) ? $district[0]->district_name : 'N/A';

            // Prepare data for the view
            $userdata = [
                'profile' => $profile,
                'country_name' => $country_name,
                'state_name' => $state_name,
                'district_name' => $district_name,
                'profile_error' => null, // No error, as profile exists
            ];
        }

        // Load the views with the prepared data
        return view('view_profile', $userdata);
    }
}
