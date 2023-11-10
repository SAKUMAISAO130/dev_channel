@extends('layouts.layout')

@section('content')
<div class="container small">
    <h1>話題一覧</h1>
    <ul>
        @foreach($posts as $post)
        <li><a href="show/{{ $post->id }}">{{ $post->title }}</a></li>
        @endforeach
    </ul>

</div>
@endsection