@extends('layouts.app')

@section('content')
  <div class="flex justify-center">
    <div class="w-8/12 bg-gray-900 p-6 rounded-lg">
      @auth
      <form action="{{route('posts')}}" method="POST" class="mb-4">
        @csrf
        <div class="mb-4">
            <label for="body" class="sr-only">Body</label>
            <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Post something!"></textarea>

            @error('body')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div>
            <button type="submit" class="bg-green-300 text-white px-4 py-2 rounded font-medium">Post</button>
        </div>
      </form>
      @endauth

      @if ($posts->count())
      @foreach ($posts as $post)
          <div class="text-white">
            <p class="font-bold">{{$post->user->name}} <small class="font-normal">{{ $post->created_at->diffForHumans() }}</small></p>
            <p>{{ $post->body }}</p>
          </div>
          

          <div class="flex items-center">
            @auth
            @if(!$post->likedBy(auth()->user()))
            <form action="{{route('posts.likes', $post)}}" method="post" class="mr-1">
              @csrf
              <button type="submit" class="text-green-300">Like</button>
            </form>
            @else
            <form action="{{route('posts.likes', $post)}}" method="post" class="mr-1">
              @csrf
              @method('DELETE')
              <button type="submit" class="text-green-300">Dislike</button>
            </form>
            @endif
            @endauth
            <span class="text-white">{{$post->likes->count()}} {{Str::plural('like', $post->likes->count())}}</span>
          
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