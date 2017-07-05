@extends('layouts/master')

@section('content')
    <div class="row">
        <div class="col-md-12 tier-1">
            <div class="container">
                <h3>{{$blog->name}}</h3>
                <p>{!! $blog->content !!}</p>
            </div>
        </div>
    </div>
@endsection