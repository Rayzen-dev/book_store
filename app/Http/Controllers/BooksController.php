<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Books;

use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$books = DB::table('books')->get();
		return view('books.index', ['books' => $books]);
	}

	public function create(Request $request)
	{
		return view('books.create');
	}

	public function addBook(Request $request)
	{
		$join = DB::table('books')
			->where('name', (string)$request->input('title'))
			->where('author', (string)$request->input('author'))
			->first();

		if(isset($join->inventory)) {
			DB::table('books')
				->update([
					'inventory' => $join->inventory + (int)$request->input('quantity'),
					'destroy' => false
				]);

			return redirect('book');
		}

		$book = new Books;
		$book->name = $request->input('title');
		$book->author = $request->input('author');
		$book->inventory = (int) $request->input('quantity');
		$book->destroy = false;
		$book->timestamps = false;
		$book->save();
		return redirect('book');
	}

	public function update($id)
	{
		$books = DB::table('books')->where('id', '=', $id)->first();
		return view('books/update', ['books' => $books]);
	}

	public function updateBook(Request $request, $id)
	{
		DB::table('books')->where('id', $id)->update([
			'name' => $request->input('title'),
			'author' => $request->input('author')
		]);

		return redirect('book');
	}

	public function delete($id)
	{
		$join = DB::table('books')
			->where('id', $id)
			->first();
		DB::table('books')->where('id', $id)->update([
			'inventory' => $join->inventory -1
		]);
		return redirect('book');
	}

	public function getBooks()
	{
		DB::table('books')->get();
		#return view('');
	}
}
