@include('admin.layout.header')

    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            {{ Form::open(['url' => 'admin/o-nama', 'role' => 'form', 'id' => 'admin-about-us', 'files' => true, 'class' => 'form-element']) }}

            <ul class="nav nav-pills custom-pills">
                <li class="active"><a data-toggle="pill" href="#HR">Hrvatski <i class="fa fa-edit"></i></a></li>
                <li><a data-toggle="pill" href="#ENG">English <i class="fa fa-edit"></i></a></li>
            </ul>

            <div class="tab-content">
                <div id="HR" class="tab-pane fade in active">
                    <div class="form-group">
                        {{ Form::label('post_body', 'Tekst stranice (HR):') }}
                        {{ Form::textarea('post_body', $about_us_data['post_body'], ['class' => 'form-input-control', 'placeholder' => 'Tekst stranice (HR)', 'id' => 'codeEditor']) }}
                    </div>
                </div>
                <div id="ENG" class="tab-pane fade">
                    <div class="form-group">
                        {{ Form::label('post_body_eng', 'Tekst stranice (ENG):') }}
                        {{ Form::textarea('post_body_eng', $about_us_data['post_body_eng'], ['class' => 'form-input-control', 'placeholder' => 'Tekst stranice (ENG)', 'id' => 'codeEditor2']) }}
                    </div>
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('about_us_image', 'Dodaj sliku stranice:') }}
                {{ Form::file('about_us_image', ['class' => 'file', 'data-show-upload' => false, 'data-show-caption' => true, 'id' => 'about_us_image', 'accept' => 'image/*']) }}
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-submit btn-submit-full">Spremi izmjene <i class="fa fa-check"></i></button>
            </div>
            {{ Form::close() }}

            <div class="text-center space">
                <h3>Trenutna slika:</h3>
                @if($about_us_data['image_file_name'])
                    {{HTML::image('/about_us_image/'.$about_us_data['image_file_name'], 'Nautica_o_nama', ['title' => $about_us_data['image_file_name'], 'class' => 'img-thumbnail img-responsive'])}}

                    <a href="{{ route('admin-about-us-image-delete') }}" class="space">
                        <button class="btn btn-submit-delete">
                            Obriši <i class="fa fa-trash"></i>
                        </button>
                    </a>
                @else
                    <p>Trenutno <strong>nema</strong> dodane slike.</p>
                @endif
            </div>
        </div>
    </div>

    <script>
        jQuery(window).load(function() {
            /*
             *   BBCode editor returning blank text on refresh, FF bug
             */
            var editor = $("#codeEditor, #codeEditor2");
            var editorLength = editor.val().length;
            if(editorLength < 1){
                editor.sync();
            }
        });
    </script>

@include('admin.layout.footer')