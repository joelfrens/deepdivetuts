@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <h1>Edit {{ $category->name }}</h1>

        {{ Form::model($category, array('route' => array('categories.update', $category->id), 'method' => 'PUT')) }}

            <div class="form-group">
                <!-- Input text -->
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', null, array('class' => 'form-control')) }}
                
                <br />

                {{ Form::label('visible', 'Visibility') }}

                @if ($category->visible == '1')
                    {{ Form::radio('visible', '1', true, ['checked' => 'checked']) }} Yes
                    <br />
                    {{ Form::radio('visible', '0', false, []) }} No
                @else
                    {{ Form::radio('visible', '1', false, []) }} Yes
                    <br />
                    {{ Form::radio('visible', '0', true, ['checked' => 'checked']) }} No
                @endif    

                <br />
                {{Form::textarea('desc', $category->desc)}}

                <br />
                {{Form::label('Category Image')}}
                {{Form::file('categoryimage')}}

                @if ($category->category_image != "")
                    <img src="/uploads/{{$category->category_image}}" width="100px">
                @endif

            </div>

            {{ Form::submit('Edit the Category!', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}
    </div>
</div>
@endsection