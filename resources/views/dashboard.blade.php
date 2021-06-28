@extends('layouts.app')

@section('content')
<div class="flex justify-center mb-6">
  <div class="w-8/12 bg-gray-900 p-6 rounded-lg text-white flex">
    <img src="{{asset('images/' . $user->image_path)}}" alt="profile image" class="h-48">
    <div class="flex flex-col">
      <h2 class="px-6 font-bold text-xl">{{ auth()->user()->name }}</h2>
      <p class="px-6 font-normal text-lg">{{ $user->email }}</p>
    </div>

  </div>
</div>

  <div class="flex justify-center">
    <div class="w-8/12 bg-gray-900 p-6 rounded-lg text-white">
      <div class="py-6">
        <p>Total posts: {{ $posts->count() }}</p>
        <p>Total likes: {{ $user->allLikes->count() }}</p>
      </div>
      @if ($posts->count())
      @foreach ($posts as $post)
        <div class="text-white">
          <p class="font-bold">{{$post->user->name}} <small class="font-normal">{{ $post->created_at->diffForHumans() }}</small></p>
          <p>{{ $post->body }}</p>
        </div>

          <div class="flex items-center">
            <span>{{$post->likes->count()}} {{Str::plural('like', $post->likes->count())}}</span>
          </div>
          @auth
            @can('delete', $post)
                <form action="{{route('posts.destroy', $post)}}" method="post" class="mr-1">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="bg-red-500 text-white px-2 py-1 mb-4 rounded font-medium">Delete</button>
                </form>
              @endcan
          @endauth
      @endforeach

      {{ $posts->links() }}
      @else
          <p>There are no posts</p>
      @endif
    </div>
  </div>
@endsection