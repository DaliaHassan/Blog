@extends( 'layouts.web' )

@section( 'title' )
    List Published Articles
@stop

@section( 'content' )
    <div class="pull-right">
        <ul class="list-inline">
            <li><a href="{!! route( 'web.comments.create' ) !!}" class="btn blue"><i aria-hidden="true" class="fa fa-file-o"> </i> Comment</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption"><i class="icon-list"></i>Articles list</div>
                </div>
                <div class="portlet-body">
                    <div>
                        <table class="table table-striped table-hover" id="publishedArticles-table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Category</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('footerscripts')

    <script type="text/javascript">
        requirejs([
            'jquery',
            'dataTables'
        ], function ($, DataTable) {
            'use strict';
            var oTable =  $('#publishedArticles-table').DataTable({
                processing: true,
                serverSide: true,
                bFilter: false,
                ajax: '{!! route('ajax.users.index') !!}',
                    columns: [
                { data: 'id' },
                { data: 'title' },
                { data: 'body' },
                { data: 'category' },

            ]
        });
        });
    </script>
@stop
