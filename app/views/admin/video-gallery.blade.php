@include('admin.layout.header')

    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="admin-video-help marginated-center">
                {{ HTML::image('css/assets/images/link_to_embedd.png', 'Link za embedd videa', ['class' => 'img-responsive']) }}
            </div>
            <button class="btn btn-submit btn-padded" id="toggle-admin-video-help">Upute za video URL <i class="fa fa-help"></i></button></a>


            {{ Form::open(['url' => 'admin/video-galerija', 'role' => 'form', 'id' => 'admin-video-gallery', 'class' => 'form-element']) }}
            <div class="form-group">
                {{ Form::label('video_url', 'Video URL:') }}
                {{ Form::text('video_url', '', ['class' => 'form-input-control', 'placeholder' => 'Video URL (YouTube, Vimeo, ...)', 'id' => 'video_url']) }}
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-submit btn-submit-full">Spremi izmjene <i class="fa fa-check"></i></button>
            </div>
            {{ Form::close() }}

            @if($video_gallery_data)
                <hr>
                <section id="video_gallery">
                    <div class="container-fluid">
                        <div class="row padded text-center">
                            <h2>Video za prezentaciju:</h2>
                                <div class="embed-responsive embed-responsive-16by9">
                                <iframe width="650" height="400" src="{{ $video_gallery_data['video_url'] }}&fs=1&wmode=opaque" frameborder="0" allowfullscreen></iframe>
                            </div>

                            <hr>
                            <a href="{{ route('admin-video-gallery-delete') }}" class="space">
                                <button class="btn btn-submit-delete">
                                    Obriši <i class="fa fa-trash"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                </section>
            @else
                <section id="video_gallery">
                    <div class="container-fluid">
                        <div class="row padded text-center">
                            <p>Trenutno <strong>nije</strong> postavljen video za prezentaciju.</p>
                        </div>
                     </div>
                </section>
            @endif
        </div>
    </div>

@include('admin.layout.footer')