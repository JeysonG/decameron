@extends('layouts.base')

@section('content')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 py-4 sm:pt-0">
  <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
      <h1 class="text-white">Edit Detail: {{$hotel->name}}</h1>
    </div>

    <div class="row">
      <div class="col">
        <label for="" class="text-white mt-2">Rooms Number:</label>
        <span class="text-white">{{$hotel->rooms_number}}</span>
        <a href="/hotels/{{$hotel->id}}" class="btn btn-secondary float-end">Back</a>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <label for="" class="text-white mt-2">Rooms without config:</label>
        <span class="text-white">{{$hotel->rooms_number - $countRoomsConfig}}</span>
      </div>
    </div>

    <hr class="text-white">

    <div class="row">
      <div class="col">
        @if($errors->any())
        <div class="alert alert-danger mt-2">
          @foreach($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
        </div>
        @endif

        <form action="/rooms_details/{{$rooms_detail->id}}" method="POST">
          @csrf
          @method('put')
          <div class="form-group">
            <label class="text-white">Type</label>
            <select name="type" id="type" class="form-select type" aria-label="Select type">
              <option selected value="">Select a type</option>
              <option @if(old('type')=='standard' || $rooms_detail->type == 'standard') selected @endif value="standard">Standard</option>
              <option @if(old('type')=='junior' || $rooms_detail->type == 'junior') selected @endif value="junior">Junior</option>
              <option @if(old('type')=='suite' || $rooms_detail->type == 'suite') selected @endif value="suite">Suite</option>
            </select>
          </div>
          <div class="form-group mt-2">
            <label class="text-white">Category</label>
            <select name="category" id="category" class="form-select category" aria-label="Select category">
              <option selected value="">Select a category</option>
              <option @if(old('category')=='sencilla' || $rooms_detail->category == 'sencilla') selected @endif value="sencilla">Sencilla</option>
              <option @if(old('category')=='doble' || $rooms_detail->category == 'doble') selected @endif value="doble">Doble</option>
              <option @if(old('category')=='triple' || $rooms_detail->category == 'triple') selected @endif value="triple">Triple</option>
              <option @if(old('category')=='cuadruple' || $rooms_detail->category == 'cuadruple') selected @endif value="cuadruple">Cuádruple</option>
            </select>
          </div>
          <div class="form-group mt-2">
            <label class="text-white">Quantity</label>
            <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Type quantity" value="@if(old('quantity')){{old('quantity')}}@else{{$rooms_detail->quantity}}@endif">
          </div>

          <button type="submit" class="btn btn-primary mt-2 float-end">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
