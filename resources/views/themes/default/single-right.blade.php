@extends('layouts.front')

@section('content')
<div class="container" style="min-height: 600px;">
    
    <div class="content-sidebar">
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
    <div class="side-panel-one pull-right">
        right sidebar 1234
    </div>

</div>
@endsection
        