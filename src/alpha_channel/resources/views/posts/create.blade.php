@extends('layouts.layout')

@section('content')
<div class="container small">
  <h1>投稿完了</h1>
  <p>承認までは通常1時間程度お時間を頂いております</p>
    <fieldset>
        <div class="form-group">

            <label for="title">タイトル<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
            {{ $post['title'] }}

            <label for="content">説明<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
            {{ $post['content'] }}

            <label>ID表示する</label>
            {{ $post['show_id_flag'] }}
            <div>
              <a href="/" class="btn btn-success btn-sm">TOPへ戻る<span class="badge">111</span></a>

            </div>
        </div>
    </fieldset>
s</div>
@endsection