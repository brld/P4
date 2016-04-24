<?php
namespace P4\Http\Controllers;
use Illuminate\Http\Request;
use P4\Http\Requests;
class EquipmentController extends Controller
{
  public function getIndex() {
    $equipment = \P4\Equipment::orderBy('id','item')->get();
    return view('equipment')->with('equipment',$equipment);
  }
  public function getAdd() {
    return view('create-equipment');
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
}
