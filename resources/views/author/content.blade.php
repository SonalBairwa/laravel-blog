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
         <div class="col-md-12" style="text-align: center; margin-top: -3%;font-family:verdana">
                            <h1 >Your Posts</h1>
        </div>
            <div class="Postbutton" style="margin-bottom: 5%; text-align: center">
            <!--  <button  type="button" href="{{ url('content/add-content') }}" class="btn btn-default">Add more posts</button> -->
            <!--  <a href="{{ url('content/add-content') }}" class="btn" style="color: black"><h3>Add New Content</h3></a> -->
                <div class="">
                    <form action="{{ url('content/add-content') }}" id="upload" method="get"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="package" value="bronze">
                        <button class="btn" type="submit"
                                style="background-color:#c3a694;margin-left: 100rem;width: 15rem">Add New Content
                        </button>

                    </form>
                   <!--  <form action="{{ url('content/edit-content') }}" id="upload" method="get"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="package" value="bronze">
                        <button class="btn" type="submit"
                                style="background-color:#c3a694;margin-left: 100rem;width: 15rem">Edit Content
                        </button>

                    </form> -->
                </div>

            </div>
            @foreach($contents as $dat)
                @if($dat)
                    <div class="col-md-12" style="margin-bottom: 50px">
                        <div class="col-md-4">
                            <div class="card" width="300">
                                <img class="card-img-top" src="{{ asset('fileUploads/'.$user_id.'/'.$dat->image) }}"
                                     alt="Card image cap" width="150" height="200">

                                </div>
                            </div>
                            <div class="col-md-8" style="margin-top: -3%">
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="col-md-8">

                                            <a href="{{ url('editContent',array($dat->id)) }}"  class="btn" style="color: black"><h4 class="card-title">{{$dat->title}}
                                                </h4></a>

                                        </div>
                                        <div class="col-md-4">
                                            <h5>created at: {{$dat->created_at->format('d/m/Y')}}</h5>
                                            <a href="{{ url('editContent',array($dat->id)) }}"  class="btn" style="color: black"><h4 class="button1">Edit Content
                                                </h4></a>
                                        </div>
                                    </div>
                                    <p class="card-text">{{$dat->abstract}}</p>
                                </div>
                                <ul class="list-group list-group-flush col-md-12">
                                    <li class="list-group-item">{{$dat->text}}</li>
                                </ul>
                            </div>
                        </div>
                    @endif
                @endforeach

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

    a.LinkButton {
        font-size: large;
        border-style: solid;
        border-width: 1px 1px 1px 1px;
        text-decoration: none;
        padding: 4px;
        border-color: #000000
    }
.button1 {
  font: bold 20px Arial;
  text-decoration: none;
  background-color: #c3a694;
  color: #333333;
  padding: 2px 6px 2px 6px;
  border-top: 1px solid #CCCCCC;
  border-right: 1px solid #333333;
  border-bottom: 1px solid #333333;
  border-left: 1px solid #CCCCCC;
}
</style>
<script src="{{ asset('js/jquery.js') }}"></script>