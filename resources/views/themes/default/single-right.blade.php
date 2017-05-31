@extends('layouts.front')

@section('content')
<div class="container" style="min-height: 600px;">
    
    <div class="content-sidebar">
        
        <div class="form-group">
            <div class="featured-image">
                @foreach ($images as $key => $img)
                    {!! Html::image('uploads/'.$img->image, 'alt', array( 'width' => '100%', 'height' => '' )) !!}
                @endforeach
            </div>
        </div>

        <h1 class="inline-block no-margin title-margin">
        	{{ $article[0]->title }}
        </h1>
        <div class="box-foot">
        	Posted by <span class="box-foot-author">Joel Fernandes</span> in <span class="box-foot-cat">PHP</span>
			@foreach ($article[0]->tags as $tag)
				<span class="box-foot-tag">{{ $tag }}</span>
			@endforeach
		</div>
        <div class="box-content">
        	{!! $article[0]->content !!}
        </div>

        <div class="sharethis-inline-share-buttons"></div>
        <div id="disqus_thread"></div>

    </div>
    <div class="side-panel-one pull-left leftmargin20">
        <div class="top-articles">
            <h4 class="h4bg">Top Articles</h4>

            <ul class="mostviewed">
                @foreach ($mostViewed as $index => $a)
                    <li><a href="/{{$a->slug}}">{{$a->title}}</a></li>
                @endforeach
            </ul>
        </div>

        <div class="top-articles">
            <h4 class="h4bg">Related Articles</h4>
        </div>

        
        
    </div>

</div>
@endsection
        