<x-layout>
    <div class="inline-flex items-baseline">
        <p class="text-blue-600 text-2xl font-medium text-gray-900 dark:text-white underline mr-3">Detail Book </p>
        <a href="{{ route('books.index') }}" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 float-right">Back to list</a>
    </div>

    <div id="main" class="grid grid-cols-4">
        <div class="m-4 h-12">
        <img src="{{ asset('img/book.png')}}" class="w-52">
        </div> 
        <div class="m-4 h-12 col-span-3">
            <p class="text-blue-600 text-xl font-medium text-gray-900 dark:text-white underline mr-3">{{ $book->name }}</p>
           <table>
                <tr>
                    <td>Years</td>
                    <td>:{{ $book->years }}</td>
                </tr>
                <tr>
                    <td>Slug</td>
                    <td>:{{ $book->slug }}</td>
                </tr>
                <tr>
                    <td>Author</td>
                    <td>:{{ $book->author }}</td>
                </tr>
           </table>
           
            <a href="{{ route('books.edit', $book) }}" class="inline-flex items-center mt-2 px-3 py-2 text-base font-medium text-blue-600 rounded-lg bg-blue-50 hover:text-blue-900 hover:bg-blue-100 dark:text-blue-400 dark:bg-blue-800 dark:hover:bg-blue-700 dark:hover:text-white mb-3">Edit</a>

        </div> 
    </div>
    {{-- <div class="grid grid-cols-5 gap-3">
        <div class="bg-blue-100">1st col</div>
        <div class="bg-red-100 col-span-4">2nd col</div>
      </div> --}}
</x-layout>
