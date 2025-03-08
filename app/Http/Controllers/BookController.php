<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class BookController extends Controller
{
    public function book_json(){
        $data = Book::orderBy('id','desc')->get();

        return DataTables::of($data)
        ->addIndexColumn()
        ->make(true);
    }

    public function index(){

        $title = 'Delete Book?';
        $text = 'Are you sure you want to delete?';
        confirmDelete($title,$text);

        return view('admin.book.index');
    }

    public function create(){
        return view('admin.book.create');
    }

    public function insert(Request $request){
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'publisher' => 'required|max:255',
            'published_year' => 'required',
        ]);

        $book = new Book();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->published_year = $request->published_year;
        $book->status = 'Available';

        if ($book->save()) {
            toast('Berhasil Menambah Data','success');
            return redirect()->route('book');
        } else {
            toast('Gagal Menambah Data','error');
            return redirect()->back();
        }
    }

    
    public function edit($id){
        $book = Book::findOrFail($id);

        return view('admin.book.edit',compact('book'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'publisher' => 'required|max:255',
            'published_year' => 'required',
        ]);

        $book = Book::findOrFail($id);
        $book->title = $request->title;
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->published_year = $request->published_year;

        if ($book->save()) {
            toast('Berhasil Mengubah Data','success');
            return redirect()->route('book');
        } else {
            toast('Gagal Mengubah Data','error');
            return redirect()->back();
        }
    }
    
    public function show($id){
        $data = Book::findOrFail($id);

        return view('admin.book.show',compact('data'));
    }

    public function delete($id){
        $data = Book::findOrFail($id);
        
        if ($data->delete()) {
            toast('Berhasil Menghapus Data','success');
            return redirect()->back();
        } else {
            toast('Gagal Menghapus Data','error');
            return redirect()->back();
        }
    }
}
