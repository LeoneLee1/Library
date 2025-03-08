<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Borrowing;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){

        $user = User::count();
        $book = Book::count();
        $borrowings = Borrowing::count();

        return view('admin.dashboard',compact('user','book','borrowings'));
    }
}
