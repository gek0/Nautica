@include('public.layout.header')

    <section class="logo-placeholder">
        <h1>{{ $page_title }}</h1>
    </section>

    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">

            @if($about_us_data['image_file_name'])
                <div class="text-center space">
                    {{HTML::image('/about_us_image/'.$about_us_data['image_file_name'], 'Nautica_o_nama', ['title' => $about_us_data['image_file_name'], 'class' => 'img-thumbnail img-responsive'])}}
                </div>
            @endif

            <blockquote>
                {{ removeEmptyP(nl2p((new BBCParser)->parse($about_us_data['post_body']))) }}
            </blockquote>
        </div>
    </div>

@include('public.layout.footer')