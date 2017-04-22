@extends('layouts.app')

@section('content')
<!-- Page content -->
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumb">
                        Add User
                        <a class="no-link disp-link" href="{{ url('admin/users') }}">
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

                        {{ Form::open(array('url' => 'admin/users', 'files' => true)) }}
                        <div class="form-group">
                            {{ Form::label('name', 'Name') }}
                            {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('password', 'Password') }}
                            {{ Form::text('password', Input::old('password'), array('class' => 'form-control')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('status', 'Status') }}
                            <div class="custom-radio-btns mg-bm-xs">
                                {{ Form::radio('status', '1', '', ['class' => 'radio-custom', 'id' => 'status-yes']) }}
                                {{ Form::label('status-yes', 'Yes', ['class' => 'radio-custom-label']) }}

                                {{ Form::radio('status', '0', true, ['class' => 'radio-custom', 'id' => 'status-no']) }}
                                {{ Form::label('status-no', 'No', ['class' => 'radio-custom-label']) }}
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