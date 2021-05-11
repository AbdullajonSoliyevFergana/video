
@props(['video'])

<div class="tm-welcome-container text-center text-white">
    <div class="tm-welcome-container-inner">
{{--  TODO  --}}
        <p class="tm-welcome-text mb-1 text-white">
            {{ $video->title }}
        </p>
        <p class="tm-welcome-text mb-5 text-white">
            {{ $video->excerpt }}
        </p>
        <a href="#content" class="btn tm-btn-animate tm-btn-cta tm-icon-down">
            <span>Discover</span>
        </a>
    </div>
</div>

<div id="tm-video-container">
    <video autoplay muted loop id="tm-video">
        <!-- <source src="video/sunset-timelapse-video.mp4" type="video/mp4"> -->
        <source src="{{ asset('videos/wheat-field.mp4') }}" type="video/mp4">
    </video>
</div>
