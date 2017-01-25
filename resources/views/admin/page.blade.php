@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @foreach ($categories as $category)

                        {{ $category->name }}
                        
                    @endforeach
                </div>
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

{{-- This is comments --}}
@section('content1')
    @php
        echo "This is PHP";
    @endphp

    <div>
        @include('common.footer')
    </div>

@endsection

