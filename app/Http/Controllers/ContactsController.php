<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactsController extends Controller
{
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'map' => 'nullable|string',
            'location' => 'nullable|string',
            'telephone' => 'nullable|string',
            'mobile' => 'nullable|string',
            'email' => 'nullable|string',
            'blog' => 'nullable|string',
            'website' => 'nullable|string'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed.',
                'error' => 'Error: ' . $validator->errors()
            ], 422);
        }

        try {
            $contact = new Contact();
            $contact->map = $request->input('map');
            $contact->location = $request->input('location');
            $contact->telephone = $request->input('telephone');
            $contact->mobile = $request->input('mobile');
            $contact->email = $request->input('email');
            $contact->blog = $request->input('blog');
            $contact->website = $request->input('website');

            $contact->save();

            return response()->json([
                'status' => true,
                'message' => 'Contact added successfully.',
            ], 200);
        }
        catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error adding.',
                'error' => 'Error: ' . $e->getMessage()
            ], 400);
        }
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::find($id);

        if(!$contact)
        {
            return response()->json([
                'status' => false,
                'message' => 'Not found.'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'map' => 'nullable|string',
            'location' => 'nullable|string',
            'telephone' => 'nullable|string',
            'mobile' => 'nullable|string',
            'email' => 'nullable|string',
            'blog' => 'nullable|string',
            'website' => 'nullable|string'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed.',
                'error' => 'Error: ' . $validator->errors()
            ], 422);
        }

        $updatedData = [];

        if($request->filled('map'))
        {
            $updatedData['map'] = $request->input('map');
        }

        if($request->filled('location'))
        {
            $updatedData['location'] = $request->input('location');
        }

        if($request->filled('telephone'))
        {
            $updatedData['telephone'] = $request->input('telephone');
        }

        if($request->filled('mobile'))
        {
            $updatedData['mobile'] = $request->input('mobile');
        }

        if($request->filled('email'))
        {
            $updatedData['email'] = $request->input('email');
        }

        if($request->filled('blog'))
        {
            $updatedData['blog'] = $request->input('blog');
        }
        
        if($request->filled('website'))
        {
            $updatedData['website'] = $request->input('website');
        }

        if(empty($updatedData))
        {
            return response()->json([
                'status' => true,
                'message' => 'Nothing to update.'
            ], 200);
        }

        try {
            $contact->update($updatedData);

            return response()->json([
                'status' => true,
                'message' => 'Updated successfully.'
            ], 200);
        }
        catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'nessage' => 'Error trying to update.',
                'error' => 'Error: ' . $e->getMessage()
            ], 200);
        }
    }

    public function delete($id)
    {
        try {
            $contact = Contact::findOrFail($id);

            $contact->delete();

            return response()->json([
                'status' => true,
                'message' => 'Contact deleted successfully.'
            ], 200);
        }
        catch (ModelNotFoundException $e)
        {
            return response()->json([
                'status' => false,
                'message' => 'Contact not found.',
                'error' => 'Error: ' . $e->getMessage()
            ], 404);
        }
        catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Internal Server Error',
                'error' => 'Error: ' . $e->getMessage()
            ], 400);
        }
    }
}
