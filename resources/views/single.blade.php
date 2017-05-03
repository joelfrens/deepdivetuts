@extends('layouts.front')

@section('content')
<div class="container" style="min-height: 600px;">
    
    <div class="content-no-sidebar">
        <br />
        <h1 class="inline-block no-margin font-light">
        	{{ $article[0]->title }}
        </h1>
        <br />
        <div class="box-foot">
        	Posted by <span class="box-foot-author">Joel Fernandes</span> in <span class="box-foot-cat">PHP</span>
			@foreach ($article[0]->tags as $tag)
				<span class="box-foot-tag">{{ $tag }}</span>
			@endforeach
		</div>
        <div class="box-content">
        	{!! $article[0]->content !!}
        	
        </div>
        <div id="disqus_thread"></div>
    </div>

</div>
@endsection
