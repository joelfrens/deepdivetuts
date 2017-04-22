@extends('layouts.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="breadcrumb">
                    Categories
                    <a class="no-link disp-link" href="{{ url('admin/categories/create') }}">
                        <i class="fa fa-plus icon-disp-link" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="table-list">
                    <div class="pagination-container">
                        {{ $menus->links() }}
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" class="table-list-check-all" />
                                </th>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Link</th>
                                <th>Status</th>
                                <th>
                                    <i class="fa fa-trash-o table-del-ic" aria-hidden="true"></i>
                                    <!-- {{ Form::open(array('url' => 'admin/categories/', 'class' => 'btn btn-small')) }}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                                        {{ Form::close() }} -->
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($menus as $key => $value)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="table-list-check" />
                                    </td>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->title }}</td>
                                    <td>{{ $value->link }}</td>
                                    <td>{{ $value->active }}</td>
                                    <td>
                                        <a href="{{ URL::to('admin/menus/' . $value->id . '/edit') }}">
                                            <i class="fa fa-pencil table-edit-ic" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination-container">
                        {{ $menus->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
