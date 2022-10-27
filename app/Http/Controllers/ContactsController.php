<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contact;
use App\Http\Requests\CreateContactRequest;

class ContactsController extends Controller
{
    public function index()
    {
        $contacts = Contact::all(['id', 'name', 'email']);
        return response()->json($contacts);
    }

    public function search($id)
    {
        $contact = Contact::where('id', $id)->first(['id', 'name', 'email']);

        if(!$contact) {
            return response()->json([
                'message' => 'Contact does not exist'
            ], 404);
        };

        return response()->json($contact);
    }

    public function store(CreateContactRequest $request)
    {
        $contactAlreadyExists = Contact::where('email', $request -> email)->first();

        if($contactAlreadyExists) {
            return response()->json([
                'message' => 'Contact already exists!'
            ], 400);
        }

        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return response()->json([
            'message' => "User {$request->name} created with success! Email: {$request->email}"
        ], 200);
    }
}
