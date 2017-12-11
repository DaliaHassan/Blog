@extends( 'layouts.web' )

@section('title')
    Add Comment
@stop

@section('content')
    <div class="portlet light">
        <div class="portlet-body">
            {!! Form::open(['route' => 'web.comments.store', 'class' => 'form-horizontal', 'files' => 'true']) !!}
            <fieldset>
                <legend>Info</legend>
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name" class="col-md-3 control-label">Article: </label>
                                <div class="col-md-9">
                                    {!! Form::select('article_id', $articles, old('article_id'), ['class' => 'form-control'], ['placeholder' => 'Choose Category']); !!}
                                    <div class="error">
                            <span style="color:red">
                                {{ $errors->first('article_id') }}
                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name" class="col-md-3 control-label">Comment: </label>
                                <div class="col-md-9">
                                    {!! Form::textarea('comment', old('comment'), ['class' => 'form-control']) !!}
                                    <div class="error">
                                <span style="color:red">
                                    {{ $errors->first('comment') }}
                                </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>

            <div class="row">
                <div class="col-md-9">
                    <p class="text-right">
                        <button class="btn btn-success">Add Comment</button>
                        <a href="{!! URL::to('web/articles') !!}" class="btn btn-danger">Cancel</a>
                    </p>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection