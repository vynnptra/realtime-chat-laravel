<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create(){
        return view('pages.contact.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        Contact::create([
            'user_id' => auth()->user()->id,
            'contact_id' => $request->email,
            'name' => $request->name
        ]);

        return redirect()->route('chat.index');
    } 

    public function edit($id){
        return view('contact.edit');
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        Contact::update([
            'user_id' => auth()->user()->id,
            'contact_id' => $request->email,
            'name' => $request->name
        ]);

        return redirect()->route('chat.index');
    }

    public function delete($id){

    }
}
