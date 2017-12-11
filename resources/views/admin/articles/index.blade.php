@extends( 'layouts.admin.app' )

@section( 'title' )
    Articles
@stop

@section( 'content' )
    <div class="pull-right">
        <ul class="list-inline">
            <li><a href="{!! route( 'admin.articles.create' ) !!}" class="btn blue"><i aria-hidden="true" class="fa fa-file-o"> </i>Create Article</a></li>
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
                        <table class="table table-striped table-hover" id="articles-table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Category</th>
                                <th>Action</th>
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
            var oTable =  $('#articles-table').DataTable({
                processing: true,
                serverSide: true,
                bFilter: false,
                ajax: '{!! route('ajax.articles.index') !!}',
                    columns: [
                { data: 'id' },
                { data: 'title' },
                { data: 'body' },
                { data: 'category' },
                {
                    data: null,
                    "searchable": false,
                    "orderable": false,
                    render: function( data, type, row ) {
                        var editButton = '<a href="' + data.edit + '" class="btn blue btn-xs">Edit</a>';
                        var deleteButton = '<a href="' + data.deleteRoute + '" class="btn btn-danger btn-xs">Delete</a>';
                        var publishButton = '<a href="' + data.publishRoute + '" class="btn btn-success btn-xs">Publish</a>';
                        var unpublishButton = '<a href="' + data.unpublishRoute + '" class="btn btn-danger btn-xs">Unpublish</a>';
                        var showButton = '<a href="' + data.show + '" class="btn btn-success btn-xs">Show Comments</a>';

                        if(data.publish == 1) {
                            return editButton + unpublishButton + showButton + deleteButton;
                        }
                        return editButton + publishButton + showButton + deleteButton;
                    }
                }
            ]
        });
        });
    </script>
@stop
