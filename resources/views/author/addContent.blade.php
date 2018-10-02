@extends('layouts.app')

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
   

@foreach($contents as $dat)
<div class="col-md-7" >
    @if($dat)
       
        <div class="card" width="300">
          <img class="card-img-top" src="{{ asset('fileUploads/'.$user_id.'/'.$dat->image) }}" alt="Card image cap" width="300" height="200">

          <!-- <img class="card-img-top"  alt="{{$dat->id}}" width="150" height="110"> -->
  <div class="card-body">
    <h3 class="card-title">{{$dat->title}}</h3>
    <p class="card-text">{{$dat->abstract}}</p>
  </div>
  <ul class="list-group list-group-flush col-md-6" >
    <li class="list-group-item">{{$dat->text}}</li>
   
  </ul>
 
</div>
  @endif
<div>
  

</div>



</div>
@endforeach
     <div class="col-md-4">
     <form action="{{ url('content/storeContent') }}" id="upload" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
       
        
        <div class="form-group ">
            <label for="usr">Upload Image</label>
            <input type="file" name="image"  class="form-control " required>
        </div>
       
        <div class="form-group">
        <label for="usr">Title:</label>
           <input type="text" name="title" class="form-control"  required>
         </div>
        <div class="form-group">
      <label for="comment">Abstract:</label>
      <textarea class="form-control" name="abstract" rows="5" ></textarea>
      </div>
        <div class="form-group">
      <label for="comment">Content:</label>
      <textarea class="form-control" name="content_body" rows="5" ></textarea>
    </div>
     <select id="category" class=" form-control " name="category">
                             @foreach($data as $category)
                           <option value="" selected disabled hidden>Category</option>
                           <option  value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach
                         
    </select> 
         <div class="form-group">

            <button class="btn btn-success upload-image" type="submit">Create</button><br>
        </div>
   
    </form>
    </div>


</div>

</div>

</div>



@endsection




<style type="text/css">
    .profile-img-container {
    position: relative;
}

.profile-img-container i {
    position: absolute;
    top: 45%;  
    left: 45%;
    transform: translate(-45%, -45%);
    opacity: 0.5; 
    color: black;
    
}

.profile-img-container:hover img {
    opacity: 0.5;    
}

.profile-img-container:hover i {
    display: block;
    z-index: 500;
}

</style>
<script src="{{ asset('js/jquery.js') }}"></script>