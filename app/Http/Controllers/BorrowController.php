<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class BorrowController extends Controller
{
    public function borrowing_json(){

        $data = DB::select("SELECT a.*, b.name, c.title FROM borrowings a
                        LEFT JOIN users b ON b.id = a.user_id
                        LEFT JOIN books c ON c.id = a.book_id
                        ORDER BY a.updated_at DESC;");
        
        return DataTables::of($data)
        ->addIndexColumn()
        ->make(true);
    }

    public function index(){
        return view('admin.borrowing.index');
    }

    public function create(){

        $book = Book::orderBy('title','asc')->get();

        return view('admin.borrowing.create',compact('book'));
    }

    public function insert(Request $request){
        $request->validate([
            'title' => 'required|string',
        ]);

        $book_status = Book::where('title',$request->title)->first();

        $borrowing = new Borrowing();
        $borrowing->user_id = Auth::user()->id;
        $borrowing->book_id = $book_status->id;
        $borrowing->borrow_date = Carbon::now()->format('Y-m-d');

        $book_status->status = 'Borrowed';
        $book_status->save();

        if ($borrowing->save()) {
            toast('Berhasil Menambah Data','success');
            return redirect()->route('detail.book');
        } else {
            toast('Gagal Menambah Data','error');
            return redirect()->back();
        }
        
    }

    public function update(Request $request, $id){
        $request->validate([
            'return_date' => 'date',
        ]);

        $borrowing = Borrowing::findOrFail($id);
        $borrowing->return_date = Carbon::now()->format('Y-m-d');
        $borrowing->status = 'Returned';

        $book = Book::where('id', $borrowing->book_id)->first();
        $book->status = 'Available';
        $book->save();

        if ($borrowing->save()) {
            toast('Berhasil Update Data','success');
            return redirect()->back();
        } else {
            toast('Gagal Update Data','error');
            return redirect()->back();
        }
    }
}
