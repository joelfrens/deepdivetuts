@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					New Article
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
					<!-- Edit article Form -->
						{!! Form::model($article, [
						    'method' => 'PATCH',
						    'files' => true,
						    'route' => ['article.update', $article->id]
						]) !!}

						{{ csrf_field() }}

						<div class="form-group">
						    {!! Form::label('article-name', 'Article Title:', ['class' => 'control-label']) !!}
						    {!! Form::text('title', null, ['class' => 'form-control']) !!}
						</div>

						<div class="form-group">
							{!! Form::label('Description', 'Description:', ['class' => 'control-label']) !!}
						    {!! Form::textarea('content', null, ['class' => 'form-control', 'id' => 'tinymce']) !!}
						</div>

						<div class="form-group">
							{!! Form::label('Coordinates', 'X-Coordinate:', ['class' => 'control-label']) !!}
						    {!! Form::text('xcoordinates', null, ['class' => 'form-control']) !!}
						</div>
						
						<div class="form-group">
							{!! Form::label('Coordinates', 'Y-Coordinate:', ['class' => 'control-label']) !!}
						    {!! Form::text('ycoordinates', null, ['class' => 'form-control']) !!}
						</div>
						
						<div class="form-group">
							{!! Form::label('Category', 'Category: ', ['class' => 'control-label']) !!}
							{!! Form::select('category_id',$categories, $article['category_id']) !!}
						</div>

						<div class="form-group">
							{!! Form::label('Tags', 'Tags:', ['class' => 'control-label']) !!}
								@foreach ($tags as $key => $tag)  
									{!! Form::checkbox('tags[]', $key, (in_array($key, $selectedtags)?true:false )) !!} {!! $tag !!}
								@endforeach
						</div>

						<div class="form-group">
							@foreach ($images as $key => $img)
								{!! Html::image('uploads/'.$img->image) !!}
							@endforeach
						</div>

						<div class="form-group">
							{!! Form::label('Status', 'Status: ', ['class' => 'control-label']) !!}
							{!! Form::radio('status',1, true) !!} Active {!! Form::radio('status',0) !!} Disabled
						</div>

						<div class="form-group">
						    {!! Form::label('Article Images: ') !!}
						    {!! Form::file('image[]', array('multiple'=>true)) !!}
						</div>

						{!! Form::submit('Update Article', ['class' => 'btn btn-primary']) !!}

						{!! Form::close() !!}
					</form>
				</div>
			</div>

			
		</div>
	</div>
@endsection