@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-blue-900 px-4 py-12">
    <div class="w-full max-w-sm">
        <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-center mb-6 text-gray-800">Sign In</h1>

        <form action="{{ route('login') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <input
                    type="email"
                    name="email"
                    placeholder="Email"
                    class="w-full border border-gray-500 p-3 rounded-lg focus:outline-none focus:ring-2 focus-ring-blue-500 focus:border-transparent transition"
                >
            </div>

            <div>
                <input
                    type="password"
                    name="password"
                    placeholder="Password"
                    class="w-full border border-gray-500 p-3 rounded-lg focus:outline-none focus:ring-2 focus-ring-blue-500 focus:border-transparent transition"
                >
            </div>

            <button
                type="submit"
                class="w-full bg-blue-600 text-white px-4 py-3 rounded-lg font-medium"
            >
                Login
            </button>
        </form>
        <div class="mt-4 text-center">
            <a href="{{ route('register') }}" class="text-sm text-blue-600 hover:underline">Create an account</a>
        </div>
        </div>

    </div>
</div>
@endsection
