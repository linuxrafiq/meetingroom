@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
  <div class="card">
    <div class="card-header"><h3>Create a new room<h3></div>
    <div class="card-body">
      @if (count($categories)>0)
        <form id="form_id" action="{{route('room.store')}}" method="post" enctype="multipart/form-data">
          <div class="from-group">
            <label for="name">Name</label>
            <input type="text" name="name" id ="name_id" class="form-control" placeholder="Name"/><br>
          </div>
          <div class="from-group">
            <select name="category" id="category_id" class="form-control input-lg">
                <option value="">Select Category</option>
                @foreach ($categories as $cat)
                    <option value={{$cat->id}} >{{ $cat->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="from-group">
          <label for="capacity">Capacity</label>
          <input type="number" name="capacity" id ="capacity_id" class="form-control" placeholder="Capacity"/><br>
        </div>
        <div class="from-group">
          <label for="description">Description</label>
          <textarea class="form-control col-xs-12" rows="3" cols="100" id="description_id" name="description" placeholder="Write a description"></textarea>                 
        </div>
        <div class="form-group">
            <label for="feature_image">Feature Image</label>
            <input type="file" name="feature_image" class="form-control" id="feature_image" >
            <p class="help-block">Image must be jpeg,png,jpg,gif,svg and max file size 2M.</p>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name= "projector" id="projector" value='1'>
            <label class="form-check-label" for="projector" >Projector available in this room.</label>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="dashboard" id="dashboard" value='1'>
            <label class="form-check-label" for="dashboard">Dashboard available in this room.</label>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name= "handicapped" id="handicapped" value='1'>
            <label class="form-check-label" for="handicapped">Handicapped facilities available in this room.</label>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name= "active" id="active">
            <label class="form-check-label" for="active">Is this room available for booking</label>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name= "ready" id="ready">
            <label class="form-check-label" for="ready">This room is ready for use.</label>
        </div>
        <div class="form-group">
            <label for="gallery_image">Room gallery</label>
            <input type="file" name="gallery_image[]" class="form-control" id="gallery_image" multiple="multiple" >
            <p class="help-block">Image must be jpeg,png,jpg,gif,svg and max file size 2M.</p>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <br>
        <div class="from-group">
          <button type="submit" value="Submit" class="btn btn-primary btn-lg btn-block">Save </button>
        </div>
    </form> 
      @else
          <p> Please create a room category first</p>
      @endif
      
    </div>
</div>
</div>
  
@endsection