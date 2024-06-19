<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Product') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-start mb-4">
                <a href="{{ route('product.create') }}" class="bg-blue-800 dark:bg-green-800 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded">
                    Add Product
                </a>
            </div>
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg overflow-x-auto p-6"> 
                <table class="border-separate border border-slate-500 table-auto w-full">
                    <thead>
                      <tr>
                        <th class="border border-slate-600">Num</th>
                        <th class="border border-slate-600">Name</th>
                        <th class="border border-slate-600">Image</th>
                        <th class="border border-slate-600">Price</th>
                        <th class="border border-slate-600">Description</th>
                        <th class="border border-slate-600">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td class="border border-slate-700 text-center">{{ $product->id }}</td>
                            <td class="border border-slate-700 text-center">{{ $product->name }}</td>
                            <td class="border border-slate-700 align-middle text-center">
                                <img src="{{ $product->image_url }}" width="100" class="mx-auto">
                            </td>                            
                            <td class="border border-slate-700 text-justify">{{ $product->price }}</td>
                            <td class="border border-slate-700 text-justify">{{ $product->description }}</td>
                            <td class="border border-slate-700 text-center align-middle">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('product.edit', $product->id) }}" class="flex-1 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded text-center">Edit</a>
                                    <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="flex-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 rounded">Delete</button>
                                    </form>
                                </div>
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
