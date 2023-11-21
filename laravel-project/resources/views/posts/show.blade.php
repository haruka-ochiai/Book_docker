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
                  <th style="width: 20%;" class="text-center">画像</th>
                  <th style="width: 20%;" class="text-center">タイトル</th>
                  <th style="width: 60%;" class="text-center">感想</th>
                </tr>
              </thead>
              <tbody>
                @if(isset($post))
                <tr>
                  @if($post->image)
                    <td class="text-center align-middle">
                      <img src="{{ $url }}" alt="Uploaded Image">
                    </td>
                  @else
                    <td class="text-center align-middle">
                      <img src="public/images/no-image.png" alt="images" width="80" height="80">
                    </td>                   
                  @endif
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
