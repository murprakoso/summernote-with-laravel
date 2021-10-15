@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2 mt-5">
                <div class="card">
                    <div class="card-body">
                        {{-- flash message --}}
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="d-flex justify-content-between">
                            <h4>Post List</h4>
                            <a href="{{ route('post.create') }}">Create New Post</a>
                        </div>
                        <hr>

                        <div class="list-group">
                            @forelse ($posts as $post)
                                <a href="{{ route('post.show', $post->id) }}"
                                    class="list-group-item list-group-item-action">{{ $post->title }}</a>
                            @empty
                                <div class="alert alert-warning">Empty</div>
                            @endforelse
                        </div>

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
