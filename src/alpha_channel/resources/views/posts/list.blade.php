@extends('layouts.layout')

@section('content')
<div class="container small">
    <h1>話題一覧</h1>
    <div>
    <a href="/post/new" class="btn btn-success btn-sm">新規作成<span class="badge">111</span></a>
</div>

    <ul>
        @foreach($posts as $post)
        <li>
            {{ $post->id }}. 
            <a href="show/{{ $post->id }}">{{ $post->title }}</a>
            <button class="button_like" data-post-id="{{ $post->id }}">
                good 
                <span class="counter_like" data-post_id="{{ $post->id }}"></span>
            </button>
            <button class="button_unlike" data-post-id="{{ $post->id }}">
                bad 
                <span class="counter_unlike" data-post_id="{{ $post->id }}"></span>
            </button>
            </li>
        @endforeach
    </ul>

    <button>テスト</button>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">

$(function () {

    /**
    * good
    **/

    // すべてのカウンターを取得する
    $(".counter_like").each(function(index, element){
        // カウンターを取得
        let counter = $(this);
        let post_id = counter.data("post_id"); 

        // Ajax通信を開始する
        $.ajax({
            type: "POST",
            url: '/like/likeCount/' + post_id,
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                // テキスト入れ替え
                counter.text(data);
            },
            error: function(data){
                console.log('AJAX_ERROR_8766697');
            }
        })
    })


    $('.button_like').click(function () {
        // ボタンを取得
        let button = $(this);
        let post_id = button.data('post-id');
        let count = button.find('.counter_like').text();

        // Ajax通信を開始する
        $.ajax({
            type: "POST",
            url: '/like/like/' + post_id,
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                console.log(data);
                if (data === 'いいね成功') {
                    button.find('.counter_like').text(parseInt(count) + 1);
                }
            },
            error: function(data){
                console.log('AJAX_ERROR_8726343');
            }
        })
    });




    /**
    * bad
    **/
    // すべてのカウンターを取得する
    $(".counter_unlike").each(function(index, element){

        // カウンターを取得
        let counter = $(this);
        let post_id = counter.data("post_id"); 

        // Ajax通信を開始する
        $.ajax({
            type: "POST",
            url: '/like/unlikeCount/' + post_id,
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                // テキスト入れ替え
                counter.text(data);
            },
            error: function(data){
                console.log('AJAX_ERROR_87654697');
            }
        })
    })

    $('.button_unlike').click(function () {
        // ボタンを取得
        let button = $(this);
        let post_id = button.data('post-id');
        let count = button.find('.counter_unlike').text();

        // Ajax通信を開始する
        $.ajax({
            type: "POST",
            url: '/like/unlike/' + post_id,
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                console.log(data);
                if (data === 'いいね成功') {
                    button.find('.counter_unlike').text(parseInt(count) + 1);
                }
            },
            error: function(data){
                console.log('AJAX_ERROR_872983');
            }
        })
    });
});
</script>
@endsection