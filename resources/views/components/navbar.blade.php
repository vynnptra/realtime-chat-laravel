<nav class="h-screen overflow-y-auto fixed w-[33rem] bg-white" aria-label="Directory">
    <div class="relative">
      <div class="sticky top-0 py-4 z-10 border-t border-b border-gray-200 bg-gray-50 px-6 text-sm font-medium text-gray-500 flex justify-between">
        <h3>Message</h3>
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button class="hover:text-red-950">
              <i class="fa-solid fa-right-from-bracket mr-1"></i> Logout
          </button>
      </form>
      
      </div>
      <ul role="list" class="relative z-0 divide-y divide-gray-200 bg-white">
  
        <!-- Item 1 -->
        <li class="bg-white">
          <a href="{{ url('/test') }}" class="relative flex items-center space-x-3 px-6 py-5 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500 hover:bg-gray-50">
            <div class="flex-shrink-0">
              <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1500917293891-ef795e70e1f6?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="">
            </div>
            <div class="min-w-0 flex-1">
              <span class="absolute inset-0" aria-hidden="true"></span>
              <p class="text-sm font-medium text-gray-900">Kristin Watson</p>
              <p class="truncate text-sm text-gray-500">VP, Human Resources</p>
            </div>
          </a>
        </li>
  
        <!-- Item 2 -->
        <li class="bg-white">
          <a href="#" class="relative flex items-center space-x-3 px-6 py-5 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500 hover:bg-gray-50">
            <div class="flex-shrink-0">
              <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="">
            </div>
            <div class="min-w-0 flex-1">
              <span class="absolute inset-0" aria-hidden="true"></span>
              <p class="text-sm font-medium text-gray-900">Emily Wilson</p>
              <p class="truncate text-sm text-gray-500">VP, User Experience</p>
            </div>
          </a>
        </li>
  

          <a href="#" class="relative flex items-center text-sm  space-x-3 px-6 py-5 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500 hover:bg-gray-50 ">
            <div class="flex-shrink-0">
              <p>Add Contact</p>
            </div>
          </a>

  
      </ul>
    </div>
  </nav>
  