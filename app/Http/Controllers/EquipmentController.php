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
  public function getAdd() {
    $owners_for_dropdown = \P4\Owner::ownersForDropdown();

    $equipment_tags_for_checkboxes = \P4\Tag::getEquipmentTagsForCheckboxes();
    return view('equipment.create-equipment')
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

  public function getConfirmDelete($id) {

    $equipment = \P4\equipment::find($id);

    return view('equipment.delete')->with('equipment', $equipment);
  }

  public function getDoDelete($id) {

      # Get the equipment to be deleted
      $equipment = \P4\equipment::find($id);

      if(is_null($equipment)) {
          \Session::flash('message','equipment not found.');
          return redirect('\equipments');
      }

      # First remove any tags associated with this equipment
      if($equipment->tags()) {
          $equipment->tags()->detach();
      }

      # Then delete the equipment
      $equipment->delete();

      # Done
      \Session::flash('message',$equipment->title.' was deleted.');
      return redirect('/equipments');

  }

  public function getSearch() {
    return view('equipment.search');
  }

  /**
  * Responds to requests to POST /book/search/
  * This method is used in response to an ajax request from GET /book/search
  * See /public/js/search.js
  */
  public function postSearch(Request $request) {

      # Do the search with the provided search term
      $equipment = \P4\Equipment::where('item','LIKE','%'.$request->searchTerm.'%')->get();

      # Return the view with the books
      return view('equipment.search-ajax')->with(
          ['equipment' => $equipment]
      );
  }
}
