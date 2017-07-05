@extends('layouts/master')

@section('content')
    <div class="row">
        <div class="col-md-12 tier-1">
            <div class="container">
        @forelse ($blogs as $b)
            <div class="clearfix"></div>
            <a href="/blog/{{$b->slug}}"><h3>{{$b->name}}</h3></a>
            <p>{{$b->description}}</p>
            <div class="clearfix"></div>
            @if (sizeof($blogs) > 1)
                <hr>
            @endif
        @empty
            <p>Nothing to display here for now.</p>
        @endforelse
            </div>
        </div>
    </div>
@endsection