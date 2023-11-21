@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">投稿一覧</div>

        <div class="card-body">
            <button type="button" class="btn btn-primary mb-3 d-block w-100" onclick="location.href='{{ route('posts.create') }}'">
                新規投稿
            </button>
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
                @if(isset($posts))
                @foreach ($posts as $post)
                <tr>
                  
                      <td class="text-center align-middle">
                        <img src="{{ $url }}" alt="Uploaded Image">
                      </td>
                    
                  <td class="text-center align-middle"><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></td>
                  <td>{{ $post->body }}</td>
                </tr>
                @endforeach
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
