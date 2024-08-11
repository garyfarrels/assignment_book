<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DB;


class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'years' => 'required|string',
            // 'slug' => 'required|string|unique:books,slug',
            'author' => 'required|string|max:255',
        ]);

        $exist_book = DB::table('books')->where("name", $request->input('name'))->first();
        if(!$exist_book){
            $slug = Str::slug($request->input('name'));
            $currentTimestamp = Carbon::now();
            
            Book::create([
                'name' => $request->input('name'),
                'years' => $request->input('years'),
                'slug' => $slug,
                'author' => $request->input('author'),
                'created_at' => $currentTimestamp,
            ]);
            return redirect()->route('books.index')->with('success', 'Book created successfully.');
            
        }else{
            return redirect()->route('books.create')->with('error', 'Book already exist.');

        }


    }

    public function show($slug)
    {
        $book = Book::where('slug', $slug)->firstOrFail();
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        // $book = Book::where('slug', $slug)->firstOrFail();
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        // $book = Book::where('slug', $slug)->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:255',
            'years' => 'required|integer',
            // 'slug' => 'required|string|unique:books,slug,' . $book->id,
            'author' => 'required|string|max:255',
        ]);
 
        $slug = Str::slug($request->input('name'));

        $exist_book = DB::table('books')->where("slug", $slug)->first();
        if(!$exist_book){
            $slug = Str::slug($request->input('name'));

            // $book->update($request->all());
            $book = Book::where('id', $book->id)
            ->update([
            'name' => $request->input('name'),
            'years' => $request->input('years'),
            'slug' => $slug,
            'author' => $request->input('author')]);
            return redirect()->route('books.index')
                             ->with('success', 'Book updated successfully.');
        }else{
            return redirect()->route('books.edit',$book->id)
                             ->with('error', 'Book slug already exist. Please rename the input name');

        }

    }

    public function destroy(Book $book)
    {
        // $book = Book::where('slug', $slug)->firstOrFail();
        $book->delete();
        return redirect()->route('books.index')
                         ->with('success', 'Book deleted successfully.');
    }
}
