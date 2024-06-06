@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>

    {{html()->form('PUT')->route('posts.update', $post->id)->open()}}
    {{html()->text('title', $post->title)}}
    {{html()->textarea('body', $post->body)}}
    {{html()->submit('update')}}
    {{html()->form()->close()}}
@endsection


@yield('footer')
