@extends('layouts.admin.app')

@section('title')
    Edit Category
@stop

@section('content')
    <div class="portlet light">
        <div class="portlet-body">
            {!! Form::model($category, ['method' => 'PATCH', 'route' => ['admin.categories.update', $category->id], 'class' => 'form-horizontal', 'files' => 'true']) !!}
            @include('admin.categories._form')
            <div class="row">
                <div class="col-md-9">
                    <p class="text-right">
                        <button class="btn btn-success">Edit Category</button>
                        <a href="{!! route( 'admin.categories.index' ) !!}" class="btn btn-danger">Cancel</a>
                    </p>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
