@extends('layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumb">
                        Edit Page
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
                        @include('common.errors')

                          <div class="flash-message">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                              @if(Session::has('alert-' . $msg))

                              <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                              @endif
                            @endforeach
                          </div> <!-- end .flash-message -->
                        <!-- Edit page Form -->
                            {!! Form::model($page, [
                                'method' => 'PATCH',
                                'files' => true,
                                'route' => ['pages.update', $page->id]
                            ]) !!}

                            {{ csrf_field() }}

                            <div class="form-group">
                                {!! Form::label('page-name', 'Page Title:', ['class' => 'control-label']) !!}
                                {!! Form::text('title', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Description', 'Description:', ['class' => 'control-label']) !!}
                                {!! Form::textarea('content', null, ['class' => 'form-control', 'id' => 'tinymce']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('meta_keywords', 'Meta Keywords', ['class' => 'control-label']) !!}
                                {!! Form::text('meta_keywords', null, ['class' => 'form-control']) !!}
                            </div>
                            
                            <div class="form-group">
                                {!! Form::label('meta_description', 'Meta Description', ['class' => 'control-label']) !!}
                                {!! Form::text('meta_description', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('schedule_on', 'Scheduled On') !!}
                                {!! Form::date('schedule_on', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('start_date', 'Start Date') !!}
                                {!! Form::date('start_date', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('end_date', 'End Date') !!}
                                {!! Form::date('end_date', null, ['class' => 'form-control']) !!}
                            </div>
                            
                            <div class="form-group">
                                {{ Form::label('status', 'Status') }}

                                <div class="custom-radio-btns mg-bm-xs">
                                    @if ($page->active == '1')
                                        {{ Form::radio('active', '1', true, ['checked' => 'checked', 'class' => 'radio-custom', 'id' => 'active-yes']) }} 
                                        <label for="active-yes" class="radio-custom-label">Yes</label>
                                        {{ Form::radio('active', '0', false, ['class' => 'radio-custom', 'id' => 'active-no']) }} 
                                        <label for="active-no" class="radio-custom-label">No</label>
                                    @else
                                        {{ Form::radio('active', '1', false, ['class' => 'radio-custom', 'id' => 'active-yes']) }} 
                                        <label for="active-yes" class="radio-custom-label">Yes</label>
                                        {{ Form::radio('active', '0', true, ['checked' => 'checked', 'class' => 'radio-custom', 'id' => 'active-no']) }}
                                        <label for="active-no" class="radio-custom-label">No</label>
                                    @endif    
                                </div>
                            </div>

                            <div class="form-group">
                                @if ($page->image != "")
                                    {!! Html::image('uploads/'.$page->image, 'alt', array( 'width' => 70, 'height' => '' )) !!}
                                @endif
                            </div>

                            <div class="form-group">
                                {!! Form::label('Featured Image ') !!}
                                {!! Form::file('image') !!}
                            </div>

                            {!! Form::submit('Update Page', ['class' => 'btn btn-primary']) !!}

                            {!! Form::close() !!}
                        </form>
                    </div>
                </div>

                
            </div>
        </div>
    </div>
@endsection