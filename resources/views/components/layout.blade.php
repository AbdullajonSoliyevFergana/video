<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Catalog</title>
    <link rel="stylesheet" href="{{ asset('all/fontawesome/css/all.min.css') }}"> <!-- https://fontawesome.com/ -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <!-- https://fonts.google.com/ -->
    <link rel="stylesheet" href="{{ asset('all/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('all/css/templatemo-video-catalog.css') }}">
    <!--

    TemplateMo 552 Video Catalog

    https://templatemo.com/tm-552-video-catalog

    -->
</head>

<body>

    {{ $slot }}

<script src="{{ asset('all/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('all/js/bootstrap.min.js') }}"></script>
<script>
    function setVideoSize() {
        const vidWidth = 1920;
        const vidHeight = 1080;
        let windowWidth = window.innerWidth;
        let newVidWidth = windowWidth;
        let newVidHeight = windowWidth * vidHeight / vidWidth;
        let marginLeft = 0;
        let marginTop = 0;

        if (newVidHeight < 500) {
            newVidHeight = 500;
            newVidWidth = newVidHeight * vidWidth / vidHeight;
        }

        if(newVidWidth > windowWidth) {
            marginLeft = -((newVidWidth - windowWidth) / 2);
        }

        if(newVidHeight > 720) {
            marginTop = -((newVidHeight - $('#tm-video-container').height()) / 2);
        }

        const tmVideo = $('#tm-video');

        tmVideo.css('width', newVidWidth);
        tmVideo.css('height', newVidHeight);
        tmVideo.css('margin-left', marginLeft);
        tmVideo.css('margin-top', marginTop);
    }

    $(document).ready(function () {
        /************** Video background *********/

        setVideoSize();

        // Set video background size based on window size
        let timeout;
        window.onresize = function () {
            clearTimeout(timeout);
            timeout = setTimeout(setVideoSize, 100);
        };

        // Play/Pause button for video background
        const btn = $("#tm-video-control-button");

        btn.on("click", function (e) {
            const video = document.getElementById("tm-video");
            $(this).removeClass();

            if (video.paused) {
                video.play();
                $(this).addClass("fas fa-pause");
            } else {
                video.pause();
                $(this).addClass("fas fa-play");
            }
        });
    })
</script>
    <script>
        $(document).ready(function() {
            $('.tm-likes-box').click(function(e) {
                e.preventDefault();
                $(this).toggleClass('tm-liked');

                if($(this).hasClass('tm-liked')) {
                    $('#tm-likes-count').html('486 likes');
                } else {
                    $('#tm-likes-count').html('485 likes');
                }
            });
        });
    </script>

</body>

</html>
