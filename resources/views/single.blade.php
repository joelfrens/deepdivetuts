@extends('layouts.front')

@section('content')
<div class="container" style="min-height: 600px;">
    
    <div class="content-no-sidebar">
        
        <h1 class="inline-block no-margin title-margin">
        	{{ $article[0]->title }}
        </h1>
        @if ($settings['server_env'] != 'local')
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- 970 hori -->
            <ins class="adsbygoogle"
                 style="display:inline-block;width:970px;height:90px"
                 data-ad-client="ca-pub-1723053501613692"
                 data-ad-slot="7392095718"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        @endif
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

        @if ($settings['server_env'] != 'local')
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- 970 hori -->
            <ins class="adsbygoogle"
                 style="display:inline-block;width:970px;height:90px"
                 data-ad-client="ca-pub-1723053501613692"
                 data-ad-slot="7392095718"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        @endif

    </div>

</div>
@endsection
