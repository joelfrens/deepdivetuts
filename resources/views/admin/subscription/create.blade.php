@extends('layouts.app')

@section('content')
<div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumb">
                        Add Subscription/Package
                        <a class="no-link disp-link" href="{{ url('admin/subscriptions') }}">
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

                        {{ Form::open(array('url' => 'admin/subscriptions', 'files' => true)) }}
                        <div class="form-group">
                            {{ Form::label('title', 'Title') }}
                            {{ Form::text('title', Input::old('title'), array('class' => 'form-control')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('content', 'Content') }}
                            {{ Form::textarea('content', '', array('class' => 'form-control')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('cost', 'Cost') }}
                            {{ Form::text('cost', Input::old('cost'), array('class' => 'form-control')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('image', 'Image') }}
                            {{ Form::file('subscriptionimage') }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('visible', 'Visibility') }}
                            <div class="custom-radio-btns mg-bm-xs">
                                {{ Form::radio('status', '1', true, ['class' => 'radio-custom', 'id' => 'visible-yes']) }}
                                {{ Form::label('visible-yes', 'Yes', ['class' => 'radio-custom-label']) }}

                                {{ Form::radio('status', '0', '', ['class' => 'radio-custom', 'id' => 'visible-no']) }}
                                {{ Form::label('visible-no', 'No', ['class' => 'radio-custom-label']) }}
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