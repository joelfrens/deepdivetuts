@extends('layouts.app')

@section('content')
	<!-- Page content -->
	<div class="page-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<div class="breadcrumb">
						Articles
						<a class="no-link disp-link" href="{{ url('admin/articles/create') }}">
							<i class="fa fa-plus icon-disp-link" aria-hidden="true"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<div class="table-list">
						@if (count($articles) > 0)
						<div class="pagination-container">
							<?php echo $articles->render(); ?>
						</div>
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
								<tr>
									<th>
										<input type="checkbox" class="table-list-check-all" />
									</th>
									<th>Title</th>
									<th>Author</th>
									<th>Category</th>
									<th>Statistics</th>
									<th>Status</th>
									<th>
										<form action="/admin/article/" method="POST">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}

											<i class="fa fa-trash-o table-del-ic" aria-hidden="true"></i>
											
										</form>
									</th>
								</tr>
								</thead>
								<tbody>
								@foreach ($articles as $article)
								<tr>
									<td scope="row">
										<input type="checkbox" class="table-list-check" />
									</td>
									<td>{{ $article->title }}
										<br>
										@foreach ($article->tags as $tag)
											<span class="label label-primary tag-bg">{{ $tag }}</span>
										@endforeach
									</td>
									<td>{{ $article->fullname }}</td>
									<td>{{ $article->category_name }}</td>
									<td>&nbsp</td>
									<td>
									@if ($article->active == 1)
										Active
									@else
										Disabled
									@endif
									</td>
									<td>
										<a href="{{ URL::to('admin/articles/' . $article->id . '/edit') }}"><i class="fa fa-pencil table-edit-ic" aria-hidden="true"></i></a>
										<form action="/admin/articles/{{ $article->id }}" method="POST" class="inline-block">
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
							<?php echo $articles->render(); ?>
						</div>
						@else
							No data
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection