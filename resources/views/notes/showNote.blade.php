@extends('layouts.app')
<title>About Manatad</title>

@section('content')
<div class="flex justify-center items-center min-h-screen bg-blue-100">
    <div class="max-w-4xl mx-auto p-4 w-full">
        <div class="bg-white p-8 rounded shadow">
           <p class="text-xl font-['Inter'] mb-3">Name: Jelliane M. Manatad</p>
           <p class="text-xl font-['Inter'] mb-3">Year & Section: 3 - A</p>
           <p class="text-xl font-['Inter'] mb-3">Age: 21</p>
           <p class="text-xl font-['Inter'] mb-3">Program: BS in Information Technology</p>
           <p class="text-xl font-['Inter'] mb-6">Major: Programming</p>

           <div class="text-center mt-6">
               <a href="{{ route('login') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-['Inter'] px-6 py-3 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                    Return
               </a>
           </div>
        </div>
    </div>
</div>
@endsection