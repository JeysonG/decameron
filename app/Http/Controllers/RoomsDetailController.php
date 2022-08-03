<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\RoomsDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class RoomsDetailController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Hotel $hotel)
  {
    $countRoomsConfig = DB::table('rooms_details')->sum('quantity');
    return view('roomsDetail.create', [
      'hotel' => $hotel,
      'countRoomsConfig' => $countRoomsConfig
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request, Hotel $hotel)
  {
    /* Validate rooms details configuration */
    $exist_config =  DB::table('rooms_details as rm')
      ->whereRaw('rm.hotel_id = ? and rm.type = ? and rm.category = ?', [
        $hotel->id, $request->get('type'), $request->get('category')
      ])->first();

    if ($exist_config) {
      echo ($exist_config->id);

      return Redirect::back()->withErrors(['msg' => 'This configuration already exist.']);
    }

    /* Validate hotel information */
    $countRoomsConfig = DB::table('rooms_details')->sum('quantity');
    $validateQuantity = $hotel->rooms_number - $countRoomsConfig;

    $validData = $request->validate([
      'type' => 'required',
      'category' => 'required',
      'quantity' => 'required|integer|lte:' . $validateQuantity
    ]);

    $rooms_detail = new RoomsDetail();
    $rooms_detail->type = $validData['type'];
    $rooms_detail->category = $validData['category'];
    $rooms_detail->quantity = $validData['quantity'];
    $rooms_detail->hotel_id = $hotel->id;

    $rooms_detail->save();
    return redirect('/hotels/' . $hotel->id);
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
    $countRoomsConfig = DB::table('rooms_details')->sum('quantity');
    $rooms_detail = RoomsDetail::findOrFail($id);
    $hotel = Hotel::findOrFail($rooms_detail->hotel_id);
    return view('roomsDetail.edit', [
      'hotel' => $hotel,
      'rooms_detail' => $rooms_detail,
      'countRoomsConfig' => $countRoomsConfig
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
    /* Validate rooms details configuration */
    $exist_config =  DB::table('rooms_details as rm')
      ->whereRaw('rm.id != ? and rm.type = ? and rm.category = ?', [
        $id, $request->get('type'), $request->get('category')
      ])->first();

    if ($exist_config) {
      echo ($exist_config->id);

      return Redirect::back()->withErrors(['msg' => 'This configuration already exist.']);
    }

    /* Validate hotel information */
    $countRoomsConfig = DB::table('rooms_details')->sum('quantity');
    $rooms_detail = RoomsDetail::findOrFail($id);
    $hotel = Hotel::findOrFail($rooms_detail->hotel_id);

    $validateQuantity = ($hotel->rooms_number - $countRoomsConfig) + $rooms_detail->quantity;

    $validData = $request->validate([
      'type' => 'required',
      'category' => 'required',
      'quantity' => 'required|integer|lte:' . $validateQuantity
    ]);

    $rooms_detail->type = $validData['type'];
    $rooms_detail->category = $validData['category'];
    $rooms_detail->quantity = $validData['quantity'];
    $rooms_detail->hotel_id = $hotel->id;

    $rooms_detail->save();
    return redirect('/hotels/' . $hotel->id);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
