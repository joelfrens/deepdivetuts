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

						<!-- New Category Form -->
						{{ Form::open(array('url' => '/admin/tag', 'files' => true)) }}
						
						{{ csrf_field() }}

						<div class="form-group">
						    {!! Form::label('tag-name', 'Tag name:', ['class' => 'control-label']) !!}
						    {!! Form::text('name', null, ['class' => 'form-control']) !!}
						</div>

						{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}

						{!! Form::close() !!}
							
				</div>
			</div>

			<!-- Current Category -->
			@if (count($tags) > 0)
				<div class="panel panel-default">
					<div class="panel-heading">
						Current Tags
					</div>

					<div class="panel-body">
						<table class="table table-striped task-table">
							<thead>
								<th>Tags</th>
								<th>&nbsp;</th>
							</thead>
							<tbody>
								@foreach ($tags as $tag)
									<tr>
										<td class="table-text"><div>{{ $tag->name }}</div></td>

										<!-- article Delete Button -->
										<td>
											<form action="/admin/tag/{{ $tag->id }}" method="POST">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}

												<button type="submit" class="btn btn-danger">
													<i class="fa fa-trash"></i>Delete
												</button>
											</form>

										</td>
										<td>
											<a href="{{ route('tag.edit', $tag->id) }}" class="btn btn-primary">Edit Tag</a>
											
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			@endif
			<?php echo $tags->render(); ?>
		</div>
	</div>
@endsection