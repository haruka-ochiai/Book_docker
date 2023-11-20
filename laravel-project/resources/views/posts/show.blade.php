@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">記事詳細</div>

        <div class="card-body">
          <div class="table-resopnsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>タイトル</th>
                  <th>本文</th>
                </tr>
              </thead>
              <tbody>
                @if(isset($post))
                <tr>
                  <td>{{ $post->title }}</a></td>
                  <td>{{ $post->body }}</td>
                </tr>
                @endif
              </tbody>
            </table>
            @if(isset($post))
            <div class="text-center">
                <button type="button" class="btn btn-secondary" onClick="history.back()">戻る</button>
                <form style="display:inline" action="{{ route('posts.destroy', $post->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger ml-3">
                        {{ __('削除') }}
                    </button>
                </form>
                <button type="button" class="btn btn-primary ml-3" onClick="location.href='{{ route('posts.edit', $post->id) }}'">
                    編集
                </button>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
