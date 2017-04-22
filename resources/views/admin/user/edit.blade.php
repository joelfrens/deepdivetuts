@extends('layouts.app')

@section('content')
<div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumb">
                        Edit User
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

                    <h1>Edit {{ $user->name }}</h1>

                    {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT', 'files' => true)) }}

                        <div class="form-group">
                            <div class="form-group">
                                {{ Form::label('name', 'Name') }}
                                {{ Form::text('name', null, array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('email', 'Email') }}
                                {{ Form::text('email', null, array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('password', 'Password') }}
                                {{ Form::text('password', '', array('class' => 'form-control')) }}
                            </div>

                            {{ Form::label('status', 'Status') }}
                                <div class="custom-radio-btns mg-bm-xs">
                                    @if ($user->status == '1')
                                        {{ Form::radio('status', '1', true, ['checked' => 'checked', 'class' => 'radio-custom', 'id' => 'status-yes']) }} 
                                        {{ Form::label('status-yes', 'Yes', array('class' => 'radio-custom-label')) }}
                                    
                                        {{ Form::radio('status', '0', false, ['class' => 'radio-custom', 'id' => 'status-no']) }} 
                                        {{ Form::label('status-novisible-no', 'No', array('class' => 'radio-custom-label')) }}
                                    @else
                                        {{ Form::radio('status', '1', false, ['class' => 'radio-custom', 'id' => 'status-yes']) }} 
                                        {{ Form::label('status-yes', 'Yes', array('class' => 'radio-custom-label')) }}
                                        
                                        {{ Form::radio('status', '0', true, ['checked' => 'checked', 'class' => 'radio-custom',  'id' => 'status-no']) }} 
                                        {{ Form::label('status-no', 'No', array('class' => 'radio-custom-label')) }}
                                    @endif  
                                </div>

                        </div>

                        {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}

                        {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection