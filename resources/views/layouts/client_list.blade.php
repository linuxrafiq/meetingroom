@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="card">
        <div class="card-header"><h3>List of clients<h3></div>
        <div class="card-body">
          @if ($collection!=null && count($collection)>0)
              @foreach ($collection as $item)
              <div class="card" style="width: 38rem;">
                  <div class="card-body">
                    <h5 class="card-title">Company: {{$item->company}}</h5>
                    @if ($item->name != null)
                    <p class="card-text">Name: {{$item->name}}</p>
                    @else
                    <p class="card-text">Name: not recorded</p>
                    @endif
                    @if ($item->email != null)
                    <p class="card-text">Email: {{$item->email}}</p>
                    @else
                    <p class="card-text">Email: not recorded</p>
                    @endif
                    @if ($item->phone != null)
                    <p class="card-text">Phone: {{$item->phone}}</p>
                    @else
                    <p class="card-text">Phone: not recorded</p>
                    @endif
                  </div>
                </div>
              @endforeach
          @else
          <p>You have no room category recorded.</p>
          @endif
        </div>
    </div>
</div>
  
@endsection