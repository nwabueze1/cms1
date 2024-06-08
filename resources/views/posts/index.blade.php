@extends('layouts.app')

@section('content')
        <ul>
            @foreach($posts as $post)
                <li>
                    <a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a>
                </li>
            @endforeach
        </ul>
        {{html()->a('/posts/create', 'create new post')->class("btn px-5 py-2 rounded-md bg-gray-800 text-white inline-block hover:bg-gray-600")}}
@endsection

@yield('footer')


