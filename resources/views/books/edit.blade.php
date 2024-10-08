<x-layout>
    <div class="inline-flex items-baseline">
        <p class="text-blue-600 text-3xl font-medium text-gray-900 dark:text-white underline mr-3">Edit Book </p>
        <a href="{{ route('books.index') }}" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 text-right">Back to list</a>
    </div>
    @if(session('error'))
    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <span class="font-medium">{{ session('error') }}</span>
    </div>
    @endif
    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="Name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Name</label>
            <input type="text" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('name',$book->name) }}" required />
        </div>
        <div>
            <label for="Name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Years</label>
            <input type="text" name="years" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('years', $book->years) }}" required />
        </div>
        {{-- <div>
            <label for="Name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Slug</label>
            <input type="text" name="slug" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('author', $book->author) }}" required />
        </div> --}}
        <div>
            <label for="Name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Author</label>
            <input type="text" name="author" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('author', $book->author) }}"required />
        </div>
     
        <button type="submit" class="mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Update</button>
    </form>
</x-layout>
