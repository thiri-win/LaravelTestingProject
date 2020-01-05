@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-2">
        @include('menu')
    </div>    
    <div class="col-10">       
        <div class="card mb-3" style="max-width: 500px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="https://picsum.photos/id/6/100/100" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-10">
                                <h5 class="card-title">{{$post->title}}</h5>
                            </div>
                            @if($post->postOwner())
                            <div class="col-2">
                                <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                            </div>
                            @endif
                        </div>
                        <h6 class="card-subtitle text-muted">{{$post->user->name}}</h6>
                        <p class="card-text">{{$post->content }}</p>
                        <p class="card-text text-muted">{{ \App\Enums\PostType::getDescription($post->status) }}</p>

                        <span class="card-text"><small class="text-muted">Last updated {{$post->updated_at->diffForHumans()}}</small></span>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>

@endsection