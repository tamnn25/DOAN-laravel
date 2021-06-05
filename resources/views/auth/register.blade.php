<x-guest-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
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
        {{-- <x-auth-card> --}}
            <div class="container">
                <div class="login-form">
            {{-- <x-slot name="logo">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </x-slot> --}}
    
            <!-- Validation Errors -->
            {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}
    
            <form method="POST" action="{{ route('register') }}">
                @csrf
    
                <!-- Name -->
                <div>
                    <x-label for="name" :value="__('Name')" />
    
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                </div>
    
                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')" />
    
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>
    
                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" />
    
                    <x-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                </div>
    
                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />
    
                    <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
                </div>
    
                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
    
                    <x-button class="ml-4">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </form>
                </div>
            </div>
        {{-- </x-auth-card> --}}
    </body>
    </html>
    
</x-guest-layout>
