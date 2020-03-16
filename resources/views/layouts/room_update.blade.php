@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
      <div class="card">
          <div class="card-header"><h3>Update selected room<h3></div>

          <div class="card-body">
            <form id="form_id" method="post" action="{{route('room.update',$item->id)}}" enctype="multipart/form-data">
              <div class="from-group">
                <label for="name">Name</label>
                <input type="text" name="name" id ="name_id" class="form-control" placeholder="Name" value='{{$item->name}}'/><br>
              </div>
              <div class="form-group">
                <select name="category" id="category_id" class="form-control input-lg dynamic" >
                <option value="">Select Category</option>
                @foreach ($categories as $cat)
                     @if($cat->id==$item->category)
                     <option value="{{ $cat->id}}" selected>{{ $cat->name }}</option>
                     @else
                     <option value="{{ $cat->id}}">{{ $cat->name}}</option>
                     @endif
                @endforeach
               </select>
            </div> 
            <div class="from-group">
                <label for="capacity">Capacity</label>
                <input type="number" name="capacity" id ="capacity_id" class="form-control" placeholder="Capacity" value='{{$item->capacity}}'/><br>
              </div>
            @if ($item->description != null)
            <div class="from-group">
                <label for="description">Description</label>
                <textarea class="form-control col-xs-12" rows="3" cols="100" id="description_id" name="description" placeholder="Write a description">{{$item->description}}</textarea>                 
            </div>
            @else
            <div class="from-group">
                <label for="description">Description</label>
                <textarea class="form-control col-xs-12" rows="3" cols="100" id="description_id" name="description" placeholder="Write a description"></textarea>                 
            </div>                   
            @endif

            <div class="form-group">
                <label for="feature_image">Feature Image</label>
                <input type="file" name="feature_image" class="form-control" id="feature_image" >
                <p class="help-block">Image must be jpeg,png,jpg,gif,svg and max file size 2M.</p>
                @if($item->feature_image)
                <img src="{{asset('images/room_feature_image/'.$item->feature_image)}}" width="120px"/>
                @endif
            </div>
            @if ($item->has_projector==1)
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name= "projector" id="projector" value='1' checked>
                <label class="form-check-label" for="projector" >Projector available in this room.</label>
            </div>
            @else
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name= "projector" id="projector" value='1'>
                <label class="form-check-label" for="projector" >Projector available in this room.</label>
            </div>
            @endif

            @if ($item->has_dashboard==1)
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="dashboard" id="dashboard" value='1' checked>
                <label class="form-check-label" for="dashboard">Dashboard available in this room.</label>
            </div>
            @else
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="dashboard" id="dashboard" value='1'>
                <label class="form-check-label" for="dashboard">Dashboard available in this room.</label>
            </div>
            @endif
            @if ($item->has_handicapped==1)
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name= "handicapped" id="handicapped" value='1' checked>
                <label class="form-check-label" for="handicapped">Handicapped facilities available in this room.</label>
            </div>
            @else
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name= "handicapped" id="handicapped" value='1'>
                <label class="form-check-label" for="handicapped">Handicapped facilities available in this room.</label>
            </div>
            @endif
            @if ($item->is_active==1)
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name= "active" id="active" checked>
                <label class="form-check-label" for="active">Is this room available for booking</label>
            </div>
            @else
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name= "active" id="active">
                <label class="form-check-label" for="active">Is this room available for booking</label>
            </div>
            @endif
            @if ($item->is_ready==1)
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name= "ready" id="ready" checked>
                <label class="form-check-label" for="ready">This room is ready for use.</label>
            </div>
            @else
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name= "ready" id="ready">
                    <label class="form-check-label" for="ready">This room is ready for use.</label>
                </div>
            @endif

            <div class="form-group">
                <label for="gallery_image">Gallery Image</label>
                <input type="file" name="gallery_image[]" class="form-control" id="gallery_image" multiple="multiple" >
                <p class="help-block">Image must be jpeg,png,jpg,gif,svg and max file size 2M.</p>
                
                @if($gallery_images)
                @foreach($gallery_images as $img)
                <div>
                <img src="{{asset('images/room_gallery_image/'.$img->image)}}" width="120px"/>
                <button class="btn btn-sm btn-danger remove_field" id="{{$img->id}}"  >Remove Image</button>
                </div>
                <br>
                @endforeach
                @endif
            </div>
              <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
              <input type="hidden"  name="deletedImage" id="deletedImages">
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

@section('script')
<script>
$(document).ready(function(){
            $(".remove_field").click(function(e){
                e.preventDefault();
               // debugger;
                var idofButton=$(this).attr('id');
                var buttonfield=$('#'+idofButton).parent();
                buttonfield.remove();
                var imageIds=$('#deletedImages').val();
                 if(imageIds == '')
                 {
                     $('#deletedImages').val(imageIds+ idofButton);
                 }
                 else
                 {
                     $('#deletedImages').val(imageIds+','+idofButton);

                 }


                //$('#'+idofButton).parent.remove();
            });

            function removeDiv($field) {
                $field.preventDefault();
                $field.parent.remove();
            }
        });
</script>
@endsection