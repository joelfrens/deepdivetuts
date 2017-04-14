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
                                {{ Form::label('visible', 'Visibility') }}
                                <div class="custom-radio-btns mg-bm-xs">
                                    @if ($category->visible == '1')
                                        {{ Form::radio('visible', '1', true, ['checked' => 'checked', 'class' => 'radio-custom']) }} 
                                        {{ Form::label('yes', 'Yes', array('class' => 'radio-custom-label')) }}
                                    
                                        {{ Form::radio('visible', '0', false, ['class' => 'radio-custom']) }} 
                                        {{ Form::label('no', 'No', array('class' => 'radio-custom-label')) }}
                                    @else
                                        {{ Form::radio('visible', '1', false, ['class' => 'radio-custom']) }} 
                                        {{ Form::label('yes', 'Yes', array('class' => 'radio-custom-label')) }}
                                        
                                        {{ Form::radio('visible', '0', true, ['checked' => 'checked', 'class' => 'radio-custom']) }} 
                                        {{ Form::label('no', 'No', array('class' => 'radio-custom-label')) }}
                                    @endif  
                                </div>
                            </div>  

                            <div class="form-group">
                                {{ Form::label('desc', 'Content') }}
                                {{ Form::textarea('desc', $category->desc, array('class' => 'form-control')) }}
                            </div>
                            
                            <div class="form-group">
                                {{ Form::label('image', 'Image') }}
                                {{ Form::file('categoryimage') }}
                            </div>

                            @if ($category->category_image != "")
                                <img src="/uploads/{{$category->category_image}}" width="100px">
                            @endif

                        </div>

                        {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}

                        {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection