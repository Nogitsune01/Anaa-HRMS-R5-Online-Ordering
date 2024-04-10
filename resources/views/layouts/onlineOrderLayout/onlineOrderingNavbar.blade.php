<body class="bg-white dark:bg-slate-300">
  <!-- ========== HEADER ========== -->
  <header class="flex flex-wrap sm:justify-start sm:flex-nowrap z-50 w-full bg-white border-b border-gray-700 text-sm py-2.5 sm:py-4">
    <nav class="max-w-7xl flex basis-full items-center w-full mx-auto px-4 sm:px-6 lg:px-8" aria-label="Global">
      <div class="me-5 md:me-8">
        <a class="flex-none text-xl font-semibold text-brown dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="{{ url('orders/restaurant-ordering') }}" aria-label="Brand">
          <img src="{{asset('assets/images/logoanaa.png')}}" class="w-[30vh]" alt="">
        </a>
      </div>

      <div class="w-full flex items-center justify-end ms-auto sm:justify-between sm:gap-x-3 sm:order-3">
        <div class="sm:hidden">
          <button type="button" class="w-[2.375rem] h-[2.375rem] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full text-white hover:bg-white/20 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-1 focus:ring-gray-600">
            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="11" cy="11" r="8" />
              <path d="m21 21-4.3-4.3" />
            </svg>
          </button>
        </div>

        <form action="" method="GET" class="hidden mx-auto sm:block">
          <div class="hidden mx-auto sm:block">
            <label for="icon" class="sr-only">Search</label>
            <div class="relative">
              <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-4">
                <svg class="flex-shrink-0 size-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <circle cx="11" cy="11" r="8" />
                  <path d="m21 21-4.3-4.3" />
                </svg>
              </div>
              <input type="text" id="icon" name="filter" class="py-2 px-4 ps-11 pe-20 block w-92 md:w-96 bg-transparent border-gray-700 shadow-sm rounded-lg text-sm text-gray-300 focus:z-10 focus:border-gray-900 focus:ring-gray-600 placeholder:text-gray-500" placeholder="Search">
            </div>
          </div>
        </form>


        <div class="relative z-50 flex flex-row items-center justify-end gap-2">
          <div class="dropdown" x-data="dropdown" @click.outside="open = false">
            <a href="javascript:;" class="relative block p-1 rounded-full  dark:bg-dark/40 hover:text-primary hover:bg-white-light/90 dark:hover:bg-dark/60" @click="toggle">
              <i class="fa-solid fa-bag-shopping p-2 text-brown hover:text-dark hover:animate-rotate"></i>

              @if($user_carts_count > 0)
              <span class="flex absolute w-3 h-3 ltr:right-0 rtl:left-0 top-0">
                <span class="animate-ping absolute ltr:-left-[3px] rtl:-right-[3px] -top-[3px] inline-flex h-full w-full rounded-full bg-success/50 opacity-75"></span>
                <span class="relative inline-flex rounded-full w-[6px] h-[6px] bg-success"></span>
              </span>
              @else

              @endif
            </a>
            <ul x-cloak x-show="open" x-transition x-transition.duration.300ms class="ltr:-right-2 rtl:-left-2 top-11 !py-0 text-dark dark:text-white-dark w-[300px] sm:w-[400px] divide-y dark:divide-white/10">
              <li>
                <div class="flex items-center px-4 py-2 justify-between font-semibold bg-green-200">
                  <h4 class="text-lg">My Orders</h4>
                  <template x-if="notifications.length">
                    <span class="badge bg-primary/80" x-text="notifications.length + 'New'"></span>
                  </template>
                </div>
              </li>
              @foreach($user_carts as $cart)
              <form action="{{ url('orders/review-orders/'.$user->id) }}" method="GET">
                @csrf
                <li class=" dark:text-white-light/90 ">
                  <div class="flex items-center justify-between px-4 py-2 ">
                    <div class="flex items-center">
                      <div class="grid place-content-center rounded">
                        <div class="w-12 h-12 relative">
                          <img class="w-12 h-12 rounded-full object-cover" src="{{asset($cart->images)}}" alt="image" />
                          <input type="hidden" name="image" value="{{asset($cart->images)}}">
                          <span class="bg-success w-2 h-2 rounded-full block absolute right-[6px] bottom-0"></span>
                        </div>
                      </div>
                      <div class="ltr:pr-3 rtl:pl-3 ml-4">
                        <h6>{{$cart->title}} - <i class="fa-solid fa-peso-sign"></i>{{$cart->price}}</h6>
                        <input type="hidden" name="title" value="{{$cart->title}}">
                        <input type="hidden" name="price" value="{{$cart->price}}">
                        <div class="flex">
                          <span class="text-xs block font-normal dark:text-gray-500">{{$cart->category}}</span>
                          <input type="hidden" name="category" value="{{$cart->category}}">
                        </div>

                      </div>
                    </div>

                    <div class="flex justify-between">

                      <div class="flex items-center">
                        <div class="ml-2">
                          <a href="{{ url('orders/delete-item-cart/'.$cart->id) }}" class="ltr:ml-auto rtl:mr-auto text-neutral-300 hover:text-danger ">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <circle opacity="0.5" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5" />
                              <path d="M14.5 9.50002L9.5 14.5M9.49998 9.5L14.5 14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                          </a>
                        </div>
                      </div>

                    </div>
                  </div>
                </li>

                @endforeach
                <li>
                  <div class="p-4">
                    <button class="btn btn-success block w-full btn-small" type="submit">Review Order</button>
                  </div>
                </li>
              </form>
              <template x-if="!notifications.length">
                <li>
                  <div class="!grid place-content-center hover:!bg-transparent text-lg min-h-[200px]">
                    <div class="mx-auto ring-4 ring-primary/30 rounded-full mb-4 text-primary">
                      <svg width="40" height="40" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.5" d="M20 10C20 4.47715 15.5228 0 10 0C4.47715 0 0 4.47715 0 10C0 15.5228 4.47715 20 10 20C15.5228 20 20 15.5228 20 10Z" fill="currentColor" />
                        <path d="M10 4.25C10.4142 4.25 10.75 4.58579 10.75 5V11C10.75 11.4142 10.4142 11.75 10 11.75C9.58579 11.75 9.25 11.4142 9.25 11V5C9.25 4.58579 9.58579 4.25 10 4.25Z" fill="currentColor" />
                        <path d="M10 15C10.5523 15 11 14.5523 11 14C11 13.4477 10.5523 13 10 13C9.44772 13 9 13.4477 9 14C9 14.5523 9.44772 15 10 15Z" fill="currentColor" />
                      </svg>
                    </div>
                    No data available.
                  </div>
                </li>
              </template>
            </ul>
          </div>

          <button type="button" class="w-[2.375rem] h-[2.375rem] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full text-brown hover:bg-white/20 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-1 focus:ring-gray-600" data-hs-offcanvas="#hs-offcanvas-right">
            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M22 12h-4l-3 9L9 3l-3 9H2" />
            </svg>
          </button>

          <div class="dropdown flex-shrink-0" x-data="dropdown" @click.outside="open = false">
            <a href="javascript:;" class="relative" @click="toggle()">
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                </svg>
              </span>
            </a>
            <ul x-cloak x-show="open" x-transition x-transition.duration.300ms class="ltr:right-0 rtl:left-0 text-dark dark:text-white-dark top-11 !py-0 w-[230px] font-semibold dark:text-white-light/90">
              <li>
                <div class="flex items-center px-4 py-4">
                  <div class="flex-none">
                    <img class="rounded-md w-10 h-10 object-cover" src="{{ asset('assets/images/ANAA LOGO.png') }}" alt="image" />
                  </div>
                  <div class="ltr:pl-4 rtl:pr-4">
                    <h4 class="text-base">
                      {{ Auth::user()->name }}
                    </h4>
                    <a class="text-black/60  hover:text-primary dark:text-dark-light/60 dark:hover:text-white" href="">{{ Auth::user()->email }}</a>
                  </div>
                </div>
              </li>
              <li>
                <a href="{{ route('profile.edit')}}" class="dark:hover:text-white" @click="toggle">
                  <svg class="w-4.5 h-4.5 ltr:mr-2 rtl:ml-2" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="12" cy="6" r="4" stroke="currentColor" stroke-width="1.5" />
                    <path opacity="0.5" d="M20 17.5C20 19.9853 20 22 12 22C4 22 4 19.9853 4 17.5C4 15.0147 7.58172 13 12 13C16.4183 13 20 15.0147 20 17.5Z" stroke="currentColor" stroke-width="1.5" />
                  </svg>
                  Profile</a>
              </li>
              <li>
                <a href="{{ url('orders/restaurant-ordering/my-orders') }}" class="dark:hover:text-white" @click="toggle">
                  <svg class="w-4.5 h-4.5 ltr:mr-2 rtl:ml-2" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.5" d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12C22 15.7712 22 17.6569 20.8284 18.8284C19.6569 20 17.7712 20 14 20H10C6.22876 20 4.34315 20 3.17157 18.8284C2 17.6569 2 15.7712 2 12Z" stroke="currentColor" stroke-width="1.5" />
                    <path d="M6 8L8.1589 9.79908C9.99553 11.3296 10.9139 12.0949 12 12.0949C13.0861 12.0949 14.0045 11.3296 15.8411 9.79908L18 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                  </svg>
                  My Orders</a>
              </li>
              <form method="POST" action="{{ route('logout') }}">
                <li class="border-t border-white-light dark:border-white-light/10">
                  @csrf
                  <a href="{{ route('logout')}}" onclick="event.preventDefault();
                                        this.closest('form').submit();" class=" text-danger !py-3" @click="toggle">
                    <svg class="w-4.5 h-4.5 ltr:mr-2 rtl:ml-2 rotate-90" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path opacity="0.5" d="M17 9.00195C19.175 9.01406 20.3529 9.11051 21.1213 9.8789C22 10.7576 22 12.1718 22 15.0002V16.0002C22 18.8286 22 20.2429 21.1213 21.1215C20.2426 22.0002 18.8284 22.0002 16 22.0002H8C5.17157 22.0002 3.75736 22.0002 2.87868 21.1215C2 20.2429 2 18.8286 2 16.0002L2 15.0002C2 12.1718 2 10.7576 2.87868 9.87889C3.64706 9.11051 4.82497 9.01406 7 9.00195" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                      <path d="M12 15L12 2M12 2L15 5.5M12 2L9 5.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Sign Out
                  </a>
                </li>
              </form>
            </ul>
          </div>
        </div>
    </nav>
  </header>
  <!-- ========== END HEADER ========== -->