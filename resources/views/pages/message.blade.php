@extends('layouts.app')

@section('content')

<div class="flex-1">
    <header class="bg-white p-4 text-gray-700">
     <h1 class="text-2xl font-semibold">{{ $contact->name }}</h1>
 </header>
 
 <div class="h-screen overflow-y-auto p-4 pb-36" id="chat-messages" data-user-id="{{ auth()->id() }}" >
    @foreach ($message as $msg)
        @if($msg->sent_from == auth()->user()->id)
            <div class="flex justify-end mb-4 cursor-pointer">
                <div class="flex max-w-96 bg-indigo-500 text-white rounded-lg p-3 gap-3">
                    <p>{{ $msg->message }}</p>
                </div>
                <div class="w-9 h-9 rounded-full flex items-center justify-center ml-2">
                    <img src="https://placehold.co/200x/b7a8ff/ffffff.svg?text=ʕ•́ᴥ•̀ʔ&font=Lato" alt="My Avatar" class="w-8 h-8 rounded-full">
                </div>
            </div>
        @else
            <div class="flex mb-4 cursor-pointer">
                <div class="w-9 h-9 rounded-full flex items-center justify-center mr-2">
                    <img src="https://placehold.co/200x/ffa8e4/ffffff.svg?text=ʕ•́ᴥ•̀ʔ&font=Lato" alt="User Avatar" class="w-8 h-8 rounded-full">
                </div>
                <div class="flex max-w-96 bg-white rounded-lg p-3 gap-3">
                    <p class="text-gray-700">{{ $msg->message }}</p>
                </div>
            </div>
        @endif
    @endforeach


 <footer class="bg-white border-t border-gray-300 p-4 absolute bottom-0 w-[73%]">
    <form id="chat-form" class="flex items-center w-full">

        @csrf
        <input type="hidden" name="send_to" value="{{ $contact->contact_id }}">
        <input type="text" id="chat-input" name="message" placeholder="Type a message..." class="w-full p-2 rounded-md border border-gray-400 focus:outline-none focus:border-blue-500" required>
        <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md ml-2">Send</button>
    </form>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('chat-form');
        const input = document.getElementById('chat-input');
        const sendTo = form.querySelector('[name="send_to"]').value;
    
        form.addEventListener('submit', function(e) {
            e.preventDefault();
    
            const message = input.value;
    
            fetch('/chat', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    message: message,
                    send_to: sendTo
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log('Message sent:', data);
                input.value = '';
            })
            .catch(error => console.error('Error:', error));
        });
    });
    </script>

@endsection