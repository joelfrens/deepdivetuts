@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					New Category
				</div>

				<div class="panel-body">
					<!-- Display Validation Errors -->
					@include('common.errors')

					  <div class="flash-message">
					    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
					      @if(Session::has('alert-' . $msg))

					      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
					      @endif
					    @endforeach
					  </div> <!-- end .flash-message -->
					<!-- Edit tag Form -->
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
@endsection