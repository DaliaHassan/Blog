@extends('layouts.admin.app')

@section('title')
    New Category
@stop

@section('content')
    <div class="portlet light">
        <div class="portlet-body">
            {!! Form::open(['route' => 'admin.categories.store', 'class' => 'form-horizontal', 'files' => 'true']) !!}
            @include('admin.categories._form')
            <div class="row">
                <div class="col-md-9">
                    <p class="text-right">
                        <button class="btn btn-success">Add Category</button>
                        <a href="{!! route( 'admin.categories.index' ) !!}" class="btn btn-danger">Cancel</a>
                    </p>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection