@include('public.en.layout.header')

<section class="video" id="info">
    @if($video_gallery_data)
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1><a href="{{ $video_gallery_data['video_url'] }}&fs=1&autoplay=1&wmode=opaque" class="youtube-media"><i class="fa fa-youtube-play pulseAnim" aria-hidden="true"></i> What awaits you...</a></h1>
                </div>
            </div>
        </div>
    @endif
</section>

@include('public.en.about-us')

@include('public.en.info')

@include('public.en.image-gallery')

@include('public.en.contact')

<hr class="foot">
<!-- start map -->
<div class="map-container">
    <section id="map">
        <noscript>
            Turn on JavaScript in your web browser to show map.
        </noscript>
    </section> <!-- end map section -->
</div>
<hr class="foot">

@include('public.en.layout.footer')