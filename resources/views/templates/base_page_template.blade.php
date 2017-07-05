@extends('layouts/master')

@section('content')
<div class="tier-1 col-md-12">
    <div class="container container-row">
        {!! $page->content !!}
    </div>
</div>
@endsection
