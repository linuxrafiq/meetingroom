
@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
  <div class="card">
    <div class="card-header"><h3>Create a new booking category<h3></div>
    <div class="card-body">
      <form id="form_id" action="{{route('bookingCategory.store')}}" method="post">
        <div class="from-group">
          <label for="name">Name</label>
          <input type="text" name="name" id ="name_id" class="form-control" placeholder="Category Name"/><br>
        </div>
        <div class="from-group">
          <label for="desc">Description</label>
          <textarea class="form-control col-xs-12" rows="7" cols="100" id="description_id" name="description" placeholder="Write a description"></textarea>                 
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <br>
        <div class="from-group">
          <button type="submit" value="Submit" class="btn btn-primary btn-lg btn-block">Save </button>
        </div>
    </form> 
    </div>
</div>
</div>
  
@endsection