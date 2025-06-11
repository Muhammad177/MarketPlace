@extends('user.index.navbar')
@section('container')
  <h1>Category single : {{ $category }}</h1>
  @foreach ($posts as $post)
    <h1>dibuat oleh : {{ $post->author->name }}</h1> <!-- Ambil nama dari $post, bukan $name -->
    <h2><a href="/post/{{ $post->slug }}"> {{ $post->title }}</a></h2>
    <h2>{{ $post->body }}</h2>
  @endforeach
@endsection
