<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Book;

class BookController extends Controller
{
 public function index(Request $request){
    $data['books'] = Book::latest()->get();

    if ($request->ajax()) {

        return Datatables::of($data['books'])
                ->addIndexColumn()
                ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editBook">Edit</a>';
                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteBook">Delete</a>';
                        return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }
    $data['title'] = 'Add Boos Item';
    return view('books.index',$data);
}

public function store(Request $request)
{
    // return $request->all();exit; 
    Book::updateOrCreate([
        'id' => $request->book_id
    ],
    [
     'title' => $request->title,
     'author' => $request->author_
    ]);
    return response()->json(['success'=>'Book saved successfully.']);
}

    public function edit($id)
    {
        return Book::findOrFail($id);
    }
    public function destroy($id)
    {
        Book::find($id)->delete();
        return response()->json(['success'=>'Book deleted successfully.']);
    }
}
