@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
  <div class="card" style="width:100%">
    <div class="card-header"><h3>Book a room<h3></div>
    <div class="card-body">
      @if (count($booking_categories)>0 && (count($room_categories)>0))
        <form id="form_id" action="{{route('room.store')}}" method="post" enctype="multipart/form-data">
            <div class="from-group">
              <label for="name">Name</label>
              <input type="text" name="name" id ="name_id" class="form-control" placeholder="Name"/><br>
            </div>
        <div class="from-group">
            <label for="booking_category">Booking categories</label>
              <select name="booking_category" id="booking_category_id" class="form-control input-lg">
                  <option value="">Select Booking Category</option>
                  @foreach ($booking_categories as $cat)
                      <option value={{$cat->id}} >{{ $cat->name}}</option>
                  @endforeach
              </select>
          </div>
          <br>
          <div class="from-group">
            <label for="room_category">Room categories</label>
            <select name="room_category" id="room_category_id" class="form-control input-lg dynamic" data-dependent="room" >
                <option value="">Select Room Category</option>
                @foreach ($room_categories as $cat)
                    <option value={{$cat->id}} >{{ $cat->name}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="from-group">
            <label for="room">Rooms</label>
            <select name="room" id="room" class="form-control input-lg">
                <option value="">Select room</option>
            </select>
        </div>
        <br>
        <div class="from-group">
            <label for="bookingdate">Booking Date</label>
            <input type="date" name="bookingdate" id ="bookingdate" class="form-control"/><br>

        </div>
        <br>
        <div class="from-group">
            @if (count($clients)>0)
            <label for="row">Clients</label>
            <div class="btn-toolbar mb-2" role="toolbar" name="row">
                <div  class="btn-group mr-2 text-center col col-lg-6" role="group">
                    <select name="client" id="client_id" class="form-control input-lg">
                        <option value="">Select client</option>
                        @foreach ($clients as $client)
                            <option value={{$client->id}} >{{ $client->company}}</option>
                        @endforeach
                    </select>
                 </div>
                 <div class="input-group text-center col col-lg-1">
                     <p>  <b>OR</b>  </p>
                  </div>
                 <div class="input-group col">
                    <button  id="btnAddClient" class="btn btn-lg btn-primary btn-md center-block add_client" Style="width: 100px;" >Add Client</button>
                    {{-- <input type="text" class="form-control" placeholder="Input group example" aria-label="Input group example" aria-describedby="btnGroupAddon"> --}}
                  </div>
            </div>
            @else
                @include('inc.client')
            @endif
            <div class="input-group" id="new_client" style="display:none">
                @include('inc.client')
            </div>
        </div>
        <br>
          <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
          <br>
          <div class="from-group">
            <button type="submit" value="Submit" class="btn btn-primary btn-lg btn-block">Save </button>
          </div>
      </form> 
      @else
          <p> At least one <b>Booking Category</b> and one <b>Room category</b> need to be create.</p>
      @endif
      
    </div>
</div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
                $(".add_client").click(function(e){
                     e.preventDefault();
                     var x = document.getElementById("new_client");
                     var btn = document.getElementById("btnAddClient");

                            if (x.style.display === "none") {
                                x.style.display = "block";
                            } else {
                                x.style.display = "none";
                            }    
                            if (btn.innerHTML === "Add Client") {
                                btn.innerHTML = "Add Client (Hide Form)";
                            } else {
                                btn.innerHTML = "Add Client";
                            }            
                });
    
        $('.dynamic').change(function () {
        if ($(this).val() != '') {
            var select = $(this).attr("id");
            var value = $(this).val();
            var dependent = $(this).data('dependent');
            var _token = $('meta[name="csrf-token"]').attr('content');
            var messageView = $('.messages');
            var messageHtml = "";
             //url = url_cat_update.replace(':id', content_id);
            $.ajax({
                url: url_category_rooms,
                method: "POST",
                data: { select: select, value: value, _token: _token, dependent: dependent },
                success: function (result) {
                    $('#' + dependent).html(result);
                },
                error: function (jqXHR, exception) {
                    debugger;

                }

            })
        }

    });

    $('#category').change(function () {

    });
    });
    </script>
    @endsection