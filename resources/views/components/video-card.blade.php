
@props(['video'])

    <div class="col-lg-4 col-md-6 col-sm-12 tm-catalog-item">
        <div class="position-relative tm-thumbnail-container">
    {{--        <img src="{{ asset('all/img/tn-01.jpg') }}" alt="Image" class="img-fluid tm-catalog-item-img">--}}
{{-- TODO --}}
            <video autoplay muted loop id="tm-video">
                <!-- <source src="video/sunset-timelapse-video.mp4" type="video/mp4"> -->
                <source src="{{ asset('all/video/wheat-field.mp4') }}" type="video/mp4">
            </video>
            <a href="/videos/{{ $video->slug }}" class="position-absolute tm-img-overlay">
                <i class="fas fa-play tm-overlay-icon"></i>
            </a>
        </div>

        <div class="p-4 tm-bg-gray tm-catalog-item-description">
            <h3 class="tm-text-primary mb-3 tm-catalog-item-title">{{ $video->title }}</h3>
            {{--                                <h3 class="tm-text-primary mb-3 tm-catalog-item-title">{{ $video->category }}</h3>--}}
            <p class="tm-catalog-item-text">{{ $video->excerpt }}</p>
        </div>
    </div>

{{--<p>Puplished <time> {{ $video->created_at->diffForHumans() }} </time></p>--}}


{{--    <div class="position-relative tm-thumbnail-container">--}}
{{--        <img src="{{ asset('all/img/tn-01.jpg') }}" alt="Image" class="img-fluid tm-catalog-item-img">--}}

{{--<a href="/videos/{{ $video->slug }}" class="position-absolute tm-img-overlay">--}}
{{--    <i cla  ss="fas fa-play tm-overlay-icon"></i>--}}
{{--</a>--}}
{{--    </div>--}}
