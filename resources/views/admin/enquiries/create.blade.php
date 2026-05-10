@extends('layouts.admin')

@section('content')

<div class="max-w-md mx-auto bg-white shadow-sm rounded-lg p-4">

    <h2 class="text-lg font-bold mb-4 text-black flex items-center">
        <i class="fa fa-plus-circle mr-2"></i> Add Enquiry
    </h2>

    <form action="{{ route('admin.enquiries.store') }}" method="POST" class="space-y-3">
        @csrf

        <!-- Name -->
        <div>
            <label class="block text-xs font-semibold mb-1">Name *</label>
            <input type="text" name="name" value="{{ old('name') }}"
                class="w-full border px-3 py-1.5 rounded text-sm focus:outline-none focus:ring-1 focus:ring-black
                @error('name') border-red-500 @enderror">

            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Phone -->
        <div>
            <label class="block text-xs font-semibold mb-1">Phone *</label>
            <input type="text" name="phone" value="{{ old('phone') }}"
                class="w-full border px-3 py-1.5 rounded text-sm focus:outline-none focus:ring-1 focus:ring-black
                @error('phone') border-red-500 @enderror">

            @error('phone')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div>
            <label class="block text-xs font-semibold mb-1">Email *</label>
            <input type="email" name="email" value="{{ old('email') }}"
                class="w-full border px-3 py-1.5 rounded text-sm focus:outline-none focus:ring-1 focus:ring-black
                @error('email') border-red-500 @enderror">

            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- About -->
        <div>
            <label class="block text-xs font-semibold mb-1">About *</label>
            <textarea name="about" rows="3"
                class="w-full border px-3 py-1.5 rounded text-sm focus:outline-none focus:ring-1 focus:ring-black
                @error('about') border-red-500 @enderror">{{ old('about') }}</textarea>

            @error('about')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Button -->
        <button type="submit"
            class="w-full bg-black text-white py-1.5 text-sm rounded hover:bg-gray-800 transition">
            <i class="fa fa-paper-plane mr-1"></i> Submit Enquiry
        </button>

    </form>

</div>

@endsection
