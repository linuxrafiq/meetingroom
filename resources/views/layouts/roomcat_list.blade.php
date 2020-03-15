
@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="card">
        <div class="card-header"><h3>List of room category type<h3></div>
        <div class="card-body">
          @if ($collection!=null && count($collection)>0)
              @foreach ($collection as $item)
              <div class="card" style="width: 38rem;">
                  <div class="card-body">
                    <h5 class="card-title">{{$item->name}}</h5>
                    @if ($item->description != null)
                    <p class="card-text">{{$item->description}}</p>
                    @else
                    <p class="card-text">No description found for this room category.</p>
                    @endif
                    <a href='{{route('roomCategory.edit', $item->id)}}'>Update</a>
                    <form method="POST" action="{{ route('roomCategory.destroy', $item->id) }}" class='pull-right' accept-charset="UTF-8">
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="submit" class="btn btn-danger" value='Delete'/>
                      </form>
                  </div>
                </div>
              @endforeach
          @else
          <h3>You have no room category recorded.</h3>
          @endif
        </div>
    </div>
</div>
  
@endsection