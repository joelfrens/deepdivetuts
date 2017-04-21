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

                    <h1>Edit {{ $category->name }}</h1>

                    {{ Form::model($category, array('route' => array('categories.update', $category->id), 'method' => 'PUT', 'files' => true)) }}

                        <div class="form-group">
                            <div class="form-group">
                                {{ Form::label('name', 'Name') }}
                                {{ Form::text('name', null, array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('code', 'Code') }}
                                {{ Form::text('code', null, array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('value', 'Value') }}
                                {{ Form::text('value', null, array('class' => 'form-control')) }}
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