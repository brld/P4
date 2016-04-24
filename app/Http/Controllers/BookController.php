<?php
namespace P4\Http\Controllers;
use Illuminate\Http\Request;
use P4\Http\Requests;
class BookController extends Controller
{
  public function getIndex() {
    $books = \P4\Book::orderBy('id','title')->get();
    return view('books')->with('books',$books);
  }
  public function getAdd() {
    return view('create-books');
  }
  public function postAdd(Request $request) {
    $this->validate($request,[
      'title' => 'required|min:3|max:30',
    ]);

    $data = $request->only('title');
    \P4\Book::create($data);

    \Session::flash('message','Your book was added');

    return redirect('/books');
  }
  public function getEdit($id = 1) {
    $book = \P4\Book::find($id);
    return view('edit-books')->with('book',$book);
  }
  public function postEdit(Request $request) {
    $book = \P4\Book::find($request->id);

    $book->title = $request->title;

    $book->save();

    \Session::flash('message','Your book was saved');

    return redirect('/books');

  }
  public function getBorrow() {
    return 'Hello world!';
  }
  public function postBorrow() {
    return 'Hello world!';
  }
  public function getRemove() {
    return 'Hello world!';
  }
  public function postRemove() {
    return 'Hello world!';
  }
}
