@extends('layouts.header')

@section('title', 'Login')
    
@section('content')
<div class="flex items-center justify-center h-screen">     
    <div class="w-full max-w-sm p-4 bg-secondary rounded-lg shadow sm:p-6 md:p-8">
        <form class="space-y-6" action="#">
            <h3 class="text-2xl font-medium font-sans text-purple text-center">Login</h3>
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-purple">Username</label>
                <input type="email" name="email" id="email" class="bg-transparent primary border-2 border-purple text-purple text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
            </div>
            <div>
                <label for="password" class="block mb-2 text-sm font-medium text-purple">Password</label>
                <input type="password" name="password" id="password" class="bg-transparent border-2 border-purple text-purple text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
            </div>
            <div class="flex items-start">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300" required>
                    </div>
                    <label for="remember" class="ml-2 text-sm font-medium text-purple">Remember me</label>
                </div>
                <a href="#" class="ml-auto text-sm text-blue-700 hover:underline">Forgot Password?</a>
            </div>
            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Login to your account</button>
            <div class="text-sm font-medium text-gray-500 text-center">
                Not registered? <a href="{{ Route('register') }}" class="text-blue-700 hover:underline">Create account</a>
            </div>
        </form>
    </div>
</div>
@endsection
   