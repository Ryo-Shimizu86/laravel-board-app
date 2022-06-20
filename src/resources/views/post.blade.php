@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        <div class="col-md-8">
            <form action="{{ route('store')}}" method="post">
                <div class="mb-3">
                    @csrf
                    <textarea class="form-control mb-3" name="postMessage" placeholder="ここにメッセージを入力" rows="3"></textarea>
                    <input type="submit" class="btn btn-primary" value="投稿する">
                  </div>
            </form>
        </div>
    </div>
</div>
@endsection
