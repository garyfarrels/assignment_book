<x-layout>
    <p class="text-blue-600 text-3xl font-medium text-gray-900 dark:text-white underline">Books List</p>
    <a href="{{ route('books.create') }}" class="inline-flex items-center mt-2 px-3 py-2 text-base font-medium text-blue-600 rounded-lg bg-blue-50 hover:text-blue-900 hover:bg-blue-100 dark:text-blue-400 dark:bg-blue-800 dark:hover:bg-blue-700 dark:hover:text-white mb-3">
        <svg class="h-4 w-4 text-white-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="12" cy="12" r="9" />  <line x1="9" y1="12" x2="15" y2="12" />  <line x1="12" y1="9" x2="12" y2="15" /></svg>Add New Book</a>
    @if(session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Years
                </th>
                <th scope="col" class="px-6 py-3">
                    Slug
                </th>
                <th scope="col" class="px-6 py-3">
                    Author
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    {{ $loop->iteration }}
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $book->name }}
                </th>
                <td class="px-6 py-4">
                    {{ $book->years }}
                </td>
                <td class="px-6 py-4">
                    {{ $book->slug }}
                </td>
                <td class="px-6 py-4">
                    {{ $book->author }}
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('books.show', $book->slug) }}" class="text-white bg-purple-400 hover:bg-purple-500 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:focus:ring-purple-900">Detail</a>
                    <a href="{{ route('books.edit', $book->id) }}" class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:focus:ring-yellow-900">Edit</a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

      
</x-layout>
