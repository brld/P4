<?php
namespace P4\Http\Controllers;
use Illuminate\Http\Request;
use P4\Http\Requests;
class BookController extends Controller
{
  public function getIndex() {
    $books = \P4\Book::orderBy('id','title')->get();


    if (is_null($books)) {
      \Session::flash('message','Book not found');
      return redirect('/');
    }
    return view('books.books')->with('books',$books);
  }
  public function getNew() {
    $past_two_days = \Carbon\Carbon::today()->subDays(1);
    $books = \P4\Book::whereDate('created_at','>',$past_two_days)->get();

    return view('books.new')->with('books',$books);
  }
  public function getAdd() {

    $owners_for_dropdown = \P4\Owner::ownersForDropdown();

    $tags_for_checkboxes = \P4\Tag::getTagsForCheckboxes();
    return view('books.create')
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

    $data = $request->only(['title','owner_id']);

    $book = \P4\Book::create($data);

    $tags = ($request->tags) ?: [];
    $book->tags()->sync($tags);
    $book->save();

    \Session::flash('message','Your book was added');

    return redirect('/books');
  }
  public function getEdit($id = 1) {
    $book = \P4\Book::with('tags')->find($id);

    if ($book->borrowed==TRUE) {
      \Session::flash('message','You cannot edit borrowed books');
      return redirect('/books');
    }

    $owners_for_dropdown = \P4\Owner::ownersForDropdown();

    $tags_for_checkboxes = \P4\Tag::getTagsForCheckboxes();

    $tags_for_this_book = [];
    foreach ($book->tags as $tag) {
      $tags_for_this_book[] = $tag->id;
    }

    return view('books.edit')
      ->with('book',$book)
      ->with('owners_for_dropdown',$owners_for_dropdown)
      ->with('tags_for_checkboxes',$tags_for_checkboxes)
      ->with('tags_for_this_book',$tags_for_this_book);
  }
  public function postEdit(Request $request) {

    $messages = [
      'not_in' => 'You have to choose an owner.',
    ];

    $this->validate($request,[
      'title' => 'required|min:3|max:30',
      'owner_id' => 'not_in:0',
    ],$messages);

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

    return view('books.borrow')->with('book',$book);
  }
  public function postBorrow(Request $request) {
    $book = \P4\Book::find($request->id);


    $book->borrowed = TRUE;
    $book->borrowed_for = $request->time;

    $book->save();
    # Get the current logged in user
    $user = \Auth::user();

    # If user is not logged in, make them log in
    if(!$user) return redirect()->guest('login');

    # Grab any book, just to use as an example

    # Create an array of data, which will be passed/available in the view
    $data = array(
        'user' => $user,
        'book' => $book,
    );

    \Mail::send('emails.book-return', $data, function($message) use ($user,$book) {

        $recipient_email = $user->email;
        $recipient_name  = $user->first_name;
        $subject  = 'Borrowing confirmation for '.$book->title;

        $message->to($recipient_email, $recipient_name)->subject($subject);

    });

    \Session::flash('message','You have borrowed that book.');

    return redirect('/books');
  }

  public function getConfirmDelete($id) {

    $book = \P4\Book::find($id);

    return view('books.delete')->with('book', $book);
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


  public function getConfirmReturn($id) {
    $book = \P4\Book::find($id);

    return view('books.return')->with('book',$book);

  }

  public function getDoReturn($id) {
    $book = \P4\Book::find($id);

    $book->borrowed=FALSE;

    $book->save();

    \Session::flash('message',$book->title.' has been returned.');
    return redirect('/books');
  }

  public function getSearch() {
    return view('books.search');
  }

  /**
  * Responds to requests to POST /book/search/
  * This method is used in response to an ajax request from GET /book/search
  * See /public/js/search.js
  */
  public function postSearch(Request $request) {

      # Do the search with the provided search term
      $books = \P4\Book::where('title','LIKE','%'.$request->searchTerm.'%')->get();

      # Return the view with the books
      return view('books.search-ajax')->with(
          ['books' => $books]
      );
  }

}
