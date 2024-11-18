<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index(Request $request)
    {

        $request->search = preg_replace("/[^A-Za-z0-9]/", "", $request->search ?? '');
        $books = Book::where('name', 'like', '%' . $request->search . '%')
            ->orWhere('author_name', 'like', '%' . $request->search . '%')
            ->orWhere('register_number', 'like', '%' . $request->search . '%')
            ->orWhere('genre', 'like', '%' . $request->search . '%')
            ->orderBy('id', 'desc')->get();

        return view('book.index', [
            'books' => $books,
            'search' => $request->search
        ]);
    }

    public function create(Request $request)
    {
        $requestMethod = request()->method();
        if ($requestMethod === 'GET') {
            return view('book.create', ['genres' => Book::getGenres()]);
        } else if ($requestMethod === 'POST') {

            $request->validate([
                'name' => 'required',
                'author_name' => 'required',
                'register_number' => 'required|regex:/^[A-Za-z0-9]+$/',
                'genre' => 'required'
            ],
            [
                'name.required' => __('book.form_required.name'),
                'author_name.required' => __('book.form_required.author_name'),
                'register_number.required' => __('book.form_required.register_number'),
                'register_number.regex' => __('book.form_required.register_number_regex'),
                'genre.required' => __('book.form_required.genre'),
            ]);

            return Book::createBook($request);
        }
    }

    public function update(Request $request, int $id)
    {
        $requestMethod = request()->method();
        if ($requestMethod === 'GET') {
            $book = Book::findOrFail($id);
            return view('book.edit', [
                'book' => $book,
                'genres' => Book::getGenres()
            ]);
        } else if ($requestMethod === 'PUT') {
            // TODO: Validate the request

            return Book::updateBook($request);
        }
    }
}
