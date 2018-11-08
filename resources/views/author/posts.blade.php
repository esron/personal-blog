@extends('layouts.admin')

@section('title') Author Posts @endsection

@section('content')
<div class="content">
    <div class="card">
        <div class="card-header bg-light">
            Author Posts
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
                        @foreach (Auth::user()->posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td><a href="{{ route('singlePost', $post->id) }}">{{ $post->title }}</a></td>
                                <td>{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</td>
                                <td>{{ \Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}</td>
                                <td>{{ $post->comments->count() }}</td>
                                <td>
                                    <a href="{{ route('postEdit', $post->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="#" data-toggle="modal" data-target="#deletePostModal-{{ $post->id }}" class="btn btn-danger">Remove</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@foreach (Auth::user()->posts as $post)
<div class="modal fade" id="deletePostModal-{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">You are about to delete {{ $post->title }}.</h5>
      </div>
      <div class="modal-body">
        Are you sure?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, keep it</button>
        <form method="POST" id="deletePost-{{ $post->id }}"action="{{ route('deletePost', $post->id) }}">
            @csrf
            <button type="submit" class="btn btn-primary">Yes, delete it</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection