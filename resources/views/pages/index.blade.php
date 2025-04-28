@extends('layouts.app')

@section('content')
            <!-- Main Chat Area -->
            <div class="flex-1 text-center justify-center align-self-center mt-96">
              <h1 class="text-gray-800 font-extrabold font-serif" >Welcome {{ auth()->user()->name }}</h1>
              <p class="text-sm text-gray-800 font-semibold">Wanna contact someone now?</p>
             
            </div>
@endsection