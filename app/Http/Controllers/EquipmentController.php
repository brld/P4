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
    return view('equipment')->with('equipment',$equipment);
  }
  public function getAdd() {
    $owners_for_dropdown = \P4\Owner::ownersForDropdown();

    $equipment_tags_for_checkboxes = \P4\Tag::getEquipmentTagsForCheckboxes();
    return view('create-equipment')
      ->with('owners_for_dropdown', $owners_for_dropdown)
      ->with('equipment_tags_for_checkboxes', $equipment_tags_for_checkboxes);
  }
  public function postAdd(Request $request) {
    $this->validate($request,[
      'item' => 'required|min:3|max:30',
    ]);

    $data = $request->only('item');
    \P4\Equipment::create($data);

    \Session::flash('message','Your item was added');

    return redirect('/equipment');
  }
  public function getEdit($id = 1) {
    $equipment = \P4\Equipment::find($id);
    return view('edit-equipment')->with('equipment',$equipment);
  }
  public function postEdit(Request $request) {
    $equipment = \P4\Equipment::find($request->id);

    $equipment->item = $request->item;

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

    return view('delete')->with('equipment', $equipment);
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
}
