@extends('layouts.admin')

@section('title') Admin Posts @endsection

@section('content')
<div class="content">
    <div class="card">
        <div class="card-header bg-light">
            Admin Posts
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Created at</th>
                        <th>Udated at</th>
                        <th>Comments</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td><a href="{{ route('singlePost', $post->id) }}">{{ $post->title }}</a></td>
                                <td>{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</td>
                                <td>{{ \Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}</td>
                                <td>{{ $post->comments->count() }}</td>
                                <td>
                                    <a href="{{ route('adminPostEdit', $post->id) }}" class="btn btn-warning">Edit</a>
                                    <form method="POST" id="adminDeletePost-{{ $post->id }}"action="{{ route('adminDeletePost', $post->id) }}">@csrf</form>
                                    <a href="#" onclick="document.getElementById('adminDeletePost-{{ $post->id }}').submit()" class="btn btn-danger">Remove</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection