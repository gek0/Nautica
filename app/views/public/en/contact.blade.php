<section class="contact" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- start contact details -->
                    <div class="row text-center">
                        <div class="col-md-4 contact-container-info">
                            <strong><i class="fa fa-map-marker fa-med"></i> Address/Location:</strong><br>
                            <p class="contact-detail"> {{ getenv('OWNER_CONTACT_ADDRESS') }}</p><br>
                        </div>
                        <div class="col-md-4 contact-container-info">
                            <strong><i class="fa fa-phone fa-med"></i> Phone/Mobile:</strong><br>
                            <p class="contact-detail"> {{ getenv('OWNER_CONTACT_PHONE') }}</p>
                        </div>
                        <div class="col-md-4 contact-container-info">
                            <strong><i class="fa fa-envelope fa-med"></i> E-mail address:</strong><br>
                            <p class="contact-detail"> {{ HTML::mailto(getenv('OWNER_CONTACT_EMAIL')) }}</p><br>
                        </div>
                    </div>
                    <div class="space"></div>

                    <!-- start contact extended info -->
                    <div class="row">
                        <h1>Contact us</h1>
                        <p class="contact-detail">For all inquiries, ambiguities and such, contact us via contact form (<strong>all fields are mandatory</strong>).</p>
                        <p class="contact-detail">Or through the information mentioned above.</p>
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
                                {{ Form::label('full_name', 'Full name:') }}
                                {{ Form::text('full_name', null, ['placeholder' => 'Your full name...', 'id' => 'full_name', 'required']) }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ Form::label('email', 'E-mail address:') }}
                                {{ Form::email('email', null, ['placeholder' => 'Your e-mail address...', 'id' => 'email', 'required']) }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ Form::label('subject', 'Subject:') }}
                                {{ Form::text('subject', null, ['placeholder' => 'Subject...', 'id' => 'subject', 'required']) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('message_body', 'Message:') }}
                        {{ Form::textarea('message_body', null, ['placeholder' => 'Write your message here...', 'id' => 'message_body', 'required']) }}
                    </div>
                    <div class="form-group text-center captcha">
                        {{ Form::captcha() }}
                    </div>
                    <div class="text-center">
                        <button type="submit" class="learn-btn-inverse animated fadeInUp" id="contactSubmit">Send inquiry <i class="fa fa-paper-plane"></i></button>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</section>