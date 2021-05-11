@extends('layouts.adminlayout')

@section('content')
    <div class="container-fluid">
        <div class="mx-auto tm-content-container">
            <main>
                <div class="row mb-2 pb-4">
                    <div class="col-12">
                        <!-- Video player 1422x800 -->
                        <video width="1024" height="500" controls autoplay>
                            <source src="{{ asset('all/video/wheat-field.mp4') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
                <div class="row mb-2 pb-2">
                    <div class="col-xl-8 col-lg-7">
                        <!-- Video description -->
                        <div class="tm-video-description-box">
                            <h2 class="mb-2 tm-video-title">Sarlavha: {{ $video->title }}</h2>
                            <h2 class="mb-2 tm-video-title">Kategoriya: {{ $video->category->name }}</h2>
                            <p class="mb-2">Kiritilgan vaqt: {!! $video->created_at !!}</p>
                            <p class="mb-2">Qisqacha matn: {!! $video->excerpt !!}</p>
                            <p class="mb-2">To'liq matn: {!! $video->content !!}</p>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection

