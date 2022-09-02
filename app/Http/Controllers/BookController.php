<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use BeyondCode\Vouchers\Facades\Vouchers;

class BookController extends Controller
{
    public function index () {

        $books = Book::paginate(10);
        return view('books.index', compact('books'));
    }


    public function attachVoucher ($id) {

        $book = Book::findOrFail($id);
        
        // Create 5 vouchers associated to the videoCourse model.
        // $vouchers = Vouchers::create($book, 5);

        // Returns an array of Vouchers
        // $vouchers = $book->createVouchers(2);

        // Returns a single Voucher model instance
        // $vouchers = $book->createVoucher();

        /* Vouchers with additional data */

        $vouchers = $book->createVouchers(2, [
            'from' => 'Nazir',
            'message' => 'This one is for you. I hope you like it'
        ]);

        dd($vouchers);
    }

}
