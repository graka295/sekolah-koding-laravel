@extends('layout.app')

@section('title')
Hello, {{ $name }} - Article
@endsection

@section('content')
<h1>Hello, {{ $name }}</h1>
<h1>Welcome to article</h1>
<div class="text-right mb-1">
    <a href="/article/create" class="btn btn-primary">Create article</a>
</div>
@foreach ($data->chunk(3) as $indexChunk)
<div class="row">
    @foreach ($indexChunk as $index)
    <div class="card mb-1 pl-2 pt-2 col mr-1 ml-1">
        <p> <b>Judul</b> : {{ucFirst($index->title)}} </p>
        <p> <b>Keterngan</b> : {{$index->subTitle}} </p>
        <p>
            <a href="/article/update/{{$index->id}}" class="btn btn-warning text-white">
                Edit
            </a>
            <a href="/article/delete/{{$index->id}}" class="btn btn-danger text-white">
                Delete
            </a>
        </p>
    </div>
    @endforeach
</div>
@endforeach
{{$data->links()}}
@endsection