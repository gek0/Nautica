<section class="contact" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- start contact details -->
                    <div class="row text-center">
                        <div class="col-md-4 contact-container-info">
                            <strong><i class="fa fa-map-marker fa-med"></i> Adresa/Lokacija:</strong><br>
                            <p class="contact-detail"> {{ getenv('OWNER_CONTACT_ADDRESS') }}</p><br>
                        </div>
                        <div class="col-md-4 contact-container-info">
                            <strong><i class="fa fa-phone fa-med"></i> Telefon/Mobitel:</strong><br>
                            <p class="contact-detail"> {{ getenv('OWNER_CONTACT_PHONE') }}</p>
                        </div>
                        <div class="col-md-4 contact-container-info">
                            <strong><i class="fa fa-envelope fa-med"></i> E-mail adresa:</strong><br>
                            <p class="contact-detail"> {{ HTML::mailto(getenv('OWNER_CONTACT_EMAIL')) }}</p><br>
                        </div>
                    </div>
                    <div class="space"></div>

                    <!-- start contact extended info -->
                    <div class="row">
                        <h1>Kontaktirajte nas</h1>
                        <p class="contact-detail">Za sve upite, nejasnoće i slično, kontaktirajte nas preko kontakt forme (<strong>sva polja su obavezna</strong>).</p>
                        <p class="contact-detail">Ili preko gore navedenih informacija.</p>
                    </div>

                    <hr class="foot">

                    <!-- start contact form -->
                    {{ Form::open(['url' => 'kontakt', 'role' => 'form', 'id' => 'contact-form', 'class' => 'form-element']) }}
                    <div class="row form">
                        <div class="col-md-12">
                            <div class="text-center" id="contact-output">
                                <div class="alert" role="alert" id="contact-output-inner">
                                    <div id="contact-output-message"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ Form::label('full_name', 'Ime i prezime:') }}
                                {{ Form::text('full_name', null, ['placeholder' => 'Vaše ime i prezime...', 'id' => 'full_name', 'required']) }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ Form::label('email', 'E-mail adresa:') }}
                                {{ Form::email('email', null, ['placeholder' => 'Vaša e-mail adresa...', 'id' => 'email', 'required']) }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ Form::label('subject', 'Naslov poruke:') }}
                                {{ Form::text('subject', null, ['placeholder' => 'Naslov poruke...', 'id' => 'subject', 'required']) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('message_body', 'Poruka:') }}
                        {{ Form::textarea('message_body', null, ['placeholder' => 'Ovdje napišite svoju poruku...', 'id' => 'message_body', 'required']) }}
                    </div>
                    <div class="form-group text-center captcha">
                        {{ Form::captcha() }}
                    </div>
                    <div class="text-center">
                        <button type="submit" class="learn-btn-inverse animated fadeInUp" id="contactSubmit">Pošaljite upit <i class="fa fa-paper-plane"></i></button>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</section>