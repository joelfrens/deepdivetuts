@extends('layouts.app')

@section('content')
<!-- Page content -->
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumb">
                        Add Article
                        <a class="no-link disp-link" href="{{ url('admin/articles') }}">
                            <i class="fa fa-list icon-disp-link" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <div class="content">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{ Form::open(array('url' => '/admin/articles', 'files' => true)) }}
                        
                        {{ csrf_field() }}
                        <div class="form-group">
                            {!! Form::label('article-name', 'Title') !!}
                            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Description', 'Description:') !!}
                            {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => '8', 'placeholder' => 'Description']) !!}
                        </div>

                        <!--<div class="form-group">
                            {!! Form::label('Coordinates', 'X-Coordinate:') !!}
                            {!! Form::text('xcoordinates', null, ['class' => 'form-control', 'placeholder' => 'X-Coordinate']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Coordinates', 'Y-Coordinate:') !!}
                            {!! Form::text('ycoordinates', null, ['class' => 'form-control', 'placeholder' => 'Y-Coordinate']) !!}
                        </div>-->

                        <div class="form-group">
                            {!! Form::label('Category', 'Category:') !!}
                            {!! Form::select('category', $categories, null, ['class' => 'dropdown form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Tags', 'Tags') !!}
                            <div class="custom-checkbox">
                                @foreach ($tags as $key => $tag)
                                    {!! Form::checkbox('tags[]', $key, true, ['class' => 'checkbox-custom', 'id' => 'tag'.$key]) !!}
                                    {!! Form::label('tag'.$key, $tag, ['class' => 'checkbox-custom-label']) !!}
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('Images') !!}
                            {!! Form::file('image[]', array('multiple'=>true)) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Status', 'Status') !!}
                            <div class="custom-radio-btns mg-bm-xs">
                                {!! Form::radio('status',1, true, ['class' => 'radio-custom', 'id' => 'status-yes']) !!}
                                {!! Form::label('status-yes', 'Active', ['class' => 'radio-custom-label']) !!}

                                {!! Form::radio('status',0, true, ['class' => 'radio-custom', 'id' => 'status-no']) !!}
                                {!! Form::label('status-no', 'Disabled', ['class' => 'radio-custom-label']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('Comments', 'Comments') !!}
                            <div class="custom-radio-btns mg-bm-xs">
                                {!! Form::radio('comments',1, true, ['class' => 'radio-custom', 'id' => 'comments-yes']) !!}
                                {!! Form::label('comments-yes', 'Active', ['class' => 'radio-custom-label']) !!}

                                {!! Form::radio('comments',0, true, ['class' => 'radio-custom', 'id' => 'comments-no']) !!}
                                {!! Form::label('comments-no', 'Disabled', ['class' => 'radio-custom-label']) !!}
                            </div>
                        </div>

                        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection