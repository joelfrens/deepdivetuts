@extends('layouts.front')

@section('content')
<div class="container title-margin bg-theme-wh" style="min-height: 600px;">
    <div class="row">
        <div class="col-xs-12">
            <div class="input-group search-box">
                <form action="/search" method="POST" role="search">
                    {{ csrf_field() }}
                    @if ($keyword)
                        <input type="text" class="form-control search-input" name="keyword" placeholder="Search tutorials..." value="{{$keyword}}">
                    @else
                        <input type="text" class="form-control search-input" name="keyword" placeholder="Search tutorials..." value="">
                    @endif
                    <span class="input-group-btn search-btn-wrap">
                        <button class="btn btn-default search-btn" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </span>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
    	@foreach ($articles as $index => $article)

    	<div class="col-xs-12 col-md-6 col-lg-4">
    		<div class="article-sub-box">
	    		<div class="box-head">
	    			@if ($article->image != "")
			            {!! Html::image('uploads/'.$article->image, 'alt', array( 'width' => '100%', 'height' => '', 'class' => 'img-responsive' )) !!}
			        @else
			        	{!! Html::image('uploads/default.png', 'alt', array( 'width' => '100%', 'height' => '', 'class' => 'img-responsive' )) !!}
			        @endif
		        </div>
		        <div class="box-foot">
		        	<h5 class="inline-block font-light">
			        	<a href="/{{$article->slug}}" >{{ $article->title }}</a>
			        </h5>
		        	<div>
			            <span class="box-foot-cat">{{$article->category_name}} / Last Update on {{ \Carbon\Carbon::parse($article->date_created)->format('d/m/Y')}}</span>
			        </div>
					<!--@foreach ($article->tags as $key => $tag)
						<span class="box-foot-tag"><a href="{{ $settings['site_url'] }}tag/{{$key}}">{{ $tag }}</a></span>
					@endforeach-->
				</div>
			</div>
    	</div>
		@endforeach
    </div>

    <div class="row">
	    <div class="col-xs-12">
	    	<div class="pagination-container">
				<?php echo $articles->render(); ?>
			</div>
		</div>
    </div>
</div>
@endsection
