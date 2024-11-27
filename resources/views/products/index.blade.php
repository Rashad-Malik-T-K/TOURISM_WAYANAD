<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Forms List') }}
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

                    <!-- Tabs for level 1 users -->
                    @if(Auth::user()->level == 1)
                        <div class="mb-6">
                            <ul class="flex space-x-4">
                                <li>
                                    <button type="button" class="text-blue-500 hover:text-blue-950 tab-button" data-target="restaurant-forms">
                                        Restaurant Forms
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="text-blue-500 hover:text-blue-950 tab-button" data-target="resort-forms">
                                        Resort Forms
                                    </button>
                                </li>
                            </ul>
                        </div>
                    @endif
                    @if(Auth::check() && Auth::user()->level != 1)
                    <!-- Create Product Button -->
                    <div class="mb-6">
                        <a href="{{ route('product.create') }}" class="text-blue-500 hover:text-blue-950">
                            Create a Form
                        </a>
                    </div>
                    @endif
                    @if(Auth::user()->level == 3 || Auth::user()->level == 4 )
                        <!-- Product Table -->
                        <table class="table-auto w-full border-collapse border border-gray-300">
                            <thead>
                                <tr>
                                    <th class="border border-gray-300 px-4 py-2">ID</th>
                                    <th class="border border-gray-300 px-4 py-2">Name</th>
                                    <th class="border border-gray-300 px-4 py-2">Qty</th>
                                    <th class="border border-gray-300 px-4 py-2">Price</th>
                                    <th class="border border-gray-300 px-4 py-2">Description</th>
                                    <th class="border border-gray-300 px-4 py-2">Edit</th>
                                    @if(Auth::user()->level == 1)
                                        <th class="border border-gray-300 px-4 py-2">Delete</th>
                                    @endif
                                    <th class="border border-gray-300 px-4 py-2">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">{{ $product->id }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $product->name }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $product->qty }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $product->price }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $product->description }}</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <a href="{{ route('product.edit', ['product' => $product]) }}" class="text-blue-500 hover:text-blue-950">Edit</a>
                                        </td>
                                        @if(Auth::user()->level == 1)
                                            <td class="border border-gray-300 px-4 py-2">
                                                <form method="POST" action="{{ route('product.destroy', ['product' => $product]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" value="Delete" class="text-red-500 hover:text-red-800 cursor-pointer">
                                                </form>
                                            </td>
                                        @endif
                                        <td class="border border-gray-300 px-4 py-2">
                                            @if(Auth::user()->level == 1)
                                                <form method="POST" action="{{ route('product.updateStatus', ['product' => $product]) }}">
                                                    @csrf
                                                    @method('PATCH') <!-- Use PATCH for updating -->
                                                    <select name="status" onchange="this.form.submit()" class="border border-gray-300 rounded">
                                                        <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Checking</option>
                                                        <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Accepted</option>
                                                        <option value="2" {{ $product->status == 2 ? 'selected' : '' }}>Not Accepted</option>
                                                    </select>
                                                </form>
                                            @else
                                                @if($product->status == 0)
                                                    <span class="bg-yellow-300 px-2 py-1 rounded">Checking</span>
                                                @elseif($product->status == 1)
                                                    <span class="bg-green-300 px-2 py-1 rounded">Accepted</span>
                                                @elseif($product->status == 2)
                                                    <span class="bg-red-300 px-2 py-1 rounded">Not Accepted</span>
                                                @else
                                                    <span class="bg-gray-300 px-2 py-1 rounded">Unknown Status</span>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                     <!-- Restaurant Forms Tab Content -->
                     <div id="restaurant-forms" class="tab-content hidden">
                        <table class="table-auto w-full border-collapse border border-gray-300">
                            <!-- Table contents for restaurant forms -->
                              <!-- Product Table -->
                    <table class="table-auto w-full border-collapse border border-gray-300">
                        <thead>
                            <tr>
                                <th class="border border-gray-300 px-4 py-2">ID</th>
                                <th class="border border-gray-300 px-4 py-2">Name</th>
                                <th class="border border-gray-300 px-4 py-2">Qty</th>
                                <th class="border border-gray-300 px-4 py-2">Price</th>
                                <th class="border border-gray-300 px-4 py-2">Description</th>
                                <th class="border border-gray-300 px-4 py-2">Edit</th>
                                @if(Auth::user()->level == 1)
                                    <th class="border border-gray-300 px-4 py-2">Delete</th>
                                @endif
                                <th class="border border-gray-300 px-4 py-2">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products->where('level', 3) as $product)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $product->id }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $product->name }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $product->qty }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $product->price }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $product->description }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <a href="{{ route('product.edit', ['product' => $product]) }}" class="text-blue-500 hover:text-blue-950">Edit</a>
                                    </td>
                                    @if(Auth::user()->level == 1)
                                        <td class="border border-gray-300 px-4 py-2">
                                            <form method="POST" action="{{ route('product.destroy', ['product' => $product]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" value="Delete" class="text-red-500 hover:text-red-800 cursor-pointer">
                                            </form>
                                        </td>
                                    @endif
                                    <td class="border border-gray-300 px-4 py-2">
                                        @if(Auth::user()->level == 1)
                                            <form method="POST" action="{{ route('product.updateStatus', ['product' => $product]) }}">
                                                @csrf
                                                @method('PATCH') <!-- Use PATCH for updating -->
                                                <select name="status" onchange="this.form.submit()" class="border border-gray-300 rounded">
                                                    <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Checking</option>
                                                    <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Accepted</option>
                                                    <option value="2" {{ $product->status == 2 ? 'selected' : '' }}>Not Accepted</option>
                                                </select>
                                            </form>
                                        @else
                                            @if($product->status == 0)
                                                <span class="bg-yellow-300 px-2 py-1 rounded">Checking</span>
                                            @elseif($product->status == 1)
                                                <span class="bg-green-300 px-2 py-1 rounded">Accepted</span>
                                            @elseif($product->status == 2)
                                                <span class="bg-red-300 px-2 py-1 rounded">Not Accepted</span>
                                            @else
                                                <span class="bg-gray-300 px-2 py-1 rounded">Unknown Status</span>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                        </table>
                    </div>

                    <!-- Resort Forms Tab Content -->
                    <div id="resort-forms" class="tab-content hidden">
                        <table class="table-auto w-full border-collapse border border-gray-300">
                            <!-- Table contents for resort forms -->
                              <!-- Product Table -->
                    <table class="table-auto w-full border-collapse border border-gray-300">
                        <thead>
                            <tr>
                                <th class="border border-gray-300 px-4 py-2">ID</th>
                                <th class="border border-gray-300 px-4 py-2">Name</th>
                                <th class="border border-gray-300 px-4 py-2">Qty</th>
                                <th class="border border-gray-300 px-4 py-2">Price</th>
                                <th class="border border-gray-300 px-4 py-2">Description</th>
                                <th class="border border-gray-300 px-4 py-2">Edit</th>
                                @if(Auth::user()->level == 1)
                                    <th class="border border-gray-300 px-4 py-2">Delete</th>
                                @endif
                                <th class="border border-gray-300 px-4 py-2">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products->where('level', 4) as $product)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $product->id }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $product->name }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $product->qty }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $product->price }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $product->description }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <a href="{{ route('product.edit', ['product' => $product]) }}" class="text-blue-500 hover:text-blue-950">Edit</a>
                                    </td>
                                    @if(Auth::user()->level == 1)
                                        <td class="border border-gray-300 px-4 py-2">
                                            <form method="POST" action="{{ route('product.destroy', ['product' => $product]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" value="Delete" class="text-red-500 hover:text-red-800 cursor-pointer">
                                            </form>
                                        </td>
                                    @endif
                                    <td class="border border-gray-300 px-4 py-2">
                                        @if(Auth::user()->level == 1)
                                            <form method="POST" action="{{ route('product.updateStatus', ['product' => $product]) }}">
                                                @csrf
                                                @method('PATCH') <!-- Use PATCH for updating -->
                                                <select name="status" onchange="this.form.submit()" class="border border-gray-300 rounded">
                                                    <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Checking</option>
                                                    <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Accepted</option>
                                                    <option value="2" {{ $product->status == 2 ? 'selected' : '' }}>Not Accepted</option>
                                                </select>
                                            </form>
                                        @else
                                            @if($product->status == 0)
                                                <span class="bg-yellow-300 px-2 py-1 rounded">Checking</span>
                                            @elseif($product->status == 1)
                                                <span class="bg-green-300 px-2 py-1 rounded">Accepted</span>
                                            @elseif($product->status == 2)
                                                <span class="bg-red-300 px-2 py-1 rounded">Not Accepted</span>
                                            @else
                                                <span class="bg-gray-300 px-2 py-1 rounded">Unknown Status</span>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                        </table>
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Script to handle tab switching -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    @if(Auth::user()->level == 1)
        const tabButtons = document.querySelectorAll('.tab-button');
        const tabContents = document.querySelectorAll('.tab-content');
        
        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove active class from all buttons and content
                tabButtons.forEach(btn => btn.classList.remove('active'));
                tabContents.forEach(content => content.classList.remove('active'));

                // Add active class to clicked button and corresponding content
                button.classList.add('active');
                const target = button.getAttribute('data-target');
                document.getElementById(target).classList.add('active');
            });
        });

        // Optionally, activate the first tab by default
        if (tabButtons.length > 0) {
            tabButtons[0].classList.add('active');
            tabContents[0].classList.add('active');
        }
    @endif
});

    </script>
<style>

    .tab-button {
        padding: 10px 15px;
        cursor: pointer;
        border: 1px solid transparent;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    /* Hover effect for tab buttons */
    .tab-button:hover {
        background-color: #f0f9ff; 
        color: #1D4ED8; /* Blue color for text on hover */
        border-color: #1D4ED8; 
    }

    /* Focus effect for tab buttons */
    .tab-button:focus {
        outline: none;
        box-shadow: 0 0 0 2px rgba(29, 78, 216, 0.4); /* Soft blue outline on focus */
    }

    /* Styling for active tab */
    .tab-button.active {
        font-weight: bold;
        background-color: #1D4ED8; 
        color: white; 
        border-color: #1D4ED8; /* Border color for active tab */
    }

    /* Tab Content Styling */
    .tab-content {
        display: none; 
        margin-top: 20px;
        opacity: 0;
        transition: opacity 0.3s ease-in-out; 
    }


    .tab-content.active {
        display: block; 
        opacity: 1; 
    }


    .tab-buttons-container {
        display: flex;
        border-bottom: 2px solid #E5E7EB; 
        margin-bottom: 10px;
    }

    .tab-buttons-container li {
        list-style-type: none; 
        margin-right: 10px;
    }

    .tab-buttons-container li:last-child {
        margin-right: 0; 
    }
</style>

</x-app-layout>
