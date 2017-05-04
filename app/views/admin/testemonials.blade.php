@include('admin.layout.header')

    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            {{ Form::open(['url' => 'admin/kritike', 'role' => 'form', 'id' => 'admin-testemonials', 'class' => 'form-element']) }}

            <div class="form-group">
                {{ Form::label('testemonial_author', 'Autor kritike:') }}
                {{ Form::text('testemonial_author', null, ['class' => 'form-input-control', 'placeholder' => 'Autor kritike (max. 100 znakova)']) }}
            </div>
            <div class="form-group">
                {{ Form::label('testemonial_text', 'Tekst kritike:') }}
                {{ Form::textarea('testemonial_text', null, ['class' => 'form-input-control', 'placeholder' => 'Tekst kritike']) }}
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-submit btn-submit-full">Dodaj kritiku <i class="fa fa-check"></i></button>
            </div>
            {{ Form::close() }}

            <div class="text-center space">
                <h3>Trenutne kritike:</h3>
                @if($testemonials_data->count() > 0)
                    <table class="table table-bordered table-responsive table-striped table-hover">
                        <tr>
                            <td style="width: 20%;"><i class="fa fa-user" aria-hidden="true"></i> Autor kritike</td>
                            <td><i class="fa fa-pencil" aria-hidden="true"></i> Tekst kritike</td>
                            <td><i class="fa fa-cog fa-spin" aria-hidden="true"></i> Opcije</td>
                        </tr>
                        @foreach($testemonials_data as $testemonial)
                        <tr>
                            <td>{{ $testemonial->testemonial_author }}</td>
                            <td>{{ $testemonial->testemonial_text }}</td>
                            <td>
                                <a href="{{ url('admin/kritike-brisanje/'.$testemonial->id) }}">
                                    <button class="btn btn-submit-delete">
                                        Obriši <i class="fa fa-trash"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        </table>
                @else
                    <p>Trenutno <strong>nema</strong> dodanih kritika.</p>
                @endif
            </div>
        </div>
    </div>

@include('admin.layout.footer')