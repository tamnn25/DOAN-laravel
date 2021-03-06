<x-guest-layout>

    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
    body{
        padding: 66px;
        background-image: url("https://scontent-hkg4-2.xx.fbcdn.net/v/t1.6435-9/145880087_2082510508551730_3699486924977518177_n.jpg?_nc_cat=104&ccb=1-3&_nc_sid=9267fe&_nc_ohc=iXi3kUn-CV4AX-Dbl2S&_nc_ht=scontent-hkg4-2.xx&oh=5f6202c8c6091844c478be69a16d717e&oe=60D2BB5D");
    }
    .login-form {
        width: 340px;
        margin: 50px auto;
          font-size: 15px;
    }
    .login-form form {
        opacity: 0.8;
        margin-bottom: 15px;
        background: #c0dfce;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
    </style>
    </head>
    <body>
        <div class="container">
    <div class="login-form">
        <form method="POST" action="{{ route('login') }}">
    
            @csrf
            <h2 class="text-center">Welcome To OGANI Store</h2>
            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />
    
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>
    
            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />
    
                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>
    
            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
    
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
    
                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
        
    </div>
    </div>
    </body>
    </html>
    </x-guest-layout>
    