@extends('layouts.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="breadcrumb">
                    Settings
                    <a class="no-link disp-link" href="{{ url('admin/settings/create') }}">
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
                        {{ $settings->links() }}
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
                                <th>Setting Code</th>
                                <th>Setting Value</th>
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
                            @foreach($settings as $key => $value)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="table-list-check" />
                                    </td>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->code }}</td>
                                    <td>{{ $value->value }}</td>
                                    <td>
                                        <a href="{{ URL::to('admin/settings/' . $value->id . '/edit') }}">
                                            <i class="fa fa-pencil table-edit-ic" aria-hidden="true"></i>
                                        </a>
                                        <form action="/admin/settings/{{ $value->id }}" method="POST" class="inline-block">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" class="btn btn-trans">
                                                <i class="fa fa-times table-row-del" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination-container">
                        {{ $settings->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
