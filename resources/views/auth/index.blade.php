@extends('layouts.app')

@section('title', 'SMK Negeri 8 Batam - Autentikasi')

@section('content')
    @include('partials.header')

    <div class="pt-20">
        {{-- LOGIN FORM --}}
        <div x-data="{ register: false }"
            class="w-full max-w-sm p-4 mx-auto bg-white border border-gray-200 rounded-lg shadow-md sm:p-6 lg:p-8">
            <form class="space-y-6" action="{{ route('authenticate') }}" method="POST" x-show="!register">
                @csrf
                <h3 class="text-xl font-medium text-gray-900">Login ke <span class="text-blue-500">SMKN 8</span></h3>

                <div>
                    <label for="name"
                        class="block mb-2 text-sm font-medium text-gray-900 @error('name') text-red-500 @enderror">
                        Nama Anda
                    </label>
                    <input type="text" name="name" id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Masukkan Nama" required value="{{ old('name') }}">
                    @error('name')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password"
                        class="block mb-2 text-sm font-medium text-gray-900 @error('password') text-red-500 @enderror">
                        Password Anda
                    </label>
                    <input type="password" name="password" id="password" placeholder="••••••••"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required>
                    @error('password')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-start">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="remember" name="remember" type="checkbox"
                                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="remember" class="font-medium text-gray-900">Simpan akun</label>
                        </div>
                    </div>
                </div>

                <button type="submit"
                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Login to your account
                </button>

                <div class="text-sm font-medium text-gray-500">
                    Not registered? <span @click="register = true"
                        class="text-blue-700 cursor-pointer hover:underline dark:text-blue-500">Create
                        account</span>
                </div>
            </form>

            {{-- REGISTER FORM --}}
            <form class="space-y-6" action="{{ route('register') }}" method="POST" x-show="register">
                @csrf
                <h3 class="text-xl font-medium text-gray-900">Register ke <span class="text-blue-500">SMKN 8</span></h3>

                <div>
                    <label for="register_email"
                        class="block mb-2 text-sm font-medium text-gray-900 @error('register_email') text-red-500 @enderror">
                        Your Email
                    </label>
                    <input type="email" name="register_email" id="register_email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="name@company.com" required value="{{ old('register_email') }}">
                    @error('register_email')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="register_name"
                        class="block mb-2 text-sm font-medium text-gray-900 @error('register_name') text-red-500 @enderror">
                        Your name
                    </label>
                    <input type="register_name" name="register_name" id="register_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Your Name" required value="{{ old('register_name') }}">
                    @error('register_name')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="register_password"
                        class="block mb-2 text-sm font-medium text-gray-900 @error('register_password') text-red-500 @enderror">
                        Your Password
                    </label>
                    <input type="password" name="register_password" id="register_password" placeholder="••••••••"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required>
                    @error('register_password')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="register_password_confirmation"
                        class="block mb-2 text-sm font-medium text-gray-900 @error('register_password_confirmation') text-red-500 @enderror">
                        Confirm Password
                    </label>
                    <input type="password" name="register_password_confirmation" id="register_password_confirmation"
                        placeholder="••••••••"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required>
                    @error('register_password_confirmation')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Register Your Account
                </button>

                <div class="text-sm font-medium text-gray-500">
                    Already registered? <span @click="register = false"
                        class="text-blue-700 cursor-pointer hover:underline dark:text-blue-500">Log in</span>
                </div>
            </form>
        </div>
    </div>

    @livewireScripts()

@endsection
