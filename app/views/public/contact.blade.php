@include('public.layout.header')

    <section class="logo-placeholder">
        <h1>{{ $page_title }}</h1>
    </section>

    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <!-- start contact details -->
            <div class="row text-center">
                <div class="col-md-4 color-filled">
                    <strong><i class="fa fa-map-marker fa-med"></i> Adresa/address:</strong><br>
                    <p class="contact-detail"> {{ getenv('OWNER_CONTACT_ADDRESS') }}</p><br>
                </div>
                <div class="col-md-4 color-filled">
                    <strong><i class="fa fa-phone fa-med"></i> Telefon/Telephone:</strong><br>
                    <p class="contact-detail"> {{ getenv('OWNER_CONTACT_PHONE') }}</p>
                </div>
                <div class="col-md-4 color-filled">
                    <strong><i class="fa fa-envelope fa-med"></i> E-mail adress:</strong><br>
                    <p class="contact-detail"> {{ HTML::mailto(getenv('OWNER_CONTACT_EMAIL')) }}</p><br>
                </div>
            </div>
            <div class="space"></div>

            <!-- start contact extended info -->
            <div class="row">
                <blockquote>
                    <h3>Kontaktirajte nas / Contact us</h3>
                    <p class="contact-detail">Za sve upite, nejasnoće i slično, kontaktirajte nas preko kontakt forme (<strong>sva polja su obavezna</strong>) ili preko gore navedenih informacija.</p>
                    <hr>
                    <p class="contact-detail">For all questions and extra information, contats us using contact form (<strong>all fields are mandatory</strong>) or using iformation above.</p>
                </blockquote>
            </div>

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
                        {{ Form::label('full_name', 'Ime i prezime (Full name):') }}
                        {{ Form::text('full_name', null, ['placeholder' => 'Ime i prezime (Full name)', 'id' => 'full_name', 'required']) }}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {{ Form::label('email', 'E-mail:') }}
                        {{ Form::email('email', null, ['placeholder' => 'E-mail', 'id' => 'email', 'required']) }}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {{ Form::label('subject', 'Naslov poruke (Subject):') }}
                        {{ Form::text('subject', null, ['placeholder' => 'Naslov poruke (Subject)', 'id' => 'subject', 'required']) }}
                    </div>
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('message_body', 'Poruka (Message):') }}
                {{ Form::textarea('message_body', null, ['placeholder' => 'Poruka (Message)', 'id' => 'message_body', 'required']) }}
            </div>
            <div class="form-group text-center captcha">
                {{ Form::captcha() }}
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-submit btn-padded" id="contactSubmit">Pošalji upit / Send inquiry <i class="fa fa-paper-plane"></i></button>
            </div>
            {{ Form::close() }}

            <!-- start map -->
            <section id="map">
                <noscript>
                    Morate imati omogućen JavaScript u Vašem internet pregledniku kako bi se prikazala mapa, hvala na razumijevanju.
                    Turn on JavaScript in your browser to show map.
                </noscript>
            </section> <!-- end map section -->
        </div>
    </div>

@include('public.layout.footer')