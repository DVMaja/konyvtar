<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    public function index(){
        return Book::all();
    }
    public function show($id){
        return Book::find($id);
    }
    public function destroy($id){
        Book:: find($id)->delete();
        //még nem létetik az útvonal
        return redirect('/book/list');
    }
    public function update(Request $request,$id){
        $book = Book:: find($id);
        $book->author = $request->author;
        $book->title = $request->title;
        $book->pieces = $request->pieces;
        $book->save();
        //még nem létetik 
        return redirect('/book/list');
    }
    public function store(Request $request){
        $book = new Book();
        $book->author = $request->author;
        $book->title = $request->title;
        $book->pieces = $request->pieces;
        $book->save();
        //még nem létetik 
        return redirect('/book/list');
    }

    //VIEW-OK
    public function newView(){
        $users = User::all();
        return view('task.new', ['users' =>$users]);
    }
    

}
