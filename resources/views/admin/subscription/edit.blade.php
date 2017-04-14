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

                    <h1>Edit {{ $subscription->title }}</h1>

                    {{ Form::model($subscription, array('route' => array('subscriptions.update', $subscription->id), 'method' => 'PUT', 'files' => true)) }}

                        <div class="form-group">
                            <div class="form-group">
                                {{ Form::label('title', 'Title') }}
                                {{ Form::text('title', null, array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('content', 'Content') }}
                                {{ Form::textarea('content', $subscription->content, array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('cost', 'Cost') }}
                                {{ Form::text('cost', $subscription->cost, array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('status', 'Status') }}
                                <div class="custom-radio-btns mg-bm-xs">
                                    @if ($subscription->status == '1')
                                        {{ Form::radio('status', '1', true, ['checked' => 'checked', 'class' => 'radio-custom']) }} 
                                        {{ Form::label('status_active', 'Yes', array('class' => 'radio-custom-label')) }}
                                    
                                        {{ Form::radio('status', '0', false, ['class' => 'radio-custom']) }} 
                                        {{ Form::label('status_disabled', 'No', array('class' => 'radio-custom-label')) }}
                                    @else
                                        {{ Form::radio('status', '1', false, ['class' => 'radio-custom']) }} 
                                        {{ Form::label('status_active', 'Yes', array('class' => 'radio-custom-label')) }}
                                        
                                        {{ Form::radio('status', '0', true, ['checked' => 'checked', 'class' => 'radio-custom']) }} 
                                        {{ Form::label('status_disabled', 'No', array('class' => 'radio-custom-label')) }}
                                    @endif  
                                </div>
                            </div>  

                            
                            
                            <div class="form-group">
                                {{ Form::label('image', 'Image') }}
                                {{ Form::file('categoryimage') }}
                            </div>

                            @if ($subscription->subscriptionimage != "")
                                <img src="/uploads/{{$category->subscriptionimage}}" width="100px">
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