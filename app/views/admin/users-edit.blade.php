@include('admin.layout.header')

<div class="row">
    <div class="col-lg-8 col-lg-offset-2">
        {{ Form::open(['url' => 'admin/korisnici-izmjena', 'role' => 'form', 'id' => 'admin-users-edit', 'class' => 'form-element']) }}

        <div class="form-group">
            {{ Form::label('username', 'Korisničko ime:') }}
            {{ Form::text('username', $user->username, ['class' => 'form-input-control', 'placeholder' => 'Korisničko ime']) }}
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
            {{ Form::email('email', $user->email, ['class' => 'form-input-control', 'placeholder' => 'E-mail adresa']) }}
        </div>
        <div class="text-center">
            {{ Form::hidden('id', $user->id) }}
            <button type="submit" class="btn btn-submit btn-submit-full">Izmjeni korisnika <i class="fa fa-check"></i></button>
        </div>
        {{ Form::close() }}

        <div class="text-center">
            <a href="{{ URL::previous() }}">
                <button class="btn btn-submit">Vrati se na korisnike <i class="fa fa-users"></i></button>
            </a>
        </div>
    </div>
</div>

@include('admin.layout.footer')