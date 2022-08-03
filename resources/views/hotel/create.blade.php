@extends('layouts.base')

@section('content')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 py-4 sm:pt-0">
  <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
      <h1 class="text-gray-900 dark:text-white">New Hotel</h1>
    </div>

    <div class="row">
      <div class="col">
        <a href="/hotels" class="btn btn-secondary float-end">Back</a>
      </div>
    </div>

    <hr class="text-gray-900 text-gray-900 dark:text-white">

    <div class="row">
      <div class="col">
        @if($errors->any())
        <div class="alert alert-danger mt-2">
          @foreach($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
        </div>
        @endif

        <form action="/hotels" method="POST">
          @csrf
          <div class="form-group">
            <label class="text-gray-900 dark:text-white">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}" />
          </div>
          <div class="form-group">
            <label class="text-gray-900 dark:text-white">Address</label>
            <input type="text" name="address" id="address" class="form-control" value="{{old('address')}}" />
          </div>
          <div class="form-group">
            <label class="text-gray-900 dark:text-white">City</label>
            <input type="text" name="city" id="city" class="form-control" value="{{old('city')}}" />
          </div>
          <div class="form-group">
            <label class="text-gray-900 dark:text-white">NIT</label>
            <input type="text" name="nit" id="nit" class="form-control" value="{{old('nit')}}" />
          </div>
          <div class="form-group">
            <label class="text-gray-900 dark:text-white">Rooms Number</label>
            <input type="text" name="rooms_number" id="rooms_number" class="form-control" value="{{old('rooms_number')}}" />
          </div>

          <button type="submit" class="btn btn-primary mt-2 float-end">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
