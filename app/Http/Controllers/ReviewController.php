<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ReviewController extends Controller
{
    public function review_json(){
        $data = DB::select("SELECT a.*, b.name FROM reviews a
                            LEFT JOIN users b ON b.id = a.user_id
                            ORDER BY a.id DESC;");

        return DataTables::of($data)
        ->addIndexColumn()
        ->make(true);
    }

    public function index(){

        $title = 'Delete Data?';
        $text = 'Are you sure you want to delete?';
        confirmDelete($title,$text);

        return view('admin.review.index');
    }

    public function create(){
        return view('admin.review.create');
    }

    public function insert(Request $request){
        $request->validate([
            'rating' => 'required|integer',
            'review_text' => 'required|string',
        ]);

        $review = new Review();
        $review->rating = $request->rating;
        $review->review_text = $request->review_text;

        if ($review->save()) {
            toast('Berhasil Menambah Data','success');
            return redirect()->route('review.admin');
        } else {
            toast('Gagal Menambah Data','error');
            return redirect()->back();
        }
    }

    
    public function edit($id){
        $review = Review::findOrFail($id);

        return view('admin.review.edit',compact('review'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'rating' => 'required|integer',
            'review_text' => 'required|string',
        ]);

        $review = Review::findOrFail($id);
        $review->rating = $request->rating;
        $review->review_text = $request->review_text;

        if ($review->save()) {
            toast('Berhasil Menambah Data','success');
            return redirect()->route('review.admin');
        } else {
            toast('Gagal Menambah Data','error');
            return redirect()->back();
        }
    }
    
    public function show($id){
        $data = Review::findOrFail($id);

        return view('admin.review.show',compact('data'));
    }

    public function delete($id){
        $data = Review::findOrFail($id);
        
        if ($data->delete()) {
            toast('Berhasil Menghapus Data','success');
            return redirect()->back();
        } else {
            toast('Gagal Menghapus Data','error');
            return redirect()->back();
        }
        
    }
}
