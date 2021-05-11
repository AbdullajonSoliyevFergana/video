@extends('layouts.adminlayout')

@section('content')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Kategoriyalar</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <a href="{{ route('category.create') }}"><button class="btn btn-success" style="margin: 20px; float:right; width:200px;">Yangi qo'shish</button></a>
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nomi</th>
                                <th>Yaratildi</th>
                                <th>O'zgartirish</th>
                                <th>O'chirish</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
{{--                                    <td><img src="{{ $post->img ?? asset('img/default.jpg') }}" style="width: 50px;"></td>--}}
                                    <td>{{$category->created_at}}</td>
                                    <td><a href="{{ route('category.edit', $category->id) }}"><button class="btn btn-primary">O'zgartirish</button></a></td>

                                    <td>
                                    <form action="{{ route('category.destroy', $category->id) }}" method="post"
                                    onsubmit="if (confirm('Ushbu kategoriyani o\'chirqochimisiz ?')){ return true } else { return false }">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger" value="O'chirish">
                                    </form>
                                    </td>



                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
@endsection
