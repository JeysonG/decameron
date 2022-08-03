@extends('layouts.base')

@section('content')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 py-4 sm:pt-0">
  <div class="max-w-6xl mx-auto sm:px-12 lg:px-12">
    <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
      <h1 class="text-white">Decameron</h1>
    </div>

    <div class="row">
      <div class="col">
        <a href="/hotels/create" class="btn btn-primary">Create New Hotel</a>
      </div>
    </div>

    <div class="mt-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
      @foreach($hotels as $hotel)
      <div class="row">
        <div class="col-12">
          <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
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
              <a href="/hotels/{{$hotel->id}}/confirmDelete" class="float-end mt-2 text-danger ml-2">Delete</a>
              <a href="/hotels/{{$hotel->id}}/edit" class="float-end mt-2 text-primary">Edit</a>
            </div>
          </div>
        </div>
      </div>

      @endforeach
    </div>
  </div>
</div>
@endsection
