<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailsController extends Controller
{
  public function index(Request $request)
  {
    return view(view: 'details', data: [
      'id' => $request->query(key: 'id', default: '0')
    ]);
  }
}
