@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-start">
        <!-- <div class="col-2">画像</div> -->
        <div class="col-10">
            <div class="card-body">
                <h5 class="card-title me-5">
                    {{ $post->user->name }}
                </h5>
                <h6 class="card-subtitle mb-2 text-muted">
                    {{ $post->updated_at->format('Y/m/d') }}
                </h6>
                <p class="card-text">
                    <form action="{{ route('update') }}" method="post">
                        <div class="mb-3">
                            @csrf
                            <input type="hidden" name="id" value="{{ $post->id }}">
                            <textarea
                                class="form-control mb-3"
                                name="postMessage"
                                placeholder="ここにメッセージを入力"
                                rows="3"
                            >{{ $post->message }}</textarea>
                            <input
                                type="submit"
                                class="btn btn-primary"
                                value="保存"
                            />
                        </div>
                    </form>
                </p>
            </div>
        </div>
        <div>
            <form action="{{ route('delete') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $post->id }}">
                <input type="submit" class="btn btn-danger" value="削除">
            </form>
            <a href="{{ route('home') }}" role="button" class="btn btn-primary"
                >一覧に戻る</a
            >
        </div>
    </div>
</div>
@endsection
