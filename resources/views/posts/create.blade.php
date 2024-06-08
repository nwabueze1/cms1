@extends('layouts.app')

@section('content')

    {{html()->form('POST')->route('posts.store')->acceptsFiles()->class('grid gap-2')->open()}}
    {{html()->text('title')->placeholder('Enter title')->class("outline-0 border-gray-500 border-[1px] p-2 rounded-md")}}
    @error('title')
    <span class="alert text-red-700" >{{$message}}</span>
    @enderror
    {{html()->textarea('body')->placeholder('Enter post content')->class("outline-0 border-gray-500 border-[1px] p-2 rounded-md")}}
    @error('body')
    <span class="alert text-red-700" >{{$message}}</span>
    @enderror
    {{html()->input('file', 'file')}}
    @error('file')
    <span class="alert text-red-700" >{{$message}}</span>
    @enderror
    {{html()->submit('create post')->class("inline-block bg-gray-800 text-white rounded-md py-2 hover:bg-gray-600")}}
    {{html()->form()->close()}}
@endsection


@yield('footer')
