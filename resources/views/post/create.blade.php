@extends('layouts.app')
@section('content')

<div class="row">    
    <div class="col-2">
        @include('menu')
    </div>    
    <div class="col-10">
        <div class="container">

            <form action="{{ route('posts.store') }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="text-muted">Title:</label>
                            <input class="form-control" type="text" name="title" value="{{ old('title') }}">
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-muted">About:</label>
                            <input class="form-control" type="text" name="content" value="{{ old('content') }}">
                            @error('content')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sel1">Status:</label>
                            <select class="form-control" name="status">
                                <option value="{{App\Enums\PostType::Published()}}">{{App\Enums\PostType::getKey(0)}}</option>
                                <option value="{{App\Enums\PostType::FriendOnly()}}">{{App\Enums\PostType::getKey(1)}}</option>
                                <option value="{{App\Enums\PostType::OnlyMe()}}">{{App\Enums\PostType::getKey(2)}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" class="btn btn-info" value="Save">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection