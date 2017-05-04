@include('public.layout.header')

<section class="video" id="info">
    @if($video_gallery_data)
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1><a href="{{ $video_gallery_data['video_url'] }}&fs=1&autoplay=1&wmode=opaque" class="youtube-media"><i class="fa fa-youtube-play pulseAnim" aria-hidden="true"></i> Što Vas očekuje...</a></h1>
                </div>
            </div>
        </div>
    @endif
</section>

@include('public.about-us')

@include('public.info')

@include('public.image-gallery')

@include('public.contact')

<hr class="foot">
<!-- start map -->
<div class="map-container">
    <section id="map">
        <noscript>
            Morate imati omogućen JavaScript u Vašem internet pregledniku kako bi se prikazala mapa, hvala na razumijevanju.
        </noscript>
    </section> <!-- end map section -->
</div>
<hr class="foot">

@include('public.layout.footer')