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
						<!-- New article Form -->
						{{ Form::open(array('url' => '/admin/article', 'files' => true)) }}
						
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
							{!! Form::label('Category', 'Category:', ['class' => 'control-label']) !!}
							{!! Form::select('category',$categories) !!}
						</div>

						<div class="form-group">
							{!! Form::label('Tags', 'Tags:', ['class' => 'control-label']) !!}
								@foreach ($tags as $key => $tag)  
									{!! Form::checkbox('tags[]', $key, true) !!} {!! $tag !!}
								@endforeach
						</div>

						<div class="form-group">
						    {!! Form::label('Article Images: ') !!}
						    {!! Form::file('image[]', array('multiple'=>true)) !!}
						</div>

						<div class="form-group">
							{!! Form::label('Status', 'Status', ['class' => 'control-label']) !!}
							{!! Form::radio('status',1, true) !!} Active {!! Form::radio('status',0) !!} Disabled
						</div>

						{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}

						{!! Form::close() !!}
				</div>
			</div>

			<!-- Current article -->
			@if (count($articles) > 0)
				<div class="panel panel-default">
					<div class="panel-heading">
						Current Articles
					</div>

					<div class="panel-body">
						<table class="table table-striped task-table">
							<thead>
								<th>Articles</th>
								<th>&nbsp;</th>
							</thead>
							<tbody>
								@foreach ($articles as $article)
									<tr>
										<td class="table-text"><div>{{ $article->title }}</div></td>

										<!-- article Delete Button -->
										<td>
											<form action="/admin/article/{{ $article->id }}" method="POST">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}

												<button type="submit" class="btn btn-danger">
													<i class="fa fa-trash"></i>Delete
												</button>
											</form>

										</td>
										<td>
											<a href="{{ route('article.edit', $article->id) }}" class="btn btn-primary">Edit Task</a>
											
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			@endif
			<?php echo $articles->render(); ?>
		</div>
	</div>
@endsection