@extends('layouts.base')

@section('content')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 py-4 sm:pt-0">
  <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
      <h1 class="text-gray-900 dark:text-white">Delete Hotel: {{$hotel->name}}</h1>
    </div>

    <div class="row">
      <div class="col">
        <a href="/hotels" class="btn btn-secondary float-end">Back</a>
        <form action="/hotels/{{$hotel->id}}" method="POST">
          @csrf
          @method('delete')

          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
