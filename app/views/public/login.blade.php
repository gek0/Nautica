@include('public.layout.header')


    <section class="logo-placeholder">
        <h1>{{ $page_title }}</h1>
    </section>

    <div class="login-container">
        <div class="row form">
            {{ Form::open(['route' => 'loginPost', 'role' => 'form', 'id' => 'adminLogin', 'class' => 'form-element']) }}
                <div class="form-group">
                    {{ Form::text('username', null, ['placeholder' => 'Korisničko ime', 'id' => 'username', 'required']) }}
                </div>
                <div class="form-group">
                    {{ Form::password('password', ['placeholder' => 'Lozinka', 'id' => 'password', 'required']) }}
                </div>
                <div class="form-group-login text-center">
                    <div class="checkbox checkbox-primary">
                        {{ Form::checkbox('rememberMe', 1, true, ['id' => 'rememberMe']) }}
                        {{ Form::label('rememberMe', 'Zapamti me?', ['class' => 'checkbox-inline', 'id' => 'check-adjust', 'checked']) }}
                    </div>
                </div>

                <button type="submit" class="submit-form" id="loginSubmit">Prijava <i class="fa fa-sign-in"></i></button>
            {{ Form::close() }}
        </div>
    </div>

    <script>
        jQuery(document).ready(function() {
            $("#adminLogin").submit(function (event) {
                event.preventDefault();

                //disable button click and show loader
                $('button#loginSubmit').addClass('disabled');
                $('#adminLoginLoad').css('visibility', 'visible').fadeIn();

                //get input fields values
                var values = {};
                $.each($(this).serializeArray(), function (i, field) {
                    values[field.name] = field.value;
                });
                var token = $('#adminLogin > input[name="_token"]').val();

                //user output
                var outputMsg = $('#outputMsg');
                var errorMsg = "";

                $.ajax({
                    type: 'post',
                    url: $(this).attr('action'),
                    dataType: 'json',
                    headers: {'X-CSRF-Token': token},
                    data: {_token: token, formData: values},
                    success: function (data) {
                        //check status of validation and query
                        if (data.status === 'success') {
                            //enable button click and hide loader
                            $('button#loginSubmit').removeClass('disabled');
                            $('#adminLoginLoad').css('visibility', 'hidden').fadeOut();

                            //redirect to intended page
                            window.location = "<?php echo $intended_url; ?>";
                        }
                        else {
                            errorMsg = '<h3>' + data.errors + '</h3>';
                            outputMsg.append(errorMsg).addClass('warningNotif').slideDown();

                            //timer
                            var numSeconds = 3;
                            function countDown(){
                                numSeconds--;
                                if(numSeconds == 0){
                                    clearInterval(timer);
                                }
                                $('#notificationTimer').html(numSeconds);
                            }
                            var timer = setInterval(countDown, 1000);

                            function restoreNotification(){
                                outputMsg.fadeOut(1000, function(){
                                    //enable button click and hide loader
                                    $('button#loginSubmit').removeClass('disabled');
                                    $('#adminLoginLoad').css('visibility', 'hidden').fadeOut();

                                    setTimeout(function () {
                                        outputMsg.empty().attr('class', 'notificationOutput');
                                    }, 1000);
                                });
                            }

                            //hide notification if user clicked
                            $('#notifTool').click(function(){
                                restoreNotification();
                            });

                            setTimeout(function () {
                                restoreNotification();
                            }, numSeconds * 1000);
                        }
                    }
                });

                return false;
            });
        });
    </script>

@include('public.layout.footer')