<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function  index(){
    return Book::all();
}
public function  show(){
    return Book::id();
}
public function destroy ($id){
 Book::find($id)->delete();
 return redirect('/book/list');
}
public function update(Request $request, $id){
    $book = Book::find($id);
    $book->author = $request->author;
    $book->title = $request->title;
    $book->pieces = $request->pieces;
    $book->save();
    return redirect('/book/list');
}
public function store(Request $request){
    $book = new Book();
    $book->author = $request->author;
    $book->title = $request->title;
    $book->pieces = $request->pieces;
    $book->save();
    return redirect('/book/list');
}
public function  newView(){
    $books = Book::all();
    return view('books.new', ['books'=>$books]);
}
public function  editView($id){
    $books = Book::all();
    $book = Book::find($id);
    return view('books.edit', ['books'=>$books , 'book'=>$book]);
}
public function listView(){
    $books = Book::all();
    return view('books.list', ['books'=>$books]);
}

}
