@extends('layouts.app')

@section('content')
	<!-- Page content -->
	<div class="page-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<div class="breadcrumb">
						Tags
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

                        {{ Form::open(array('url' => '/admin/tag', 'files' => true)) }}
                        
                        {{ csrf_field() }}

                        <div class="form-group">
                            {!! Form::label('tag-name', 'Tag name') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                        </div>

						{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
						{!! Form::close() !!}
					</div>

					@if (count($tags) > 0)
					<div class="table-list">
						<div class="pagination-container">
							{{ $tags->links() }}
						</div>
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
								<tr>
									<th>
										<input type="checkbox" class="table-list-check-all" />
									</th>
									<th>Name</th>
									<th class="text-right">
										<i class="fa fa-trash-o table-del-ic" aria-hidden="true"></i>
									</th>
								</tr>
								</thead>
								<tbody>
								@foreach ($tags as $tag)
                                    <tr>
                                    	<td scope="row">
											<input type="checkbox" class="table-list-check" />
										</td>
                                        <td>{{ $tag->name }}</td>

                                        <td align="right">
                                            <a href="{{ route('tag.edit', $tag->id) }}">
                                            	<i class="fa fa-pencil table-edit-ic" aria-hidden="true"></i>
                                            </a>
                                            <form action="/admin/tag/{{ $tag->id }}" method="POST" class="inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-trans">
                                                    <i class="fa fa-times table-row-del" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
								</tbody>
							</table>
						</div>
						<div class="pagination-container">
							{{ $tags->links() }}
						</div>
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection