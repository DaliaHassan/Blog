@extends('layouts.admin.app')

@section('title')
    New Article
@stop

@section('content')
    <div class="portlet light">
        <div class="portlet-body">
            {!! Form::open(['route' => 'admin.articles.store', 'class' => 'form-horizontal', 'files' => 'true']) !!}
            @include('admin.articles._form')
            <div class="row">
                <div class="col-md-9">
                    <p class="text-right">
                        <button class="btn btn-success">Add Article</button>
                        <a href="{!! route( 'admin.articles.index' ) !!}" class="btn btn-danger">Cancel</a>
                    </p>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection