@extends('layouts.base')

@section('content')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 py-4 sm:pt-0">
  <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
      <h1 class="text-gray-900 dark:text-white">Rooms configuration: {{$hotel->name}}</h1>
    </div>

    <div class="row">
      <div class="col">
        <label for="" class="text-gray-900 dark:text-white mt-2">Rooms Number:</label>
        <span class="text-gray-900 dark:text-white">{{$hotel->rooms_number}}</span>

        <a href="/hotels" class="btn btn-secondary float-end ml-2">Back</a>
        <a type="button" class="btn btn-primary float-end @if($countRoomsConfig==$hotel->rooms_number) disabled @endif" href="/hotels/{{$hotel->id}}/rooms_details/create">Add</a>
      </div>
    </div>

    <hr class="text-gray-900 dark:text-white">

    <div class="row">
      <div class="col">
        <h4 class="text-gray-900 dark:text-white">Rooms Details</h4>

        <ul>
          @foreach($hotel->roomsDetails as $detail)
          <li class="text-gray-900 dark:text-white mt-3 py-2">
            {{$detail->type}} |
            {{$detail->category}} |
            {{$detail->quantity}}

            <a href="/rooms_details/edit/{{$detail->id}}" class="btn btn-sm btn-primary float-end">Edit</a>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
  $('.type').change(function(evt) {
    const sencilla = '<option value="sencilla">Sencilla</option>';
    const doble = '<option value="doble">Doble</option>';
    const triple = '<option value="triple">Triple</option>';
    const cuadruple = '<option value="cuadruple">Cuádruple</option>';
    const choose = '<option selected value="">Select a category</option>';

    let options = choose;

    $('.category').prop("disabled", false);

    /* Set dynamic options */
    if ($(this).val() == 'standard') {
      options += `${sencilla}${doble}`;
    } else if ($(this).val() == 'junior') {
      options += `${triple}${cuadruple}`;
    } else if ($(this).val() == 'suite') {
      options += `${sencilla}${doble}${triple}`;
    } else {
      $('.category').prop("disabled", true);
    }

    $('.category').html(options);
  });
</script>
@endsection
