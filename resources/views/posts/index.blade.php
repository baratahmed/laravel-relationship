@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Posts (With Users)</b></div>

                <div class="card-body">

                    @foreach ($posts as $post)
                        <h2>{{ $post->title}}</h2>
                        {{--  <h4>{{ optional($post->user)->name }}</h4>  --}}
                        <h4>{{ $post->user->name }}</h4>   {{-- optional()  or withDefault() in model  --}}
                        <ul>
                            @foreach($post->tags as $tag)
                                <li>{{ $tag->name }} | ({{ $tag->pivot->created_at }}) | ({{ $tag->pivot->status }}) </li>
                            @endforeach
                        </ul>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
