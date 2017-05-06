@extends('layouts.front')

@section('content')
<div class="container" style="min-height: 600px;">
    
    <div class="content-no-sidebar">
        <br />
        <h1 class="inline-block no-margin font-light">
        	{{ $page[0]->title }}
        </h1>
        <br />
        <div class="box-content">
        	{!! $page[0]->content !!}
        </div>
    </div>

</div>
@endsection
