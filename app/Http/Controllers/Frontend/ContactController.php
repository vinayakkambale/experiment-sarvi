<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactModel;



class ContactController extends Controller
{
    public function index(){
        
        return view('frontend.contact');
    }

    public function contact_post(Request $require){
            //   dd($require->all());
            $insertRecord= new ContactModel;
            $insertRecord->name = trim($require->name);
            $insertRecord->email = trim($require->email);
            $insertRecord->subject = trim($require->subject);
            $insertRecord->message = trim($require->message);
            $insertRecord->save();

           

            // After storing the data, redirect with a success message
             return redirect()->back()->with('success', 'Your form has been submitted successfully!');

             
    }

    public function showEnquiries()
{
    // Retrieve all enquiries from the database
    $enquiries = ContactModel::all();

    return view('layouts.adminpages.frontenquiries', compact('enquiries'));
}


   
}
