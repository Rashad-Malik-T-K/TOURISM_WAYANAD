<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Validation Errors -->
                    @if($errors->any())
                        <div class="mb-4 text-red-500">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Edit Product Form -->
                    <form method="POST" action="{{ route('bookings.update', ['bookings' => $bookings]) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" id="name" name="name" value="{{ $bookings->name }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="email" name="email" value="{{ $bookings->email }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>

                        <!-- Date -->
                        <div class="mb-4">
                            <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                            <input type="date" id="date" name="date" value="{{ $bookings->date }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>

                        <!-- Destination -->
                        <div class="mb-4">
                            <label for="destination" class="block text-sm font-medium text-gray-700">Destination</label>
                            <input type="text" id="destination" name="destination" value="{{ $bookings->destination }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>

                        <!-- Persons -->
                        <div class="mb-4">
                            <label for="persons" class="block text-sm font-medium text-gray-700">Persons</label>
                            <input type="number" id="persons" name="persons" value="{{ $bookings->persons }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>

                        <!-- Categories -->
                        <div class="mb-4">
                            <label for="categories" class="block text-sm font-medium text-gray-700">Categories</label>
                            <input type="text" id="categories" name="categories" value="{{ $bookings->categories }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>

                        <!-- Special Request -->
                        <div class="mb-4">
                            <label for="request" class="block text-sm font-medium text-gray-700">Special Request</label>
                            <textarea id="request" name="request" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ $bookings->request }}</textarea>
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Update Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
