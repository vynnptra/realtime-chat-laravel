<x-auth>
    <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('register') }}">
        @csrf
        @method('POST')
        <div>
          <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your full name</label>
          <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Emelia Erickson" >
          @error('name')
          <p class="text-sm text-red-500">{{ $message }}</p>
        @enderror
        </div>
        <div>
          <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
          <input type="text" name="email" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="emelia_erickson24@gmail.com" >
          @error('email')
          <p class="text-sm text-red-500">{{ $message }}</p>
      @enderror
        </div>
        <div>
          <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
          <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
          @error('password')
          <p class="text-sm text-red-500">{{ $message }}</p>
      @enderror
        </div>
        <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create an account</button>
        <p class="text-sm font-light text-gray-500 dark:text-gray-400">Already have an account? <a
            class="font-medium text-blue-600 hover:underline dark:text-blue-500" href="{{ route('sign-in') }}">Sign in here</a>
        </p>
      </form>
</x-auth>