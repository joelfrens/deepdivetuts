@extends('layouts.front')

@section('content')
<div class="container" style="min-height: 600px;">
    
    <div class="content-no-sidebar">
    	@foreach ($articles as $key => $article)

        <div class="box-wrapper">
			<div class="box-head">
		        <!--<span class="like-box font-thin">
		        	<i class="fa fa-heart-o" aria-hidden="true"></i>
		        </span>-->
		        <h4 class="inline-block no-margin font-light">
		        	<a href="/{{$article->slug}}" >{{ $article->title }}</a>
		        </h4>
	        </div>
	        <div class="box-foot">
	        	Posted by <span class="box-foot-author">Joel Fernandes</span> in <span class="box-foot-cat">{{ $article->category_name }}</span>
				@foreach ($article->tags as $tag)
					<span class="box-foot-tag">{{ $tag }}</span>
				@endforeach
			</div>
			@if ($key == 5)
				<div class="sep-wrap">
					<hr class="box-separator no-margin">
				</div>
				<div class="box-foot">
					<img src="http://www.lipsum.com/banners/ding.png" width="100%" border="0" alt="Time tracking for freelancers">
				</div>
			@endif
		</div>
		<div class="sep-wrap">
			<hr class="box-separator no-margin">
		</div>
		@endforeach
    </div>
   
    <div class="pagination-container">
		<?php echo $articles->render(); ?>
	</div>

</div>
@endsection
