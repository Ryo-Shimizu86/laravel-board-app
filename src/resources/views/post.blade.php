@extends('layouts.app') @section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row justify-content-start">
        <div class="col-md-8">
            <form action="{{ route('store') }}" method="post">
                <div class="mb-3">
                    @csrf
                    <textarea
                        class="form-control mb-3"
                        name="postMessage"
                        placeholder="ここにメッセージを入力"
                        rows="3"
                    ></textarea>
                    <input
                        type="submit"
                        class="btn btn-primary"
                        value="投稿する"
                    />
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-start">
        @foreach ($posts as $post)
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
                    <a
                        href="{{ route('detail', [ 'id'=>$post->id ]) }}"
                        class="d-inline-block text-truncate message-title"
                    >
                        {{ $post->message }}
                    </a>
                </p>
            </div>
        </div>
        @endforeach
    </div>
    {{ $posts->links() }}
</div>

@endsection
