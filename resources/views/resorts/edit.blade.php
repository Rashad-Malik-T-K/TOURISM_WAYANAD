<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Resorts') }}
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

                    <!-- Edit resorts Form -->
                    <form method="POST" action="{{ route('resorts.update', ['resorts' => $resorts]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Title</label>
                            <input 
                                type="text" 
                                name="title" 
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 text-gray-700 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                                placeholder="Resorts Title"
                                value="{{ old('title', $resorts->title) }}">
                        </div>

                        <!-- Body Field -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Body</label>
                            <textarea 
                                name="body" 
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 text-gray-700 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                                rows="6" 
                                placeholder="Detailed description of the resorts">{{ old('body', $resorts->body) }}</textarea>
                        </div>

                        <!-- Image Field -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Image</label>
                            <input 
                                type="file" 
                                name="image" 
                                accept="image/*" 
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 text-gray-700 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                            @if($resorts->image)
                                <img src="{{ asset('storage/' . $resorts->image) }}" alt="resorts Image" class="mt-2 w-32 h-32 object-cover">
                            @endif
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Price</label>
                            <input 
                                type="number" 
                                name="price" 
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 text-gray-700 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                                placeholder="Resorts Price">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">url</label>
                            <input 
                                type="text" 
                                name="url" 
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 text-gray-700 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                                placeholder="Resorts url">
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Update resorts
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
