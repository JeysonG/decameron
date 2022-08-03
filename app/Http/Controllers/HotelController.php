<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    /* Validate hotel information */
    $validData = $request->validate([
      'name' => 'required|min:3|unique:hotels',
      'address' => 'required|min:3',
      'city' => 'required|min:3',
      'nit' => 'required|min:3|unique:hotels',
      'rooms_number' => 'required|integer'
    ]);

    $hotel = new Hotel();
    $hotel->name = $validData['name'];
    $hotel->address = $validData['address'];
    $hotel->city = $validData['city'];
    $hotel->nit = $validData['nit'];
    $hotel->rooms_number = $validData['rooms_number'];

    $hotel->save();
    return redirect('/hotels');
  }

  /**
   * Display the specified resource.
   *
   * @param  Hotel  $hotel
   * @return \Illuminate\Http\Response
   */
  public function show(Hotel $hotel)
  {
    $countRoomsConfig = DB::table('rooms_details')->where('hotel_id', $hotel->id)->sum('quantity');
    return view('hotel.show', [
      'hotel' => $hotel,
      'countRoomsConfig' => $countRoomsConfig
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $hotel = Hotel::findOrFail($id);
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
    /* Validate hotel information */
    $validData = $request->validate([
      'name' => 'required|min:3|unique:hotels,name,' . $id,
      'address' => 'required|min:3',
      'city' => 'required|min:3',
      'nit' => 'required|min:3|unique:hotels,nit,' . $id,
      'rooms_number' => 'required|integer'
    ]);

    $hotel = Hotel::findOrFail($id);
    $hotel->name = $validData['name'];
    $hotel->address = $validData['address'];
    $hotel->city = $validData['city'];
    $hotel->nit = $validData['nit'];
    $hotel->rooms_number = $validData['rooms_number'];

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
