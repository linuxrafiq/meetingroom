
@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
      <div class="card">
          <div class="card-header"><h3>Update selected room category<h3></div>

          <div class="card-body">
            <form id="form_id"action="{{route('roomCategory.update',$item->id)}}" method="post">
              <div class="from-group">
                <label for="name">Name</label>
                <input type="text" name="name" id ="name_id" class="form-control" placeholder="Category name" value={{$item->name}}/><br>
              </div>
              @if ($item->description != null)
              <div class="from-group">
                <label for="desc">Description</label>
                <textarea class="form-control col-xs-12" rows="7" cols="100" id="description_id" name="description">{{$item->description}}</textarea>                 
              </div>
              @else
              <div class="from-group">
                <label for="desc">Description</label>
                <textarea class="form-control col-xs-12" rows="7" cols="100" id="description_id" name="description" placeholder="Write a description"></textarea>                 
              </div>
              @endif
              
              <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
              @method('PUT')
              <br>
              <div class="from-group">
                <button type="submit" value="Submit" class="btn btn-primary btn-lg btn-block">Update </button>
              </div>
          </form> 
          </div>
      </div>
  </div>
</div>
  
@endsection