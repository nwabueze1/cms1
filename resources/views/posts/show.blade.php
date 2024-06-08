@extends("layouts.app")

@section('content')
    <h2>{{$post->title}}</h2>
    <p>{{$post->body}}</p>
    <div>
        <img src="{{$post->image->url}}" class="block w-1/4" >
        <div class="flex gap-1 flex-wrap">
        <a href="{{route('posts.edit', $post->id)}}" class="btn-block bg-green-800 text-white rounded-md my-2 px-3 py-1 text-uppercase hover:bg-green-700 cursor-pointer" >Edit Post</a>
       <form method="POST" action="/posts/{{$post->id}}">
           @csrf
           <input type="hidden" name="_method" value="delete" >
           <input type="submit" value="delete" class="btn-block bg-red-800 text-white rounded-md my-2 px-3 py-1 text-uppercase hover:bg-red-700 cursor-pointer" >
       </form>
        </div>
       <br> <a href={{route('posts.index')}}>Back to posts</a>
    </div>
@endsection

@yield('footer')
