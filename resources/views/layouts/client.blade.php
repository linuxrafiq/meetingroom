@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
  <div class="card ">
    <div class="card-header"><h3>Create a new client<h3></div>
    <div class="card-body">
      <form id="form_id" action="{{route('client.store')}}" method="post">
        <div class="from-group">
          <label for="name">Name</label>
          <input type="text" name="name" id ="name_id" class="form-control"  placeholder="Client Name"/><br>
        </div>
        <div class="from-group">
          <label for="company">Company</label>
          <input type="text" name="company" id ="company_id" class="form-control" placeholder="Company Name"/><br>
        </div>
        <div class="from-group">
          <label for="email">Email</label>
          <input type="email" name="email" id ="email_id" class="form-control" placeholder="Email address"/><br>
        </div>
        <div class="from-group">
          <label for="phone">Phone</label>
          <input type="number" name="phone" id ="phone_id" class="form-control" placeholder="Phone number"/><br>
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