@extends('layouts.base')

@section('content')
<div class="relative items-top min-h-screen bg-gray-100 dark:bg-gray-900 py-4 sm:pt-0">
  <div class="max-w-6xl mx-auto sm:px-12 lg:px-12">
    <div class="pt-8 sm:justify-start sm:pt-0">
      <div class="row p-0">
        <div class="col-6 p-0">
          <h1 class="text-gray-900 dark:text-white">Decameron</h1>
        </div>
        <div class="col-6 p-0">
          <a href="/hotels/create" class="btn btn-primary float-end">Create New Hotel</a>
        </div>
      </div>
    </div>
  </div>

  <div class="d-flex flex-row justify-content-center align-items-center">
    <div class="mt-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg w-50">
      @foreach($hotels as $hotel)
      <div class="row m-0 border-top rounded-top">
        <div class="col p-0">
          <div class="p-6 border-gray-700 dark:border-gray-200">
            <div class="ml-2">
              <div class="text-lg leading-7 font-semibold"><a href="/hotels/{{$hotel->id}}" class="underline text-gray-900">{{$hotel->name}}</a></div>
            </div>

            <div class="ml-2">
              <div class="mt-2 text-gray-700">
                <label>{{$hotel->city}}</label> -
                <label>{{$hotel->address}}</label>
              </div>
            </div>

            <div>
              <a href="/hotels/{{$hotel->id}}/confirmDelete" class="float-end my-2 text-danger ml-2">Delete</a>
              <a href="/hotels/{{$hotel->id}}/edit" class="float-end my-2 text-primary">Edit</a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
</div>
@endsection
