<section class="gallery-intro">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Samo djelić što možete očekivati...</h1>
                <p>Ponesite kući nezaboravne uspomene s Nautica Adventure.</p>
                <p><a href="#gallery" class="arrow-btn">Pregledajte galeriju <i class="fa fa-long-arrow-right"></i></a></p>
            </div>
        </div>
    </div>
    <section class="gallery" id="gallery">
        <div class="container-fluid">
            <div class="row">
                @if($image_gallery_data->count() > 0)
                    <ul class="grid">
                        @foreach($image_gallery_data as $img)
                            <li>
                                <figure>
                                    {{HTML::image('/image_gallery_uploads/'.$img->file_name, imageAlt($img->file_name), ['title' => imageAlt($img->file_name), 'class' => 'img-responsive img-thumbnail lazy'])}}
                                    <figcaption>
                                        <div class="caption-content">
                                            <a href="{{ url('/image_gallery_uploads/'.$img->file_name) }}" class="single_image lazy">
                                                <i class="fa fa-search"></i>
                                            </a>
                                        </div>
                                    </figcaption>
                                </figure>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <h2 class="text-center"><strong>Trenutno nema slika, pobrinut ćemo se da nas vidite uskoro!</strong></h2>
                @endif
            </div>
        </div>
    </section>
</section>