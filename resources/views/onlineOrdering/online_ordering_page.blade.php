@extends('layouts.onlineOrderLayout.onlineOrderingIndex')

@section('content')
@section('title', 'Restaurant Ordering')
<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
  <!-- Nav -->
  <nav class="sticky flex z-10 -top-px bg-[#9c603b] text-sm font-medium text-black ring-1 ring-gray-900 ring-opacity-5 border-t shadow-sm shadow-gray-100 pt-6 md:pb-6 -mt-px dark:bg-slate-900 dark:border-gray-800 dark:shadow-slate-700/[.7]" aria-label="Jump links">
    <div class="max-w-7xl snap-x w-full flex items-center overflow-x-auto px-4 sm:px-6 lg:px-8 pb-4 md:pb-0 mx-auto [&::-webkit-scrollbar]:h-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-slate-700 dark:[&::-webkit-scrollbar-thumb]:bg-slate-500 dark:bg-slate-900">
      <form action="" method="GET" class="flex items-center " id="myForm">
        <div class="">
          <label class="flex items-center cursor-pointer" onclick="submit()">
            <input type="radio" name="filter" value="Main Course" class="hidden" />
            <span class="text-white hover:text-gray-300">Main Course</span>
          </label>
        </div>
        <div class="ml-10">
          <label class="flex items-center cursor-pointer" onclick="submit()">
            <input type="radio" name="filter" value="Breakfast" class="hidden" />
            <span class="text-white hover:text-gray-300">Breakfast</span>
          </label>
        </div>
        <div class="ml-10">
          <label class="flex items-center cursor-pointer" onclick="submit()">
            <input type="radio" name="filter" value="Beverages" class="hidden" />
            <span class="text-white hover:text-gray-300">Beverages</span>
          </label>
        </div>
        <div class="ml-10">
          <label class="flex items-center cursor-pointer" onclick="submit()">
            <input type="radio" name="filter" value="Pasta Noodles" class="hidden" />
            <span class="text-white hover:text-gray-300">Pasta Noodles</span>
          </label>
        </div>
        <div class="ml-10">
          <label class="flex items-center cursor-pointer" onclick="submit()">
            <input type="radio" name="filter" value="Hot Coffee" class="hidden" />
            <span class="text-white hover:text-gray-300">Hot Coffee</span>
          </label>
        </div>
        <div class="ml-10">
          <label class="flex items-center cursor-pointer" onclick="submit()">
            <input type="radio" name="filter" value="Liquors" class="hidden" />
            <span class="text-white hover:text-gray-300">Liquors</span>
          </label>
        </div>
        <div class="ml-10">
          <label class="flex items-center cursor-pointer" onclick="submit()">
            <input type="radio" name="filter" value="Lunch" class="hidden" />
            <span class="text-white hover:text-gray-300">Lunch</span>
          </label>
        </div>
      </form>
    </div>
    
  </nav>
  <!-- End Nav -->

  <!-- Card Blog -->
  <div class=" max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Grid -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
      @forelse($menu as $menus)
      <!-- Card -->
      <form action="{{ url('orders/add-to-orders/'.$user->id) }}" method="POST">
        @csrf

        <div class="transform transition-transform duration-300 hover:scale-105 w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
          <a href="#">
            <img class="p-8 rounded-t-lg w-[50vh] h-[40vh] flex items-center justify-center" src="{{asset($menus->image) }}" alt="product image" />
            <input type="hidden" name="images" value="{{$menus->image}}">
          </a>
          <div class="px-5 pb-5">
            <a href="#">
              <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                <input type="hidden" name="title" value="{{$menus->title}}">
                {{$menus->title}}
              </h5>
              <p class="text-gray-500"><input type="hidden" name="category" value="{{$menus->category}}">{{$menus->category}}</p>
            </a>
            <div class="flex items-center mt-2.5 mb-5">
            </div>
            <div class="flex items-center justify-between">
              <span class="text-3xl font-bold text-gray-900 dark:text-white">
                <input type="hidden" name="price" value="{{$menus->price}}">
                <i class="fa-solid fa-peso-sign"></i>
                {{$menus->price}}
              </span>
              <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add to cart</button>
            </div>
          </div>
        </div>

      </form>
      @empty

      <div class="flex items-center justify-center">
        <h1></h1>
      </div>
      <div class="flex items-center justify-end py-[20vh] ">

      </div>
      <div class="flex items-center justify-start py-[20vh]">
        <h1>NO MENU FOUND</h1>
      </div>
      <div class="flex items-center justify-center">
        <h1></h1>
      </div>
      @endforelse
    </div>
    <div class="mt-6">
      {{$menu->links()}}
    </div>
    <!-- End Grid -->
  </div>
  <!-- End Card Blog -->
  <script>
    function submit() {
      document.getElementById('myForm').submit();
    }
  </script>
</main>
<!-- ========== END MAIN CONTENT ========== -->

@endsection