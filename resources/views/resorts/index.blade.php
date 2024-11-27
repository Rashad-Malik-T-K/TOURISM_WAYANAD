<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Resorts List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Success message -->
                    @if(session()->has('success'))
                        <div class="mb-4 text-green-500">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Create Product Button -->
                    <div class="mb-6">
                        <a href="{{ route('resorts.create') }}" class="text-blue-500 hover:text-blue-950">
                            Create a resorts
                        </a>
                    </div>

                    <!-- Product Table -->
                    <table class="table-auto w-full border-collapse border border-gray-300">
                        <thead>
                            <tr>
                                <th class="border border-gray-300 px-4 py-2">ID</th>
                                <th class="border border-gray-300 px-4 py-2">Title</th>
                                <th class="border border-gray-300 px-4 py-2">Body</th>
                                <th class="border border-gray-300 px-4 py-2">Image</th>
                                <th class="border border-gray-300 px-4 py-2">Price</th>
                                <th class="border border-gray-300 px-4 py-2">URL</th>
                                <th class="border border-gray-300 px-4 py-2">Edit</th>
                                @if(Auth::user()->level == 1)
                                    <th class="border border-gray-300 px-4 py-2">Delete</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($resorts as $resort)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $resort->id }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $resort->title }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $resort->body }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <img 
                                            src="{{ asset('storage/' . $resort->image) }}" 
                                            alt="Image" 
                                            style="width: 150px; height: 150px; object-fit: cover; border-radius: 8px;">
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $resort->price }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $resort->url }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <a href="{{ route('resorts.edit', ['resorts' => $resort]) }}" class="text-blue-500 hover:text-blue-950">Edit</a>
                                    </td>
                                    @if(Auth::user()->level == 1)
                                        <td class="border border-gray-300 px-4 py-2">
                                            <form method="POST" action="{{ route('resorts.destroy', ['resorts' => $resort]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" value="Delete" class="text-red-500 hover:text-red-800 cursor-pointer">
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
