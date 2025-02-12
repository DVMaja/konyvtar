<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    public function index()
    {
        //return Book::all();
    }
    public function show($id)
    {
        //return Book::find($id);
    }
    public function destroy($id)
    {
        Book::find($id)->delete();        
        //return redirect('/book/list');
    }
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $book->author = $request->author;
        $book->title = $request->title;        
        $book->save();         
        //return redirect('/book/list');
    }
    public function store(Request $request)
    {
        $book = new Book();
        $book->author = $request->author;
        $book->title = $request->title;        
        $book->save();        
        ///return redirect('/book/list');
    }

    //VIEW-OK
    public function newView()
    {
        $users = User::all();
        //return view('book.new', ['users' => $users]);
    }
    public function editView($id)
    {
        $users = User::all();
        $book = Book::find($id);
        //return view('book.edit', ['users' => $users, 'book' => $book]);
    }
    public function listView()
    {
        $books = Book::all();
        //return view('book.list', ['books' => $books]);
    }

    //Width függvények
    public function bookCopy(){
        //a modelben megírt függvényre hivatkozunk
        return Book::with('copy')->get();       
        //a copy már meg van írva a modellben

    }
}
