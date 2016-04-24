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
    return 'Hello world!';
  }
  public function postAdd() {
    return 'Hello world!';
  }
  public function getEdit() {
    return 'Hello world!';
  }
  public function postEdit() {
    return 'Hello world!';
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
