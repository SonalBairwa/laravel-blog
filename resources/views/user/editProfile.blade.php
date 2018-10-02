@extends('layouts.app')
@section('reviewpagescript')
    <script type="text/javascript" src="{{ asset('js/editProfileAjax.js') }}"></script>
@stop
@section('style')
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link rel="stylesheet" media="print" src="{{ asset('css/jquery.datetimepicker.min.css') }}"/>

@endsection
@section('content')
<div class="container" >
    <div class="col-md-12">
        @if ($errors->any())
        <div class="alert alert-danger col-md-2">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
   


     <div class="col-md-4">
     <form action="{{ url('content/storeContent') }}" id="upload" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
       
        
        
        <div class="col-md-12">
       <div class="form-group">
        <label for="usr">Date Of Birth:</label>
           <div class='input-group date' >
                                
                            <input  name="end_date"  type='text' class="form-control" id='enddate' />
                            <span class="input-group-addon">
                            <i class="fa fa-calendar "></i>
                            </span>
                        </div>
         </div>
        <div class="form-group">
        <label for="usr">Title:</label>
           <input type="text" name="title" class="form-control" >
         </div>
        
    
        <label>Current Password</label>
        <div class="form-group "> 
                <input type="password" value="" class="form-control" placeholder="Current Password"> 
            </div> 
           <label>New Password</label>
            <div class="form-group "> 
                <input type="password" value="" class="form-control" placeholder="New Password"> 
            </div> 
           <label>Confirm Password</label>
            <div class="form-group "> 
                <input type="password" value="" class="form-control" placeholder="Confirm Password"> 
            </div> 
            
     
         <div class="form-group">

            <button class="btn btn-success upload-image" type="submit">Save </button><br>
        </div>
  </div>
   
    </form>
    </div>


</div>

</div>

</div>



@endsection





<script src="{{ asset('js/jquery.js') }}"></script>