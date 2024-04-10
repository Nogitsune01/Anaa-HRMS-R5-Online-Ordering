@extends('layouts.onlineOrderLayout.onlineOrderingLogin')

@section('content')
@section('title', 'Restaurant Ordering')

<div class="flex min-h-screen">
    <div class="bg-gradient-to-t from-[#ff1361bf] to-[#44107A] w-1/2  min-h-screen hidden lg:flex flex-col items-center justify-center text-white dark:text-black p-4">
        <div class="w-full mx-auto mb-5"><img src="/assets/images/auth-cover.svg" alt="coming_soon" class="lg:max-w-[370px] xl:max-w-[500px] mx-auto" /></div>
        <h3 class="text-3xl font-bold mb-4 text-center">ANAA</h3>
        <p>It is easy to setup with great customer experience. Start your 7-day free trial</p>
    </div>
    <div class="w-full lg:w-1/2 relative flex justify-center items-center">
        <div class="max-w-[480px] p-5 md:p-10">
            <h2 class="font-bold text-3xl mb-3">Sign In</h2>
            <p class="mb-7">Enter your email and password to login</p>
            <form class="space-y-5" action="{{ route('login') }}" method="POST">
                @csrf
                <div>
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" class="form-input" placeholder="Enter Username" />
                </div>
                <div>
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" class="form-input" placeholder="Enter Password" />
                </div>
                <div>
                    <label class="cursor-pointer">
                        <input type="checkbox" class="form-checkbox" />
                        <span class="text-white-dark">Remember me</span>
                    </label>
                </div>
                <button type="submit" class="btn btn-primary w-full">SIGN IN</button>
            </form>

        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (window.history && window.history.pushState) {
            window.addEventListener('popstate', function() {
                // Clear form data
                document.querySelector('form').reset();
                // Redirect to the current URL to clear query parameters
                window.location.href = window.location.href;
            });
        }
    });
</script>

@endsection






</body>