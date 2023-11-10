@extends('layouts.layout')

@section('content')
<div class="container small">
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
        <li>{{ $comment['id'] }} - {{ $comment['content'] }}　good bad</li>
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

@endsection