@extends('layouts.app')

@section('content')
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

                    <h1>Edit {{ $menu->name }}</h1>

                    {{ Form::model($menu, array('route' => array('menus.update', $menu->id), 'method' => 'PUT', 'files' => true)) }}

                        <div class="form-group">
                            <div class="form-group">
                                {{ Form::label('name', 'Name') }}
                                {{ Form::text('title', null, array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('link', 'Link') }}
                                {{ Form::text('link', null, array('class' => 'form-control')) }}
                            </div>
                            
                            <div class="form-group">
                                {!! Form::label('Parent', 'Parent Menu') !!}
                                {!! Form::select('parent', $parentMenus, $menu['parent'], ['class' => 'dropdown form-control']) !!}
                            </div>

                            <div class="form-group">
                                {{ Form::label('Status', 'Status') }}
                                <div class="custom-radio-btns mg-bm-xs">
                                    @if ($menu->value == '1')
                                        {{ Form::radio('active', '1', true, ['checked' => 'checked', 'class' => 'radio-custom']) }} 
                                        {{ Form::label('yes', 'Yes', array('class' => 'radio-custom-label')) }}
                                    
                                        {{ Form::radio('active', '0', false, ['class' => 'radio-custom']) }} 
                                        {{ Form::label('no', 'No', array('class' => 'radio-custom-label')) }}
                                    @else
                                        {{ Form::radio('active', '1', false, ['class' => 'radio-custom']) }} 
                                        {{ Form::label('yes', 'Yes', array('class' => 'radio-custom-label')) }}
                                        
                                        {{ Form::radio('active', '0', true, ['checked' => 'checked', 'class' => 'radio-custom']) }} 
                                        {{ Form::label('no', 'No', array('class' => 'radio-custom-label')) }}
                                    @endif  
                                </div>
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