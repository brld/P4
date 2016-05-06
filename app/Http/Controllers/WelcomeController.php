<?php
namespace P4\Http\Controllers;
use Illuminate\Http\Request;
use P4\Http\Requests;
class WelcomeController extends Controller
{
  public function getIndex() {

    if(\Auth::check()) {
      return redirect('/books');
    }

    return view('Welcome.index');
  }

  public function getHome() {
    return view('index');
  }
}
