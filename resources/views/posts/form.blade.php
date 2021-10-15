@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2 mt-5">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h4>New Post</h4>
                            <a href="{{ route('post.index') }}">List Post</a>
                        </div>
                        <hr>

                        <form action="{{ route('post.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Title..">
                            </div>
                            <div class="mb-3">
                                <label for="body" class="form-label">Body</label>
                                <textarea class="form-control summernote" name="body" id="body" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </form>
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
