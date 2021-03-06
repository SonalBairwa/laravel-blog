@extends('layouts.app')

@section('style')

    <link rel="stylesheet" type="text/css" src="{{ asset('css/jquery.datetimepicker.css') }}"/ >
    <link rel="stylesheet" media="print" src="{{ asset('css/jquery.datetimepicker.min.css') }}"/>

@endsection
@section('content')
    <div class="container">
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

            <div class="col-md-12">
                    <form action="{{ url('content/edit-content') }}" id="upload" method="get"  enctype="multipart/form-data">
        {{ csrf_field() }}
      <input type="hidden" name="package" value="bronze">  
      <button  class="btn" type="submit"   style="background-color:#c3a694;width: 15rem;margin-left: 90rem;margin-top: 10px" >Add Category</button>

    </form>
                <form action="{{ url('content/storeContent') }}" id="upload" method="post"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                        
                        <div class="col-md-12" style="text-align: center; margin-top: -3%;font-family:verdana">
                            <h1 >Adding New Post</h1>
                        </div>
                    <div class="col-md-12">
                        <div class="col-md-1" style="margin-right: -40px">
                            <label for="usr"><h4>Title:</h4></label>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" name="title" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-1">
                            <label for="usr"><h4>Category:</h4></label>
                        </div>
                        <div class="col-md-3">
                            <select id="category" class=" form-control " name="category" required>
                                @foreach($data as $category)
                                    <option value="" selected disabled hidden>Category</option>
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="comment"><h4>Abstract:</h4></label>
                            <textarea class="form-control" name="abstract" rows="5" required></textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="comment"><h4>Content:</h4></label>
                            <textarea class="form-control" name="content_body" rows="5" required></textarea>
                        </div>
                    </div>

                    <div class="col-md-2" style="margin-right: -2%">
                        <label for="usr"><h4>Upload Image</h4></label>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group ">
                            <input type="file" name="image" class="form-control " required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="PostButton" style="text-align: center">
                            <button class="btn "
                                    style="background-color:#c3a694;text-align: center!important;   margin-bottom: 1%" type="submit">
                                Submit Post
                            </button>
                        </div>
                        <br>
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