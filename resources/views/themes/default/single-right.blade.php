@extends('layouts.front')

@section('content')
<div class="container bg-theme-wh" style="min-height: 600px;">
    
    <div class="content-sidebar">
        <div class="paddingtop10">
            <span class="box-foot-cat">{{$article[0]->category_name}} / Last Update on {{ \Carbon\Carbon::parse($article[0]->date_created)->format('d/m/Y')}}</span>
        </div>

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
        
        <div class="box-content">
        	{!! $article[0]->content !!}
        </div>

        <div class="box-foot">
            <i class="fa fa-tag" aria-hidden="true"></i>
            @foreach ($article[0]->tags as $tag)
                <span class="box-foot-tag">{{ $tag }}</span>
            @endforeach
        </div>

        <div></div>

        <div id="disqus_thread"></div>

    </div>
    <div class="side-panel-one pull-left leftmargin20">
        <div class="top-articles">
            <h4 class="h4bg">Top Articles</h4>

            <ul class="mostviewed">
                @foreach ($mostViewed as $index => $a)
                    @if ($a->image != "")
                        {!! Html::image('uploads/'.$a->image, 'alt', array( 'width' => '100%', 'height' => '', 'class' => 'img-responsive' )) !!}
                    @else
                        {!! Html::image('uploads/default.png', 'alt', array( 'width' => '100%', 'height' => '', 'class' => 'img-responsive' )) !!}
                    @endif
                    <li><a href="/{{$a->slug}}">{{$a->title}}</a></li>
                @endforeach
            </ul>
        </div>

        <div class="top-articles">
            <h4 class="h4bg">Related Articles</h4>

            <ul class="mostviewed">
                @foreach ($relatedArticles as $index => $r)

                    @if ($r->image != "")
                        {!! Html::image('uploads/'.$r->image, 'alt', array( 'width' => '100%', 'height' => '', 'class' => 'img-responsive' )) !!}
                    @else
                        {!! Html::image('uploads/default.png', 'alt', array( 'width' => '100%', 'height' => '', 'class' => 'img-responsive' )) !!}
                    @endif
                    <li><a href="/{{$r->slug}}">{{$r->title}}</a></li>
                @endforeach
            </ul>
        </div>

        
        
    </div>

</div>
@endsection
        