@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2 mt-5">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h4>{{ $post->title }}</h4>
                            <a href="{{ route('post.index') }}">List Post</a>
                        </div>
                        <hr>

                        {!! $post->body !!}

                    </div>
                </div>
                {{-- footer --}}
                <div class="footer text-center mt-3">
                    <p>Summernote bs-4 with laravel.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
