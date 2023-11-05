@extends('layouts.layout')

@section('content')
<div class="container small">
  <h1>話題を投稿</h1>
  <form action="./create" method="POST">
  @csrf
    <fieldset>
        <div class="form-group">

            <label for="title">タイトル<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
            <input type="text" class="form-control" name="title" id="title">

            <label for="content">説明<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
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