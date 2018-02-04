@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Simple laravel CRUD ajax</h1>
    </div>
</div>

<div class="row">
    <div class="table table-responsive">
        <table class="table table-bordered" id="table">
            <tr>
                <th class="col-sm-1"> No </th>
                <th class=""> Title </th>
                <th class=""> Body </th>
                <th class="col-sm-3"> Create At </th>
                <th class="text-center com-sm-3">
                    <a href="#" class="create-modal btn btn-success btn-sm">
                        <i class="glyphicon glyphicon-plus"></i>ff
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
                            <i class="glyphicon glyphicon-pencil"></i>
                        </a>  
                        <a href="#" class="delete-module btn btn-danger btn-sm" data-id="{{ $value->id}}" data-title="{{$value->title}}" data-body="{{ $value->body }}">
                            <i class="glyphicon glyphicon-trash"></i>
                        </a>    
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection