@extends('layouts.adminlayout')

@section('content')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Videlar</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <a href="{{ route('admin.create') }}"><button class="btn btn-success" style="margin: 20px; float:right; width:200px;">Yangi qo'shish</button></a>
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Video</th>
                                <th>Sarlavha</th>
                                <th><Kategorya></Kategorya></th>
                                <th>Qisqacha</th>
                                <th>To'liq</th>
                                <th>Kiritildi</th>
                                <th>Ko'rish</th>
                                <th>O'zgartirish</th>
                                <th>O'chirish</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($videos as $video)
                                <tr>
                                    <td>{{$video->id}}</td>
                                    <td>{{$video->video}}</td>
{{--                                    <td><img src="{{ $post->img ?? asset('img/default.jpg') }}" style="width: 50px;"></td>--}}
                                    <td>{{$video->title}}</td>
                                    <td>{{$video->category->name}}</td>
                                    <td>{{$video->excerpt}}</td>
                                    <td>{{$video->content}}</td>
                                    <td>{{$video->created_at}}</td>
                                    <td><a href="{{ route('admin.show', $video->id) }}"><button class="btn btn-info">Ko'rish</button></a></td>
                                    <td><a href="{{ route('admin.edit', $video->id) }}"><button class="btn btn-primary">O'zgartirish</button></a></td>

                                    <td>
                                    <form action="{{ route('admin.destroy', $video->id) }}" method="post"
                                    onsubmit="if (confirm('Ushbu videoni o\'chirqochimisiz ?')){ return true } else { return false }">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger" value="O'chirish">
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">

{{--                                {{ $videos->links() }}--}}
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
@endsection
