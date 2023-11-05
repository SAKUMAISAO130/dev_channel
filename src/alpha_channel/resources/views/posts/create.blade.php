@extends('layouts.layout')

@section('content')
<div class="container small">
  <h1>確認画面</h1>
  <form action="./create" method="POST">
  @csrf
    <fieldset>
        <div class="form-group">

            <label for="title">タイトル<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
            {{ $post['title'] }}

            <label for="content">説明<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
            {{ $post['content'] }}

            <label>ID表示する</label>
            {{ $post['show_id_flag'] }}
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