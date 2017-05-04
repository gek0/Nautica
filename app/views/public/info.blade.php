<section class="showcase" style="background: url('{{ url('/about_us_image/'.$about_us_data['image_file_name']) }}') no-repeat center center fixed; background-size: cover;">
    <div class="showcase-wrap">
        <div class="texture-overlay"></div>
        <div class="container">
            <div class="row wpfine">
                @if($about_us_data['text_position'] == 'left')
                    <div class="col-md-7">
                        <h1>Ukratko o nama</h1>
                        <blockquote class="fine-read">
                            {{ removeEmptyP(nl2p((new BBCParser)->parse($about_us_data['post_body']))) }}
                        </blockquote>
                    </div>
                    <div class="col-md-5"></div>
                @else
                    <div class="col-md-5"></div>
                    <div class="col-md-7">
                        <h1>Ukratko o nama</h1>
                        <blockquote class="fine-read">
                            {{ removeEmptyP(nl2p((new BBCParser)->parse($about_us_data['post_body']))) }}
                        </blockquote>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>