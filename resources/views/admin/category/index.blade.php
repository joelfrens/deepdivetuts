@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <h1>All Categories</h1>

        <div><a href="{{ URL::to('admin/categories/create') }}">Create a Category</a></div>

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Category name</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
            @foreach($categories as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->name }}</td>
                    <td>

                        <a class="btn btn-small btn-info" href="{{ URL::to('admin/categories/' . $value->id . '/edit') }}">Edit</a>

                        {{ Form::open(array('url' => 'admin/categories/' . $value->id, 'class' => 'btn btn-small')) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach

            {{ $categories->links() }}
            </tbody>
        </table>

    </div>
</div>
@endsection
