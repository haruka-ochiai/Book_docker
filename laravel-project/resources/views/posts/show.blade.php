@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
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
                    <img src="{{ Storage::disk('s3')->url($post->image) }}" alt="Uploaded Image" width="80px" height="80px">
                  </td>
                @else
                  <td class="text-center align-middle">
                    <img src="{{ asset('images/no-image.png') }}" alt="No Image" width="80px" height="80px">
                  </td>                   
                @endif
                  <td class="text-center align-middle">{{ $post->title }}</a></td>
                  <td class="text-center align-middle">{{ $post->body }}</td>
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
                    <input type="submit" value="削除" class="btn btn-danger ml-3" onclick='return confirm("本当に削除しますか？")'>
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
