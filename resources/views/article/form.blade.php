@extends('layout.app')

@section('title')
    Article
@endsection

@section('content')
    <h1>Create new article</h1>
    <form method="POST">
    @csrf
    <div class="card">
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" placeholder="Enter title" value="@if (isset($data)){{old('title') ? old('title') : $data->title}}@else{{old('title')}}@endif">
            <br>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="subTitle" class="form-control" placeholder="Enter Keterangan" value="@if (isset($data)){{old('subTitle') ? old('subTitle') : $data->subTitle}}@else{{old('subTitle')}}@endif">
            <br>
            @error('subTitle')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </div>
    </form>    
@endsection