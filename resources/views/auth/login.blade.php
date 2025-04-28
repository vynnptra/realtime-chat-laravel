<x-auth>
    <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('login') }}">
        @csrf
        @method('POST')
        <div>
          <label for="username" class="block mb-2 text-sm font-medium text-gray-100 ">Email</label>
          <input type="text" name="email" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 " placeholder="emelia_erickson24" >
        </div>
        <div>
          <label for="password" class="block mb-2 text-sm font-medium text-gray-100 ">Password</label>
          <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 " >
        </div>
        @error('password')
        <p class="text-sm text-red-500">{{ $message }}</p>
        @enderror
        @error('email')
            <p class="text-sm text-red-500">{{ $message }}</p>
        @enderror
        <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">login</button>
        <p class="text-sm font-light text-gray-500 ">Dont have an account? <a
            class="font-medium text-blue-600 hover:underline " href="{{ route('sign-up') }}">Sign up here</a>
        </p>
      </form>
</x-auth>