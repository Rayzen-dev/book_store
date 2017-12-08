<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Customers;
use App\Loan;
use App\LoanHistory;

class CustomersController extends Controller
{
    
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$customers = DB::table('customers')->get();
		return view('customers.index', ['customers' => $customers]);
	}

	public function create()
	{
		return view('customers.create');
	}

	public function addCustomer(Request $request)
	{
		$customer = new Customers;
		$customer->name = $request->input('name');
		$customer->firstname = $request->input('firstname');
		$customer->mail = $request->input('email');
		$customer->timestamps = false;
		$customer->save();

		return redirect('customer');
	}

	public function read($id)
	{
		$customers = DB::table('customers')->where('id', '=', $id)->first();
		$history = DB::table('loansHistory')
			->join('customers', function($join) {
				$join->on('loansHistory.id_customer', "=", 'customers.id');
			})->where('customers.id', $id)
			->join('books', 'loansHistory.id_book', '=', 'books.id')
			->orderBy('books.name', 'asc')
			->get();
		return view('customers.profile', ['customers' => $customers, 'history' => $history]);
	}

	public function loan($id)
	{
		$customers = DB::table('customers')->where('id', '=', $id)->first();
		$books = DB::table('books')
			->orderBy('name', 'asc')
			->get();
		return view('customers/loan', ['books' => $books, 'customers' => $customers]);
	}

	public function update($id)
	{
		$customers = DB::table('customers')->where('id', '=', $id)->first();
		return view('customers/update', ['customers' => $customers]);
	}

	public function updateCustomer(Request $request, $id)
	{
		DB::table('customers')->where('id', $id)->update([
			'name' => $request->input('name'),
			'firstname' => $request->input('firstname'),
			'mail' => $request->input('mail')
		]);
		return redirect('customer');
	}

	public function delete($id)
	{
		DB::table('customers')->where('id', "=", $id)->delete();
		return redirect('customer');
	}

}
