@extends( 'layouts.admin.app' )

@section( 'title' )
    Categories
@stop

@section( 'content' )
    <div class="pull-right">
        <ul class="list-inline">
            <li><a href="{!! route( 'admin.categories.create' ) !!}" class="btn blue"><i aria-hidden="true" class="fa fa-file-o"> </i>New Category</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption"><i class="icon-list"></i>Categories list</div>
                </div>
                <div class="portlet-body">
                    <div>
                        <table class="table table-striped table-hover" id="categories-table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
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
            $('#categories-table').DataTable({
                processing: true,
                serverSide: true,
                bFilter: false,
                ajax: '{!! route('ajax.categories.index') !!}',
                    columns: [
                { data: 'id' },
                { data: 'name' },
                {
                    data: null,
                    "searchable": false,
                    "orderable": false,
                    render: function( data, type, row ) {
                        return  '<a href="' + data.edit + '" class="btn blue btn-xs">Edit</a>' +
                                '<form method="POST" action="' + data.delete + '">' +
                                '<input name="_method" type="hidden" value="delete">' +
                                '{!! Form::token() !!}' +
                                '<input class="btn btn-danger btn-xs" type="submit" value="Delete">' +
                                '</form>';
                    }
                }
            ]
        });
        });
    </script>
@stop