<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bookings List') }}
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
                        <a href="{{ route('bookings.create') }}" class="text-blue-500 hover:text-blue-950">
                            Create a Bookings
                        </a>
                    </div>

                    <!-- Product Table -->
                    <table class="table-auto w-full border-collapse border border-gray-300">
                        <thead>
                            <tr>
                                <th class="border border-gray-300 px-4 py-2">ID</th>
                                <th class="border border-gray-300 px-4 py-2">Title</th>
                                <th class="border border-gray-300 px-4 py-2">Body</th>
                                <th class="border border-gray-300 px-4 py-2">Date</th>
                                <th class="border border-gray-300 px-4 py-2">Place</th>
                                @if(Auth::user()->level == 1)
                                    <th class="border border-gray-300 px-4 py-2">Person</th>
                                @endif
                                <th class="border border-gray-300 px-4 py-2">kid</th>
                                <th class="border border-gray-300 px-4 py-2">Special Request</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $booking)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $booking->id }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $booking->name }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $booking->email }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $booking->date }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $booking->destination }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $booking->persons }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $booking->categories }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $booking->request }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $booking->user_id }}</td>
                                    
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
