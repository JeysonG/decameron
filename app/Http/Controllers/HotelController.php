<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('hotel.index', [
      'hotels' => Hotel::all()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('hotel.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $hotel = new Hotel();
    $hotel->name = $request->get('name');
    $hotel->address = $request->get('address');
    $hotel->city = $request->get('city');
    $hotel->nit = $request->get('nit');
    $hotel->rooms_number = $request->get('rooms_number');

    $hotel->save();
    return redirect('/hotels');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $hotel = Hotel::find($id);
    return view('hotel.edit', [
      'hotel' => $hotel
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $hotel = Hotel::find($id);
    $hotel->name = $request->get('name');
    $hotel->address = $request->get('address');
    $hotel->city = $request->get('city');
    $hotel->nit = $request->get('nit');
    $hotel->rooms_number = $request->get('rooms_number');

    $hotel->save();
    return redirect('/hotels');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $hotel = Hotel::find($id);
    $hotel->delete();

    return redirect('/hotels');
  }

  /* Confirm delete function */
  public function confirmDelete($id)
  {
    $hotel = Hotel::find($id);
    return view('hotel.confirmDelete', [
      'hotel' => $hotel
    ]);
  }
}
