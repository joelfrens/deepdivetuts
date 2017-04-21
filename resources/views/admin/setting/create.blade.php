@extends('layouts.app')

@section('content')
<!-- Page content -->
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumb">
                        Add Setting
                        <a class="no-link disp-link" href="{{ url('admin/settings') }}">
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

                        {{ Form::open(array('url' => 'admin/settings', 'files' => true)) }}
                        <div class="form-group">
                            {{ Form::label('name', 'Name') }}
                            {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('code', 'Code') }}
                            {{ Form::text('code', Input::old('code'), array('class' => 'form-control')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('value', 'Value') }}
                            {{ Form::text('value', Input::old('value'), array('class' => 'form-control')) }}
                        </div>

                        {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection