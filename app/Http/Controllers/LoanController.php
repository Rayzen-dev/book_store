<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Loan;
use App\LoanHistory;
use App\Books;

class LoanController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	$loans = DB::table('loans')
    		->join('customers', 'loans.id_customer', "=", 'customers.id')
    		->join('books', 'loans.id_book', "=", "books.id")
                           ->join('loansHistory', 'loans.id_book', '=', 'loansHistory.id_book')
                           ->select('customers.id as customer_id', 'customers.name as customer_name', 'customers.firstname as customer_firstname', 'books.id as book_id', 'books.name as book_name', 'books.author as book_author', 'loansHistory.bring_back as book_back')
                           ->where('loansHistory.bring_back', 0)
            	               ->get();
    	return view('loans.index', ['loans' => $loans]);
    }

    public function delete($customer_id, $book_id)
    {
    	# Mettre la suppression dans loansHistory + passer le bool true dans livres rendus
            $join = DB::table('books')
            ->where('id', (int)$book_id)
            ->first();
            DB::table('loansHistory')->where('id_customer', '=', $customer_id)->where('id_book', '=', $book_id)->update([
                'bring_back' => 1
            ]);
            DB::table('loans')->where('id_customer', '=', $customer_id)->where('id_book', '=', $book_id)->delete();
            DB::table('books')->where('id', '=', $book_id)->update([
                    'inventory' => $join->inventory + 1
                ]);

            return redirect('loan');
    }

    public function addLoan(Request $request, $id)
    {

        $join = DB::table('books')
            ->where('id', (int)$request->get('title'))
            ->first();
         DB::table('books')
                ->where('id', (int)$request->get('title'))
                ->update([
                    'inventory' => $join->inventory - 1
         ]);

        $now = new \DateTime();
        $loan = new Loan;
        $loan->id_book = (int) $request->get('title');
        $loan->id_customer = $id;
        $loan->time = $now->format('m-d-y H:i:s');
        $loan->timestamps = false;
        $loan->save();

        if (DB::table('books')->where('id', (int)$request->get('title'))->first()) {
            # code...
        }
        $history = new LoanHistory;
        $history->id_customer = $id;
        $history->id_book = (int) $request->get('title');
        $history->bring_back = false;
        $history->timestamps = false;
        $history->save();


        return redirect("customer/profile/$id");
    }
}
