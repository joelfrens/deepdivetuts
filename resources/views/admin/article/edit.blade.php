@extends('layouts.app')

@section('content')
	<div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumb">
                        Edit Article
                        <a class="no-link disp-link" href="{{ url('admin/articles') }}">
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
						<!-- Edit article Form -->
							{!! Form::model($article, [
							    'method' => 'PATCH',
							    'files' => true,
							    'route' => ['articles.update', $article->id]
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

							<!--<div class="form-group">
								{!! Form::label('Coordinates', 'X-Coordinate:', ['class' => 'control-label']) !!}
							    {!! Form::text('xcoordinates', null, ['class' => 'form-control']) !!}
							</div>
							
							<div class="form-group">
								{!! Form::label('Coordinates', 'Y-Coordinate:', ['class' => 'control-label']) !!}
							    {!! Form::text('ycoordinates', null, ['class' => 'form-control']) !!}
							</div>-->
							
							<div class="form-group">
								{!! Form::label('Category', 'Category: ', ['class' => 'control-label']) !!}
								{!! Form::select('category_id',$categories, $article['category_id'], ['class' => 'dropdown form-control']) !!}
							</div>

							<div class="form-group">
								{!! Form::label('Tags', 'Tags') !!}
								<div class="custom-checkbox">
								@foreach ($tags as $key => $tag)  
									{!! Form::checkbox('tags[]', $key, (in_array($key, $selectedtags)?true:false), ['class' => 'checkbox-custom', 'id' => 'tag'.$key]) !!}
									{!! Form::label('tag'.$key, $tag, ['class' => 'checkbox-custom-label']) !!}
								@endforeach
								</div>
							</div>

							<div class="form-group">
								{{ Form::label('status', 'Status') }}

								<div class="custom-radio-btns mg-bm-xs">
					                @if ($article->active == '1')
				                        {{ Form::radio('status', '1', true, ['checked' => 'checked', 'class' => 'radio-custom', 'id' => 'status-yes']) }} 
					                    <label for="status-yes" class="radio-custom-label">Yes</label>
					                    {{ Form::radio('status', '0', false, ['class' => 'radio-custom', 'id' => 'status-no']) }} 
					                    <label for="status-no" class="radio-custom-label">No</label>
					                @else
					                    {{ Form::radio('status', '1', false, ['class' => 'radio-custom', 'id' => 'status-yes']) }} 
					                    <label for="status-yes" class="radio-custom-label">Yes</label>
					                    {{ Form::radio('status', '0', true, ['checked' => 'checked', 'class' => 'radio-custom', 'id' => 'status-no']) }}
					                    <label for="status-no" class="radio-custom-label">No</label>
					                @endif    
				                </div>
			                </div>

			                <div class="form-group">
								@foreach ($images as $key => $img)
									{!! Html::image('uploads/'.$img->image, 'alt', array( 'width' => 70, 'height' => '' )) !!}
								@endforeach
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
	</div>
@endsection