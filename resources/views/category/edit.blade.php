@extends('layouts.adminlayout')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Kategoriyani o'zgartirish</h3>
        </div>

        <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            {{--            {{ csrf_field() }}--}}
            @csrf
            @method('PATCH')
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Nomi</label>
                    <input type="text" name="name" class="form-control" value="{{ $category->name }}" id="title" placeholder="Kategoriya nomi...">
                </div>
                <div class="form-group">
                    <label for="slug">Routeda ko'rinadigan so'z "slug"</label>
                    <input type="text" name="slug" class="form-control" value="{{ $category->slug }}" id="slug" placeholder="first-category">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">O'zgartirish</button>
            </div>
        </form>
    </div>
@endsection

