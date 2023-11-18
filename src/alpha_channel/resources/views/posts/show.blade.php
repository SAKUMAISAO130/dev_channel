@extends('layouts.layout')

@section('content')
<div class="container small">
<div>
    <a href="/post/{{ $post['id'] }}" class="btn btn-success btn-sm">いいね<span class="badge">111</span></a>
</div>



    <h1>話題</h1>
    <ul>
        <li>話題　：　{{ $post['title'] }}</li>
        <li>内容　：　{{ $post['content'] }}</li>
    </ul>

</div>

<div class="container small">
<h1>コメント</h1>
    <ul>
        @foreach($comments as $comment)
        <li>
            {{ $comment['id'] }} - {{ $comment['content'] }}
            <button class="button_like" data-post-id="{{ $comment['id'] }}">
                good 
                <span class="counter_like" data-post_id="{{ $comment['id'] }}"></span>
            </button>
            <button class="button_unlike" data-post-id="{{ $comment['id'] }}">
                bad 
                <span class="counter_unlike" data-post_id="{{ $comment['id'] }}"></span>
            </button>
        </li>
        @endforeach
    </ul>
    </div>


<div class="container small">
  <h1>コメントを投稿</h1>
  <div>  
        @if ($errors->any())  
            <ul class="text-danger font-bold">  
                @foreach ($errors->all() as $error)  
                    <li>{{ $error }}</li>  
                @endforeach  
            </ul>  
        @endif  
    </div>
  <form action="/comment/create/{{ $id }}" method="POST">
  @csrf
    <fieldset>
        <div class="form-group">

            <label for="content">コメント<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
            <input type="text" class="form-control" name="content" id="content">

            <label>ID表示する</label>
            <div class="form-check form-check-inline">
                <input type="radio" name="show_id_flag" class="form-check-input" id="show_id_flag1" value="投稿しない" {{ old ('show_id_flag') == '投稿しない' ? 'checked' : '' }} checked>
                <label for="show_id_flag1" class="form-check-label">表示しない</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" name="show_id_flag" class="form-check-input" id="show_id_flag2" value="投稿する" {{ old ('show_id_flag') == '投稿する' ? 'checked' : '' }}>
                <label for="show_id_flag2" class="form-check-label">表示する</label>
            </div>
            <div>
                <button type="submit" class="btn btn-success">
                    {{ __('登録') }}
                </button>
            </div>
        </div>
    </fieldset>
  </form>
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
            url: '/comment_like/likeCount/' + post_id,
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
            url: '/comment_like/like/' + post_id,
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
            url: '/comment_like/unlikeCount/' + post_id,
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
            url: '/comment_like/unlike/' + post_id,
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