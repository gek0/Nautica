@include('admin.layout.header')

<div class="row">
    <div class="col-lg-8 col-lg-offset-2">
        {{ Form::open(['url' => 'admin/korisnici', 'role' => 'form', 'id' => 'admin-users', 'class' => 'form-element']) }}

        <div class="form-group">
            {{ Form::label('username', 'Korisničko ime:') }}
            {{ Form::text('username', null, ['class' => 'form-input-control', 'placeholder' => 'Korisničko ime']) }}
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('password', 'Lozinka:') }}
                    {{ Form::password('password', null, ['class' => 'form-input-control', 'placeholder' => 'Lozinka', 'autocomplete' => 'off']) }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('password_again', 'Lozinka ponovo:') }}
                    {{ Form::password('password_again', null, ['class' => 'form-input-control', 'placeholder' => 'Lozinka ponovo', 'autocomplete' => 'off']) }}
                </div>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('email', 'E-mail adresa:') }}
            {{ Form::email('email', null, ['class' => 'form-input-control', 'placeholder' => 'E-mail adresa']) }}
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-submit btn-submit-full">Dodaj korisnika <i class="fa fa-check"></i></button>
        </div>
        {{ Form::close() }}

        <div class="text-center space">
            <h3>Trenutni korisnici:</h3>
            <table class="table table-bordered table-responsive table-striped table-hover">
                <tr>
                    <td style="width: 20%;"><i class="fa fa-user" aria-hidden="true"></i> Korisničko ime</td>
                    <td><i class="fa fa-email" aria-hidden="true"></i> E-mail</td>
                    <td><i class="fa fa-cog fa-spin" aria-hidden="true"></i> Opcije</td>
                </tr>
                @foreach($users_data as $user)
                    <tr>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ url('admin/korisnici-izmjena/'.$user->id) }}">
                                <button class="btn btn-submit-edit">
                                    Izmjeni <i class="fa fa-pencil"></i>
                                </button>
                            </a>
                            @if(Auth::user()->id !== $user->id)
                                <a href="{{ url('admin/korisnici-brisanje/'.$user->id) }}">
                                    <button class="btn btn-submit-delete">
                                        Obriši <i class="fa fa-trash"></i>
                                    </button>
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

@include('admin.layout.footer')