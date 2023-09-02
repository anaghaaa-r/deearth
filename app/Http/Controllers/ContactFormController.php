<?php

namespace App\Http\Controllers;

use App\Notifications\ContactFormNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ContactFormController extends Controller
{
    public function submitContactForm(Request $request)
    {
        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $email = $request->input('email');
        $message = $request->input('message');

        $contactDetails = [
            'name' => $fname . ' ' . $lname,
            'email' => $email,
            'message' => $message
        ];

        $adminMail = 'team@coperor.in';
        Notification::route('mail', $adminMail)
            ->notify(new ContactFormNotification($contactDetails));

        return response()->json([
            'status' => true,
            'message' => 'Details Sent Successfully.'
        ], 200);
    }
}
