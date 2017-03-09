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

            <ul class="nav nav-pills custom-pills center-pills">
                <li class="active"><a data-toggle="pill" href="#HR">Hrvatski</a></li>
                <li><a data-toggle="pill" href="#ENG">English</a></li>
            </ul>

            <div class="tab-content space">
                <div id="HR" class="tab-pane fade in active">
                    <blockquote>
                        {{ removeEmptyP(nl2p((new BBCParser)->parse($about_us_data['post_body']))) }}
                    </blockquote>
                </div>
                <div id="ENG" class="tab-pane fade">
                    <blockquote>
                        {{ removeEmptyP(nl2p((new BBCParser)->parse($about_us_data['post_body_eng']))) }}
                    </blockquote>
                </div>
            </div>
        </div>
    </div>

    <hr>
    <div class="text-center">
        <a href="{{ url('/') }}" title="Homepage">
            <button class="btn btn-submit btn-padded"><i class="fa fa-home" aria-hidden="true"></i>  Nautica Adventure </button>
        </a>
    </div>

@include('public.layout.footer')