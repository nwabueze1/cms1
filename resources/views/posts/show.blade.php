@extends("layouts.app")

@section('content')
    <h2>{{$post->title}}</h2>
    <p>{{$post->body}}</p>
    <div>
        <a href="{{route('posts.edit', $post->id)}}" >Edit Post</a>
       <form method="POST" action="/posts/{{$post->id}}">
           @csrf
           <input type="hidden" name="_method" value="delete" >
           <input type="submit" value="delete" >
       </form>
       <br> <a href={{route('posts.index')}}>Back to posts</a>
    </div>
@endsection

@yield('footer')
