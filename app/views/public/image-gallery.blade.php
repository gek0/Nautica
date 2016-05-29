@include('public.layout.header')

    <section class="logo-placeholder">
        <h1>{{ $page_title }}</h1>
    </section>

    <div class="row text-center">
        <div class="col-lg-8 col-lg-offset-2">
            @if($image_gallery_data->count() > 0)
                <div id="grid-gallery" class="grid-gallery">
                    <section class="grid-wrap">
                        <ul class="grid">
                            <li class="grid-sizer"></li><!-- for Masonry column width -->
                            @foreach($image_gallery_data as $img)
                                <li>
                                    {{HTML::image('/image_gallery_uploads/'.$img->file_name, imageAlt($img->file_name), ['title' => imageAlt($img->file_name), 'class' => 'img-responsive img-thumbnail lazy'])}}
                                </li>
                            @endforeach
                        </ul>
                    </section><!-- // grid-wrap -->
                    <section class="slideshow">
                        <ul>
                            @foreach($image_gallery_data as $img)
                                <li>
                                    {{HTML::image('/image_gallery_uploads/'.$img->file_name, imageAlt($img->file_name), ['title' => imageAlt($img->file_name), 'class' => 'img-responsive img-thumbnail'])}}
                                </li>
                            @endforeach
                        </ul>
                        <nav>
                            <span class="icon nav-prev fa fa-chevron-le" title="Previous / Prethodna"></span>
                            <span class="icon nav-next" title="Next / Sljedeća"></span>
                            <span class="icon nav-close" title="Close / Zatvori"></span>
                        </nav>
                    </section><!-- // slideshow -->
                </div><!-- // grid-gallery -->
            @else
                <h2><strong>Trenutno nema slika :(</strong></h2>
                <h3>Svratite kasnije...</h3>
            @endif
        </div>
    </div>
@include('public.layout.footer')