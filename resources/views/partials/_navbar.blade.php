<!-- navbar goes here -->
<nav class="bg-blue">
    <div class="container px-5 py-3">
      <div class="flex justify-between items-center">
        <div class="flex space-x-4">
          <div> <!-- logo -->
            <a href="#" class="flex items-center px-2 text-gray-200 hover:text-green-300">
                <img src="https://www.svgrepo.com/show/294145/code.svg" alt="" class="h-6 w-6 mr-2">
              <span class="font-bold text-2xl">Code Link</span>
            </a>
          </div> <!-- /logo -->

          <!-- Nav menu items -->
          <div class="hidden md:flex  space-x-5 pl-64 pt-1">
            <a href="#" class="px-3 text-gray-200 hover:text-gray-300">Projects</a>
            <a href="#" class="px-3 text-gray-200 hover:text-gray-300">Connect</a>
            <a href="#" class="px-3 text-gray-200 hover:text-gray-300">Explore</a>
          </div>
        </div>

        <!-- Login/Sign up -->
        <div class="hidden md:flex items-center space-x-1">
            @if(!auth()->check())
                <a href="{{ route('login') }}" class="px-3 text-gray-200 hover:text-gray-300">Login</a>
                <a href="{{ route('register') }}" class="py-2 px-4 border-2 border-gray-200 text-gray-200 hover-color-blue hover:bg-gray-200 rounded transition duration-300">Signup</a>
            @else
                <div class="text-gray-200 text-base">{{ auth()->user()->name }}</div>
            @endif
        </div>
      </div>
    </div>
</nav>


