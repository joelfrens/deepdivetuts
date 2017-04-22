@extends('layouts.app')

@section('content')
<!-- Page content -->
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumb">
                        Add Menu Link
                        <a class="no-link disp-link" href="{{ url('admin/menus') }}">
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

                        {{ Form::open(array('url' => 'admin/menus', 'files' => true)) }}
                        <div class="form-group">
                            {{ Form::label('title', 'Title') }}
                            {{ Form::text('title', Input::old('title'), array('class' => 'form-control')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('link', 'Link') }}
                            {{ Form::text('link', Input::old('link'), array('class' => 'form-control')) }}
                        </div>
                        
                        <div class="form-group">
                            {!! Form::label('Parent', 'Parent Menu') !!}
                            {!! Form::select('parent', $parentMenus, null, ['class' => 'dropdown form-control']) !!}
                        </div>

                        <div class="form-group">
                            {{ Form::label('active', 'Status') }}
                            <div class="custom-radio-btns mg-bm-xs">
                                {{ Form::radio('active', '1', '', ['class' => 'radio-custom', 'id' => 'active-yes']) }}
                                {{ Form::label('active-yes', 'Yes', ['class' => 'radio-custom-label']) }}

                                {{ Form::radio('active', '0', true, ['class' => 'radio-custom', 'id' => 'active-no']) }}
                                {{ Form::label('active-no', 'No', ['class' => 'radio-custom-label']) }}
                            </div>
                        </div>

                        {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection