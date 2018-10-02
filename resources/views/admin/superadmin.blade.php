@extends('layouts.app')

@section('style')
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" media="print" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
<link rel="stylesheet" media="print" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.print.css"/>
<link rel="stylesheet" type="text/css" src="{{ asset('css/jquery.datetimepicker.css') }}"/ >
<link rel="stylesheet" media="print" src="{{ asset('css/jquery.datetimepicker.min.css') }}"/>


@endsection




@section('content')
<div class="container" style="width: 98%">
    <div class="panel panel-primary">
        <div class="panel-heading">Assign Role</div>
        <div class="panel-body">
            
           
           
             <form action="{{ route('asignRole') }}" id="asignRole" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
       
               <div class="row" >
                <div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="form-group">
                       

                        <div class="">
                            <select id="user_id" class=" form-control col-xs-3 col-sm-3 col-md-3" name="user_id">
                             @foreach($users as $user)
                           <option value="" selected disabled hidden></option>
                           <option  value="{{$user->id}}">{{$user->name}}</option>
                           @endforeach
                       </select>
                        </div>
                    </div>

                </div>
                  <div class=" col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group">
                       
                        <div class="">
                            <select id="role_id" class="form-control" name="role_id">
                                 @foreach($roles as $role)
                             <option value="" selected disabled hidden></option>   
                            <option value="{{$role->id}}">{{$role->name}}</option>
                                  @endforeach
                            </select>
                            
                       </div>
                    </div>
                </div> 
                <div class=" col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group">
                       
                        <div class="">
                            <button type="submit" class="btn btn-default">Submit</button>
                            
                       </div>
                    </div>
                </div> 
                </div>
               
               <!-- **************************************************************** -->
             
              
             
               
                </form>
            </div>
            
        </div>

    </div>
 </div>
@endsection
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/jquery.datetimepicker.full.min.js') }}"></script>
