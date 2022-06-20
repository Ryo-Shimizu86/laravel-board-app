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
                    {{ $post->message }}
                </p>
            </div>
        </div>
        <div>
            <a href="{{ route('home') }}" role="button" class="btn btn-primary"
                >一覧に戻る</a
            >
        </div>
    </div>
</div>
@endsection
