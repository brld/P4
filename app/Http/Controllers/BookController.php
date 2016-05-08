<?php
namespace P4\Http\Controllers;
use Illuminate\Http\Request;
use P4\Http\Requests;
class BookController extends Controller
{
  public function getIndex() {
    $books = \P4\Book::orderBy('id','title')->get();
    $user = \P4\User::with('first_name','last_name')->find(\Auth::id());


    if (is_null($books)) {
      \Session::flash('message','Book not found');
      return redirect('/');
    }
    return view('books')->with('books',$books)->with('user',$user);
  }
  public function getAdd() {

    $owners_for_dropdown = \P4\Owner::ownersForDropdown();

    $tags_for_checkboxes = \P4\Tag::getTagsForCheckboxes();
    return view('create-books')
      ->with('owners_for_dropdown', $owners_for_dropdown)
      ->with('tags_for_checkboxes', $tags_for_checkboxes);
  }
  public function postAdd(Request $request) {

    $messages = [
      'not_in' => 'You have to choose an owner.',
    ];

    $this->validate($request,[
      'title' => 'required|min:3|max:30',
      'owner_id' => 'not_in:0'
    ],$messages);

    $data = $request->only(['title','owner_id','user_id']);

    $book = \P4\Book::create($data);

    $tags = ($request->tags) ?: [];
    $book->tags()->sync($tags);
    $book->save();

    \Session::flash('message','Your book was added');

    return redirect('/books');
  }
  public function getEdit($id = 1) {
    $book = \P4\Book::with('tags')->find($id);

    $owners_for_dropdown = \P4\Owner::ownersForDropdown();

    $tags_for_checkboxes = \P4\Tag::getTagsForCheckboxes();

    $tags_for_this_book = [];
    foreach ($book->tags as $tag) {
      $tags_for_this_book[] = $tag->id;
    }

    return view('edit-books')
      ->with('book',$book)
      ->with('owners_for_dropdown',$owners_for_dropdown)
      ->with('tags_for_checkboxes',$tags_for_checkboxes)
      ->with('tags_for_this_book',$tags_for_this_book);
  }
  public function postEdit(Request $request) {
    $book = \P4\Book::find($request->id);


    $book->title = $request->title;
    $book->owner_id = $request->owner_id;

    if ($request->tags) {
      $tags = $request->tags;
    }
    else {
      $tags = [];
    }
    $book->tags()->sync($tags);

    $book->save();

    \Session::flash('message','Your book was saved');

    return redirect('/books');

  }
  public function getBorrow($id = 1) {
    $book = \P4\Book::find($id);
    $user = \P4\User::find($id);

    return view('borrow-books')->with('book',$book)->with('user',$user);
  }
  public function postBorrow(Request $request) {
    $book = \P4\Book::find($request->id);
    $user = \P4\User::find(\Auth::id());


    $book->borrowed = TRUE;
    // $book->borrowedBy = $user->first_name;

    $book->save();

    \Session::flash('message','You have borrowed that book.');

    return redirect('/books');
  }
  public function getRemove() {
    return 'Hello world!';
  }
  public function postRemove() {
    return 'Hello world!';
  }

  public function getConfirmDelete($id) {

    $book = \P4\Book::find($id);

    return view('delete')->with('book', $book);
  }

  public function getDoDelete($id) {

      # Get the book to be deleted
      $book = \P4\Book::find($id);

      if(is_null($book)) {
          \Session::flash('message','Book not found.');
          return redirect('\books');
      }

      # First remove any tags associated with this book
      if($book->tags()) {
          $book->tags()->detach();
      }

      # Then delete the book
      $book->delete();

      # Done
      \Session::flash('message',$book->title.' was deleted.');
      return redirect('/books');

  }

}
