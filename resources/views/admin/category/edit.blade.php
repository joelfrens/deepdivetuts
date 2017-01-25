@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <h1>Edit {{ $category->name }}</h1>

        {{ Form::model($category, array('route' => array('categories.update', $category->id), 'method' => 'PUT')) }}

            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', null, array('class' => 'form-control')) }}
            </div>

            {{ Form::submit('Edit the Category!', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}
    </div>
</div>
@endsection