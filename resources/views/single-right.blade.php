@extends('layouts.front')

@section('content')
<div class="container" style="min-height: 600px;">
    
    <div class="content-sidebar">
        <h4 class="inline-block no-margin font-light">
        	{{ $article[0]->title }}
        </h4>
        <div class="box-foot">
        	Posted by <span class="box-foot-author">Joel Fernandes</span> in <span class="box-foot-cat">PHP</span>
			@foreach ($article[0]->tags as $tag)
				<span class="box-foot-tag">{{ $tag }}</span>
			@endforeach
		</div>
        <div class="box-content">
        	{!! $article[0]->content !!}
        	
        </div>
    </div>
    <div class="side-panel-one pull-right">
        right sidebar 1234
    </div>

</div>
@endsection
        
<style>
	.sep-wrap {
		padding: 12px;
	}
	.box-wrapper {
		padding: 12px;
		font-weight: 300;
		line-height: 2em;
	}
	.box-foot {
    	font-weight: 100;
    	font-size: 12px;
	}
	.box-foot-author {
		color: blue;
	}
	.box-foot-cat {
		color: green;
	}
	.box-foot-tag {
		border-radius: 10px;
	    background-color: transparent;
	    border: 1px solid #ff9800;
	    padding: 2px 5px;
	    font-size: 10px
	}
	.like-box {
		color: #ff5252;
	}
	.box-separator {
		color: #efefef;
	}

	.box-content {
		font-size: 15px;
		font-weight:300;
	}
</style>
