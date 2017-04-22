@extends('layouts.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="breadcrumb">
                    Users
                    <a class="no-link disp-link" href="{{ url('admin/users/create') }}">
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
                        {{ $users->links() }}
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" class="table-list-check-all" />
                                </th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
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
                            @foreach($users as $key => $value)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="table-list-check" />
                                    </td>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>{{ $value->status }}</td>
                                    <td>
                                        <a href="{{ URL::to('admin/users/' . $value->id . '/edit') }}">
                                            <i class="fa fa-pencil table-edit-ic" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination-container">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
