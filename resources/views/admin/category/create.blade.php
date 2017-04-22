@extends('layouts.app')

@section('content')
<!-- Page content -->
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumb">
                        Add Category
                        <a class="no-link disp-link" href="{{ url('admin/categories') }}">
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

                        {{ Form::open(array('url' => 'admin/categories', 'files' => true)) }}
                        <div class="form-group">
                            {{ Form::label('name', 'Name') }}
                            {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('status', 'Status') }}
                            <div class="custom-radio-btns mg-bm-xs">
                                {{ Form::radio('visible', '1', '', ['class' => 'radio-custom', 'id' => 'visible-yes']) }}
                                {{ Form::label('visible-yes', 'Yes', ['class' => 'radio-custom-label']) }}

                                {{ Form::radio('visible', '0', true, ['class' => 'radio-custom', 'id' => 'visible-no']) }}
                                {{ Form::label('visible-no', 'No', ['class' => 'radio-custom-label']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('description', 'Description') }}
                            {{ Form::textarea('desc', '', array('class' => 'form-control')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('image', 'Image') }}
                            {{ Form::file('categoryimage') }}
                        </div>

                        {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection