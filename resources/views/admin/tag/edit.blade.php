@extends('layouts.app')

@section('content')
<div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumb">
                        Edit Tag
                        <a class="no-link disp-link" href="{{ url('admin/tags') }}">
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

                    <h1>Edit {{ $tag->name }}</h1>
						<!-- Display Validation Errors -->
						@include('common.errors')

						<div class="flash-message">
							@foreach (['danger', 'warning', 'success', 'info'] as $msg)
							  @if(Session::has('alert-' . $msg))

							  <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
							  @endif
							@endforeach
						</div> <!-- end .flash-message -->
					
						{!! Form::model($tag, [
						    'method' => 'PATCH',
						    'files' => true,
						    'route' => ['tag.update', $tag->id]
						]) !!}

						{{ csrf_field() }}

						<div class="form-group">
						    {!! Form::label('tag-name', 'Tag name:', ['class' => 'control-label']) !!}
						    {!! Form::text('name', null, ['class' => 'form-control']) !!}
						</div>

						{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}

						{!! Form::close() !!}
					</form>
				</div>
            </div>
        </div>
    </div>
</div>
@endsection