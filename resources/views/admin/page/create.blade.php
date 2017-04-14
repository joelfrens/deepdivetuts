@extends('layouts.app')

@section('content')
<!-- Page content -->
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumb">
                        Add Page
                        <a class="no-link disp-link" href="{{ url('admin/pages') }}">
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

                        {{ Form::open(array('url' => '/admin/pages', 'files' => true)) }}
                        
                        {{ csrf_field() }}
                        <div class="form-group">
                            {!! Form::label('title', 'Title') !!}
                            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Description', 'Description:') !!}
                            {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => '8', 'placeholder' => 'Description']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('meta_keywords', 'Meta Keywords') !!}
                            {!! Form::text('meta_keywords', null, ['class' => 'form-control', 'placeholder' => 'Meta Keywords']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('meta_description', 'Meta Description:') !!}
                            {!! Form::textarea('meta_description', null, ['class' => 'form-control', 'rows' => '8', 'placeholder' => 'Meta Description']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Image') !!}
                            {!! Form::file('featuredimage') !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('schedule_on', 'Scheduled On') !!}
                            {!! Form::date('schedule_on', null, ['class' => 'form-control', 'placeholder' => 'Date']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('start_date', 'Start Date') !!}
                            {!! Form::date('start_date', null, ['class' => 'form-control', 'placeholder' => 'Date']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('end_date', 'End Date') !!}
                            {!! Form::date('end_date', null, ['class' => 'form-control', 'placeholder' => 'Date']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Status', 'Status') !!}
                            <div class="custom-radio-btns mg-bm-xs">
                                {!! Form::radio('active',1, true, ['class' => 'radio-custom']) !!}
                                {!! Form::label('status_active', 'Active', ['class' => 'radio-custom-label']) !!}

                                {!! Form::radio('active',0, true, ['class' => 'radio-custom']) !!}
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