@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Topページ</div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5 class="my-5">
                        このサイトでは本を探したり<br>
                        お気に入りの本を<br>
                        投稿することができます。
                    </h4>

                    <button type="button" class="btn btn-outline-primary mb-3 w-50" onclick="location.href='{{ route('posts.create') }}'">
                        新規投稿をする
                    </button>
                    <button type="button" class="btn btn-outline-primary mb-3 w-50" onclick="location.href='{{ route('posts.index') }}'">
                        投稿一覧を見る
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
