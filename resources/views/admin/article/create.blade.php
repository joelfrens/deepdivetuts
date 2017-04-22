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
                        @include('common.errors')

                        <div class="flash-message">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                              @if(Session::has('alert-' . $msg))

                              <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                              @endif
                            @endforeach
                        </div> <!-- end .flash-message -->

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

                        <div class="form-group">
                            {!! Form::label('Coordinates', 'X-Coordinate:') !!}
                            {!! Form::text('xcoordinates', null, ['class' => 'form-control', 'placeholder' => 'X-Coordinate']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Coordinates', 'Y-Coordinate:') !!}
                            {!! Form::text('ycoordinates', null, ['class' => 'form-control', 'placeholder' => 'Y-Coordinate']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Category', 'Category:') !!}
                            {!! Form::select('category', $categories, null, ['class' => 'dropdown form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Tags', 'Tags') !!}
                            <div class="custom-checkbox">
                                @foreach ($tags as $key => $tag)
                                    {!! Form::checkbox('tags[]', $key, true, ['class' => 'checkbox-custom']) !!}
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
                                {!! Form::radio('status',1, true, ['class' => 'radio-custom']) !!}
                                {!! Form::label('status_active', 'Active', ['class' => 'radio-custom-label']) !!}

                                {!! Form::radio('status',0, true, ['class' => 'radio-custom']) !!}
                                {!! Form::label('status_disabled', 'Disabled', ['class' => 'radio-custom-label']) !!}
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