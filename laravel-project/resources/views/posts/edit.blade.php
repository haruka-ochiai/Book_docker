@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">編集画面</div>
                <div class="card-body">
                    <form action="{{ route('posts.update', $post->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="title" class="col-md-2 col-form-label text-md-right">タイトル</label>
                            <div class="col-md-9">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title', $post->title) }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="body" class="col-md-2 col-form-label text-md-right">感想</label>
                            <div class="col-md-9">
                                <textarea name="body" id="body" style="resize: none; height: 200px; width: 100%">{{ old('body', $post->body) }}</textarea>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-secondary" onClick="history.back()">戻る</button>
                            <button type="submit" class="btn btn-primary ml-3" name='action' value='add'>
                                変更
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
