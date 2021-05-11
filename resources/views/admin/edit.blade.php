@extends('layouts.adminlayout')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Videoni o'zgartirish</h3>
        </div>

        <form action="{{ route('admin.update', $video->id) }}" method="POST" enctype="multipart/form-data">
            {{--            {{ csrf_field() }}--}}
            @csrf
            @method('PATCH')
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Sarlavha</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{ $video->title }}" placeholder="Sarlavha...">
                </div>
                <div class="form-group">
                    <label for="excerpt">Qisqacha matn</label>
                    <input type="text" name="excerpt" class="form-control" id="excerpt" value="{{ $video->excerpt }}" placeholder="Qisqacha...">
                </div>
                <div class="form-group">
                    <label for="slug">Routeda ko'rinadigan so'z "slug"</label>
                    <input type="text" name="slug" class="form-control" id="slug" value="{{ $video->slug }}" placeholder="first-video">
                </div>
                <div class="form-group">
                    <label for="content">To'liq matn</label>
                    <input type="text" name="content" class="form-control" id="content" value="{{ $video->content }}" placeholder="Matn...">
                </div>
                <div class="form-group">
                    <label for="category">Kategoriya</label>
                    <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="video">Video yuklash</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="video" class="form-control" id="video">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">O'zgartirish</button>
            </div>
        </form>
    </div>

@endsection
