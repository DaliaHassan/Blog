@extends( 'layouts.admin.app' )

@section('title')
    Show Comments
@stop

@section('content')

    <div class="portlet light">
        <div class="portlet-body">
            <fieldset>
                <legend>Contact Message</legend>
                <div class="form-body">
                    <div class="form-group">
                        <div class="col-md-6">
                            <ul>
                            @foreach($comments as $comment)
                                 <li>{{ $comment->comment }}</li>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <p class="text-right">
                                <a href="{!! route( 'admin.articles.index' ) !!}" class="btn btn-danger">Back</a>
                            </p>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>

@endsection

