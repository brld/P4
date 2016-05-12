<?php
namespace P4\Http\Controllers;
use Illuminate\Http\Request;
use P4\Http\Requests;
class EquipmentController extends Controller
{
  public function getIndex() {
    $equipment = \P4\Equipment::orderBy('id','item')->get();

    if (is_null($equipment)) {
      \Session::flash('message','Item not found');
      return redirect('/equipment');
    }
    return view('equipment.equipment')->with('equipment',$equipment);
  }

  public function getNew() {
    $past_two_days = \Carbon\Carbon::today()->subDays(1);
    $equipment = \P4\Equipment::whereDate('created_at','>',$past_two_days)->get();

    return view('equipment.new')->with('equipment',$equipment);
  }

  public function getAdd() {
    $owners_for_dropdown = \P4\Owner::ownersForDropdown();

    $equipment_tags_for_checkboxes = \P4\Tag::getEquipmentTagsForCheckboxes();
    return view('equipment.create')
      ->with('owners_for_dropdown', $owners_for_dropdown)
      ->with('equipment_tags_for_checkboxes', $equipment_tags_for_checkboxes);
  }
  public function postAdd(Request $request) {
    $this->validate($request,[
      'item' => 'required|min:3|max:30',
    ]);

    $messages = [
      'not_in' => 'You have to choose an owner.',
    ];

    $this->validate($request,[
      'item' => 'required|min:3|max:30',
      'owner_id' => 'not_in:0'
    ],$messages);

    $data = $request->only(['item','owner_id']);

    $item = \P4\Equipment::create($data);

    $tags = ($request->tags) ?: [];
    $item->tags()->sync($tags);
    $item->save();

    \Session::flash('message','Your item was added');

    return redirect('/equipment');
  }
  public function getEdit($id = 1) {
    $equipment = \P4\Equipment::find($id);

    $owners_for_dropdown = \P4\Owner::ownersForDropdown();

    $equipment_tags_for_checkboxes = \P4\Tag::getEquipmentTagsForCheckboxes();

    $tags_for_this_item = [];
    foreach ($equipment->tags as $tag) {
      $tags_for_this_item[] = $tag->id;
    }

    return view('equipment.edit')
      ->with('equipment',$equipment)
      ->with('owners_for_dropdown',$owners_for_dropdown)
      ->with('equipment_tags_for_checkboxes',$equipment_tags_for_checkboxes)
      ->with('tags_for_this_item',$tags_for_this_item);

  }
  public function postEdit(Request $request) {
    $this->validate($request,[
      'item' => 'required|min:3|max:30',
    ]);

    $messages = [
      'not_in' => 'You have to choose an owner.',
    ];

    $this->validate($request,[
      'item' => 'required|min:3|max:30',
      'owner_id' => 'not_in:0'
    ],$messages);

    $equipment = \P4\Equipment::find($request->id);

    $equipment->item = $request->item;

    $equipment->owner_id = $request->owner_id;

    if ($request->tags) {
      $tags = $request->tags;
    }
    else {
      $tags = [];
    }
    $equipment->tags()->sync($tags);


    $equipment->save();

    \Session::flash('message','Your item was saved');

    return redirect('/equipment');
  }
  public function getBorrow($id = 1) {
    $equipment = \P4\Equipment::find($id);

    return view('equipment.borrow')->with('equipment',$equipment);

  }
  public function postBorrow(Request $request) {
    $equipment = \P4\Equipment::find($request->id);


    $equipment->borrowed = TRUE;

    $equipment->save();

    $equipment->borrowed_for = $request->time;

    $equipment->save();
    # Get the current logged in user
    $user = \Auth::user();

    # If user is not logged in, make them log in
    if(!$user) return redirect()->guest('login');

    # Grab any book, just to use as an example

    # Create an array of data, which will be passed/available in the view
    $data = array(
        'user' => $user,
        'book' => $equipment,
    );

    \Mail::send('emails.book-return', $data, function($message) use ($user,$equipment) {

        $recipient_email = $user->email;
        $recipient_name  = $user->first_name;
        $subject  = 'Borrowing confirmation for '.$equipment->item;

        $message->to($recipient_email, $recipient_name)->subject($subject);

    });

    \Session::flash('message','You have borrowed that item.');

    return redirect('/equipment');
  }

  public function getConfirmDelete($id) {

    $equipment = \P4\Equipment::find($id);

    return view('equipment.delete')->with('equipment', $equipment);
  }

  public function getSearch() {
    return view('equipment.search');
  }

  public function getDoDelete($id) {

      # Get the equipment to be deleted
      $equipment = \P4\Equipment::find($id);

      if(is_null($equipment)) {
          \Session::flash('message','equipment not found.');
          return redirect('\equipment');
      }

      # First remove any tags associated with this equipment
      if($equipment->tags()) {
          $equipment->tags()->detach();
      }

      # Then delete the equipment
      $equipment->delete();

      # Done
      \Session::flash('message',$equipment->item.' was deleted.');
      return redirect('/equipment');

  }


  public function getConfirmReturn($id) {
    $equipment = \P4\Equipment::find($id);

    return view('equipment.return')->with('equipment',$equipment);

  }

  public function getDoReturn($id) {
    $equipment = \P4\Equipment::find($id);

    $equipment->borrowed=FALSE;

    $equipment->save();

    \Session::flash('message',$equipment->item.' has been returned.');
    return redirect('/equipment');
  }


  /**
  * Responds to requests to POST /equipment/search/
  * This method is used in response to an ajax request from GET /equipment/search
  * See /public/js/search.js
  */
  public function postSearch(Request $request) {

      # Do the search with the provided search term
      $equipment = \P4\Equipment::where('item','LIKE','%'.$request->searchTerm.'%')->get();

      # Return the view with the equipments
      return view('equipment.search-ajax')->with(
          ['equipment' => $equipment]
      );
  }
}
