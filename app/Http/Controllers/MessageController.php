<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Contact;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Pusher\Pusher;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('pages.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
     {
         $request->validate([
             'message' => 'required',
             'send_to' => 'required'
         ]);
     
         $user = User::where('email', $request->send_to)->first();
         $message = Message::create([
             'sent_from' => auth()->id(),
             'send_to' => $user->id,
             'message' => $request->message,
         ]);
     
         Http::post('http://localhost:6001/send-message', [
            'room' => null, // kita broadcast manual ke banyak room
            'message' => [
                'from' => auth()->id(),
                'to' => $user->id,
                'message' => $message->message
            ],
        ]);
        
     
         return response()->json(['status' => 'sent']);
     }
     

    /**
     * Display the specified resource.
     */
    public function show($contact_id)
{
    // Get the logged-in user id
    $user_id = auth()->user()->id;

    // Get the contact's user ID by email
    $contactUser = User::where('email', $contact_id)->pluck('id')->first();

    // Check if contact was found
    if (!$contactUser) {
        abort(404, "Contact not found");
    }

    // Retrieve messages between the user and the contact
    $message = Message::where(function ($query) use ($user_id, $contactUser) {
        $query->where('sent_from', $user_id)->where('send_to', $contactUser);
    })->orWhere(function ($query) use ($user_id, $contactUser) {
        $query->where('sent_from', $contactUser)->where('send_to', $user_id);
    })->orderBy('created_at', 'asc')->get();

    // Fetch the contact details (could be user or another table depending on your app's design)
    $contact = Contact::where('contact_id', $contact_id)->first();

    // If no contact found, abort with error
    if (!$contact) {
        abort(404, "Contact details not found");
    }

    // Return the view with the messages and contact details
    return view('pages.message', compact('message', 'contact'));
}

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }
}
