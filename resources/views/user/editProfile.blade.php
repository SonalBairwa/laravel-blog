@extends('layouts.app')
@section('reviewpagescript')
    <script type="text/javascript" src="{{ asset('js/editProfileAjax.js') }}"></script>
@stop
@section('style')
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

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
                <form action="{{ url('content/storeContent') }}" id="upload" method="post"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-md-12" style="margin-bottom: 2%">
                            <div class="col-md-6">
                                <label for="usr">Name:</label>
                                <input type="text" name="name" value="{{$user->name}}" class="form-control" readonly>
                            </div>

                            <div class="col-md-6">
                                <label for="usr">Email:</label>
                                <input type="email" name="email" value="{{$user->email}}" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-12" style="margin-bottom: 2%">
                            <div class="col-md-3">
                                <label for="usr">Date Of Birth:</label></br>
                                <input id="date_of_birth" name="date_of_birth" type="date">
                            </div>
                            <div class="col-md-3">
                                <label for="usr">Moile No:</label>
                                <input type="text" name="mobile" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label>Current Password</label>
                                <div class="form-group ">
                                    <input type="password" value="" class="form-control" placeholder="Current Password">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12" style="margin-bottom: 2%">
                            <div class="col-md-6">
                                <label>New Password</label>
                                <div class="form-group ">
                                    <input type="password" value="" class="form-control"
                                           placeholder="New Password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Confirm Password</label>
                                <div class="form-group ">
                                    <input type="password" value="" class="form-control"
                                           placeholder="Confirm Password">
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style="text-align: center">
                            <button class="btn btn-success upload-image" type="submit">Update Profile</button>
                            <br>
                        </div>
                    </div>

                </form>
            </div>


        </div>

    </div>

    </div>



@endsection





<script src="{{ asset('js/jquery.js') }}"></script>