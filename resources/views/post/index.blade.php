@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-2">
        @include('menu')
    </div>    
    <div class="col-10">
        @if(Auth::check())
        <div align="right">
            <a href="{{route( 'posts.create' ) }}" class="btn btn-info">Add New Post</a>
            <a href="{{route( 'posts.trashedposts', auth()->user() ) }}" class="btn btn-danger">My Trashed Post</a>
        </div> 
        @endif
        @foreach ($posts as $post)            
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
                                    <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-info text-white"><i class="fa fa-edit"></i></a>
                                    <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                    </div>
                                @endif
                            </div>
                            <h6 class="card-subtitle text-muted">{{$post->user->name}}</h6>
                            <p class="card-text">{{$post->content }}</p>
                            {{-- <p class="card-text">{{ \App\Enums\PostType::getDescription($post->status) }}</p> --}}
                            <p class="card-text">{{ $post->status }}</p>

                            <span class="card-text"><small class="text-muted">Last updated {{$post->updated_at->diffForHumans()}}</small></span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{ $posts->links() }}
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        console.log('object');
    });
</script>
@endpush