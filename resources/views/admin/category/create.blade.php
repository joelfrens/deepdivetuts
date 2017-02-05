@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
        <h1>Create a Category</h1> 
        
        <!-- show errors -->
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{ Form::open(array('url' => 'admin/categories', 'files' => true)) }}

            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
                
                {{ Form::label('visible', 'Visibility') }}
                {{ Form::radio('visible', '1') }} Yes
                <br />
                {{ Form::radio('visible', '0') }} No

                <br />
                {{Form::textarea('desc')}}

                <br />
                {{Form::label('Category Image')}}
                {{Form::file('categoryimage')}}
                
            </div>

            {{ Form::submit('Create Category!', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>
</div>
@endsection