<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index()
  {
    return redirect('/hotels');
  }
}
