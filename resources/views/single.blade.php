@extends('layouts.front')

@section('content')
<div class="container" style="min-height: 600px;">
    
    <div class="content-no-sidebar">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- big hori -->
        <ins class="adsbygoogle"
             style="display:inline-block;width:728px;height:90px"
             data-ad-client="ca-pub-1723053501613692"
             data-ad-slot="6490772110"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        <h1 class="inline-block no-margin font-light">
        	{{ $article[0]->title }}
        </h1>
        <br />
        <div class="box-foot">
        	Posted by <span class="box-foot-author">{{$article[0]->fullname}}</span> in <span class="box-foot-cat">{{$article[0]->category_name}}</span>
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
