@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>Simple laravel CRUD ajax</h1>
    </div>
</div>
<!-- Button trigger modal -->
<button id="addbtn" type="button" class="btn btn-primary" >
  Launch demo modal
</button>
<div class="row">
    <div class="table table-responsive">
        <table class="table table-bordered" id="table">
            <tr>
                <th> No </th>
                <th> Title </th>
                <th> Body </th>
                <th> Create At </th>
                <th class="text-center col-xs-4">
                    <a href="#" class="create-modal btn btn-success btn-sm" data-toggle="modal" data-target="#addPost" >
                        <i class="fa fa-plus"></i>
                    </a>
                </th>
            </tr>
            {{ csrf_field() }}
            <?php $no = 1; ?>
            @foreach($posts as $key => $value)
                <tr class="post{{$value->id}}">
                    <td>
                            {{ $no++ }}
                    </td>
                    <td>
                            {{ $value->title }}
                    </td>
                    <td>
                            {{ $value->body }}
                    </td>
                    <td>
                            {{ $value->created_at }}
                    </td>
                    <td>
                        <a href="#" class="show-module btn btn-info btn-sm" data-id="{{ $value->id}}" data-title="{{$value->title}}" data-body="{{ $value->body }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="#" class="edit-module btn btn-warning btn-sm" data-id="{{ $value->id}}" data-title="{{$value->title}}" data-body="{{ $value->body }}">
                            <i class="fa fa-pencil"></i>
                        </a>  
                        <a href="#" class="delete-module btn btn-danger btn-sm" data-id="{{ $value->id}}" data-title="{{$value->title}}" data-body="{{ $value->body }}">
                            <i class="fa fa-trash"></i>
                        </a>    
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection

@section('script')
<script>
 
$('#add').click( function(){
        $.ajax({
           type : 'POST',
           url  : 'addPost',
           data : {
               '_token' : $('input[name=_token]').val(),
               'title' : $('input[name=title]').val(),
               'body' : $('input[name=body]').val(),
           },
           success: function(data){
               if((data.errors)){
                    $('.error').removeClass('hidden');
                    $('.error').text(data.errors.title);
                    $('.error').text(data.errors.body);
               }
               else{
                $('.error').remove();
                $('#table').append("<tr class'post'"+data.id + "'>"+
                "<td>" + data.id + "</td>" +
                "<td>" + data.title + "</td>" +
                "<td>" + data.body + "</td>" +
                "<td>" + data.created_at + "</td>" +
                "<td><a href='$' class='show-module btn btn-info btn-sm' data-id='" +data.id +"' data-title='"+data.title+ "' data-body='"+ data.body +"'>" +
                "<i class='fa fa-eye'></i></a>"+
                "<a href='#' class='edit-module btn btn-warning btn-sm' data-id='" +data.id +"' data-title='"+data.title+ "' data-body='"+ data.body +"'>" +
                "<i class='fa fa-pencil'></i></a>"+  
                "<a href='#' class='delete-module btn btn-danger btn-sm' data-id='" +data.id +"' data-title='"+data.title+ "' data-body='"+ data.body +"'>" +
                "<i class='fa fa-trash'></i></a>" +
                "</td>"+
                "</tr>");
               }
           },
       });
       $('#title').val('');
       $('#body').val('');
    });
</script>
@endsection