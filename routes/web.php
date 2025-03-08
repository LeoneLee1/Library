<?php

use App\Models\Book;
use App\Models\User;
use App\Models\Review;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    
    $user = User::count();
    $book = Book::count();
    $borrowings = Borrowing::count();

    return view('welcome',compact('user','book','borrowings'));
});

Route::get('/login',[AuthController::class,'index'])->name('login');
Route::post('/login/process',[AuthController::class,'login'])->name('login.process');
Route::get('/login/register',[AuthController::class,'register'])->name('register');
Route::post('/register/insert',[AuthController::class,'register_insert'])->name('register.insert');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');

// ADMIN MIDDLEWARE WEB
Route::middleware(['auth',AdminMiddleware::class])->group(function () {
    Route::get('/admin', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::prefix('admin/user')->group(function () {
        Route::get('/json', [UserController::class, 'user_json'])->name('user.json');
        Route::get('/', [UserController::class, 'index'])->name('user');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/insert', [UserController::class, 'insert'])->name('user.insert');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/edit/update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::get('/show/{id}', [UserController::class, 'show'])->name('user.show');
        Route::delete('/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
    });

    Route::prefix('admin/book')->group(function () {
        Route::get('/json', [BookController::class, 'book_json'])->name('book.json');
        Route::get('/', [BookController::class, 'index'])->name('book');
        Route::get('/create', [BookController::class, 'create'])->name('book.create');
        Route::post('/insert', [BookController::class, 'insert'])->name('book.insert');
        Route::get('/edit/{id}', [BookController::class, 'edit'])->name('book.edit');
        Route::post('/edit/update/{id}', [BookController::class, 'update'])->name('book.update');
        Route::get('/show/{id}', [BookController::class, 'show'])->name('book.show');
        Route::delete('/delete/{id}', [BookController::class, 'delete'])->name('book.delete');
    });

    Route::prefix('admin/borrowing')->group(function () {
        Route::get('/json', [BorrowController::class, 'borrowing_json'])->name('borrowing.json');
        Route::get('/', [BorrowController::class, 'index'])->name('borrowing');
        Route::get('/create', [BorrowController::class, 'create'])->name('borrowing.create');
        Route::post('/create/insert', [BorrowController::class, 'insert'])->name('borrowing.insert');
        Route::get('/edit/update/{id}', [BorrowController::class, 'update'])->name('borrowing.update');
    });

    Route::prefix('admin/review')->group(function () {
        Route::get('/json', [ReviewController::class, 'review_json'])->name('review.json');
        Route::get('/', [ReviewController::class, 'index'])->name('review.admin');
        Route::get('/create', [ReviewController::class, 'create'])->name('review.create');
        Route::post('/insert', [ReviewController::class, 'insert'])->name('review.insert');
        Route::get('/edit/{id}', [ReviewController::class, 'edit'])->name('review.edit');
        Route::post('/edit/update/{id}', [ReviewController::class, 'update'])->name('review.update');
        Route::get('/show/{id}', [ReviewController::class, 'show'])->name('review.show');
        Route::delete('/delete/{id}', [ReviewController::class, 'delete'])->name('review.delete');
    });
});


// USER WEB
Route::prefix('detail_book')->group(function () {

    Route::get('/', function (){
        $book = Book::orderBy('id','desc')->get();
    
        return view('detail_book',compact('book'));
    })->name('detail.book');
    Route::post('/borrow',[BorrowController::class,'insert'])->name('detail_book.borrow')->middleware('auth');

});

Route::prefix('review')->group(function () {
    Route::get('/', function () {

        $book = DB::select("SELECT * FROM books ORDER BY title ASC");

        return view('review',compact('book'));
    })->name('review');

    Route::post('/insert', function (Request $request) {
        $request->validate([
            'title' => 'required|string',
            'rating' => 'required|integer',
            'review_text' => 'required|string',
        ]);

        $book = Book::where('title',$request->title)->first();

        $review = new Review();
        $review->user_id = Auth::user()->id;
        $review->book_id = $book->id;
        $review->rating = $request->rating;
        $review->review_text = $request->review_text;

        if ($review->save()) {
            return redirect()->back();
        } else {
            toast('Gagal Mengisi Review, Silahkan Coba lagi Beberapa Saat','error');
            return redirect()->back();
        }
        

    })->name('review.insert')->middleware('auth');
});

Route::prefix('profile')->group(function () {
    Route::get('/', function () {
        
        $user_id = Auth::user()->id;

        $book_borrowed = DB::select("SELECT a.*, b.name, c.title, c.author FROM borrowings a
                                    LEFT JOIN users b ON b.id = a.user_id
                                    LEFT JOIN books c ON c.id = a.book_id
                                    WHERE a.user_id = '$user_id' AND a.status = 'Borrowed'
                                    ORDER BY a.updated_at DESC;");

        return view('profile',compact('book_borrowed'));
    })->name('profile')->middleware('auth');
});





