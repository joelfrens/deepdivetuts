@extends('layouts.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="breadcrumb">
                    Pages
                    <a class="no-link disp-link" href="{{ url('admin/pages/create') }}">
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
                        {{ $pages->links() }}
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
                                <th>Content</th>
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
                            @foreach($pages as $key => $value)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="table-list-check" />
                                    </td>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->title }}</td>
                                    <td>{{ str_limit($value->content, $limit = 150, $end = '...') }}</td>
                                    <td>
                                        <a href="{{ URL::to('admin/pages/' . $value->id . '/edit') }}">
                                            <i class="fa fa-pencil table-edit-ic" aria-hidden="true"></i>
                                        </a>
                                        <form action="/admin/pages/{{ $value->id }}" method="POST" class="inline-block">
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
                        {{ $pages->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
