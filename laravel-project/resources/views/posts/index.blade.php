@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">投稿一覧</div>
        @isset($search_result)
          <h5 class="card-title">{{ $search_result }}</h5>
        @endisset

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
              @foreach ($posts as $post)
                  <tr>
                      <td class="text-center align-middle">
                          @if($post->image)
                              <img src="{{ Storage::disk('s3')->url($post->image) }}" alt="Uploaded Image" width="80px" height="80px">
                          @else
                            <img src="{{ asset('images/no-image.png') }}" alt="No Image" width="80px" height="80px">
                          @endif
                      </td>
                      <td class="text-center align-middle">
                          <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                      </td>
                      <td class="text-center align-middle">{{ $post->body }}</td>
                  </tr>
              @endforeach
          </tbody>

            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
