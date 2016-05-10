<?php
namespace P4\Http\Controllers;
use Illuminate\Http\Request;
use P4\Http\Requests;
class WelcomeController extends Controller
{
  public function getIndex() {

    return view('welcome.index');
  }
}
