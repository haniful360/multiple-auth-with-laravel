@extends('layouts.frontend');

@section('content')
    <div class="max-w-6xl mx-auto min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md">
            @if (Session::has('success'))
                <div class="relative py-3 pl-4 pr-10 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                    <p> {{ Session::get('success') }}</p>
                    <span class="absolute inset-y-0 right-0 flex items-center mr-4">
                        <svg class="w-4 h-4 fill-current" role="button" viewBox="0 0 20 20">
                            <path
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </span>
                </div>
            @endif


            @if (Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif
            <h2 class="text-2xl font-bold text-gray-700 text-center mb-6">Login</h2>
            <form action="{{ route('authenticate') }}" method="POST" class="max-w-md mx-auto bg-white p-6 rounded-lg">
                @csrf
                @method('POST')
                <!-- Email -->
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email"
                        class="mt-2 block w-full text-gray-700 border border-gray-300 rounded-md shadow-sm py-2 px-4 focus:ring-blue-500 focus:border-blue-500" />
                    @error('email')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password"
                        class="mt-2 block w-full text-gray-700 border border-gray-300 rounded-md shadow-sm py-2 px-4 focus:ring-blue-500 focus:border-blue-500" />
                    @error('password')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm
                        Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="mt-2 block w-full text-gray-700 border border-gray-300 rounded-md shadow-sm py-2 px-4 focus:ring-blue-500 focus:border-blue-500" />
                    @error('password')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-3 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Login
                    </button>
                </div>
            </form>

            <div class="p-6 flex justify-between">
                <a href="{{ route('auth.redirect', 'github') }}"
                    class="w-full bg-blue-600 text-white py-3 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Login
                    with GitHub</a>
                <a href="{{ route('auth.redirect', 'google') }}"
                    class="w-full ml-2 bg-blue-600 text-white py-3 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Login
                    with Google</a>
            </div>

        </div>
    </div>
@endsection
