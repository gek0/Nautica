/**
 * main JS file
 */

jQuery(document).ready(function(){
    /**
     *   google maps
     */
     var map;
     // main directions
     map = new GMaps({
        el: '#map', lat: 43.1723624, lng: 16.4408177, zoom: 15, linksControl: true, zoomControl: true,
        panControl: true, scrollwheel: false, streetViewControl: true
     });

    /**
     * navigation hover animations
     */
    $(".overlay-boxify > nav > ul > li").hover(function () {
        $(this).toggleClass("pulseAnim");
    });

     // add address markers
     var image = 'css/assets/images/map-marker.png';
     map.addMarker({lat: 43.172686, lng: 16.4408177, title: 'Nautica Adventure', icon: image});
     //apply custom styles
     var styles = [{"featureType":"administrative.country","elementType":"geometry.fill","stylers":[{"visibility":"on"}]},{"featureType":"landscape","elementType":"all","stylers":[{"visibility":"on"}]}];
     map.setOptions({styles: styles});

    /**
     *  email ajax script for main contact form
     */
    $("#contact-form").submit(function (event) {
        event.preventDefault();

        //disable button for another submits
        $('#contactSubmit').addClass('disabled');

        //get input fields values
        var values = {};
        $.each($(this).serializeArray(), function (i, field) {
            values[field.name] = field.value;
        });
        var token = $('#contact-form > input[name="_token"]').val();

        //user output
        var outputMsg = $('#contact-output-message');
        var errorMsg = "";
        var successMsg = "<h4>E-mail s Vašim upitom je uspješno poslan / E-mail sent successfully</h4>";

        $.ajax({
            type: 'post',
            url: $(this).attr('action'),
            dataType: 'json',
            headers: {'X-CSRF-Token': token},
            data: {_token: token, formData: values},
            success: function (data) {
                //check status of validation and query
                if (data.status === 'success') {
                    outputMsg.append(successMsg);
                    $('#contact-output-inner').addClass('alert-success').fadeIn();
                    $('#contact-output').fadeIn();
                    $("#contact-form").trigger('reset');
                }
                else {
                    $.each(data.errors, function(index, value) {
                        $.each(value, function(i){
                            errorMsg += "<h4>" + value[i] + "</h4>";
                        });
                    });

                    outputMsg.append(errorMsg);
                    $('#contact-output-inner').addClass('alert-danger').fadeIn();
                    $('#contact-output').fadeIn();
                }
            }
        });

        //restore default class, clear output and hide it
        setTimeout(function(){
            $('#contactSubmit').removeClass('disabled');
            $('#contact-output-inner').attr('class', 'alert').fadeOut();
            grecaptcha.reset();
            outputMsg.empty();
        }, 5000);

    });

});

/***************** Nav Transformicon ******************/

/* When user clicks the Icon */
$(".nav-toggle").click(function() {
    $(this).toggleClass("active");
    $(".overlay-boxify").toggleClass("open");
});

/* When user clicks a link */
$(".overlay ul li a").click(function() {
    $(".nav-toggle").toggleClass("active");
    $(".overlay-boxify").toggleClass("open");
});

/* When user clicks outside */
$(".overlay").click(function() {
    $(".nav-toggle").toggleClass("active");
    $(".overlay-boxify").toggleClass("open");
});

/***************** Smooth Scrolling ******************/

$('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {

        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        if (target.length) {
            $('html,body').animate({
                scrollTop: target.offset().top
            }, 2000);
            return false;
        }
    }
});

$(document).ready(function(){
    /**
     * animations
     */
    /***************** Waypoints ******************/

    $('.wp1').waypoint(function() {
        $('.wp1').addClass('animated fadeInLeft');
    }, {
        offset: '75%'
    });

    $('.wp2').waypoint(function() {
        $('.wp2').addClass('animated fadeInDown');
    }, {
        offset: '75%'
    });
    $('.wp3').waypoint(function() {
        $('.wp3').addClass('animated bounceInDown');
    }, {
        offset: '75%'
    });
    $('.wp4').waypoint(function() {
        $('.wp4').addClass('animated fadeInDown');
    }, {
        offset: '75%'
    });
    $('.wpfine').waypoint(function() {
        $('.wpfine').addClass('animated fadeInDown');
    }, {
        offset: '75%'
    });

    /***************** Flickity ******************/

    $('#about-usSlider').flickity({
        cellAlign: 'left',
        contain: true,
        prevNextButtons: false,
        imagesLoaded: true
    });

    /***************** Fancybox ******************/

    $(".youtube-media").on("click", function(e) {
        var jWindow = $(window).width();
        if (jWindow <= 768) {
            return;
        }
        $.fancybox({
            href: this.href,
            padding: 4,
            type: "iframe",
            'href': this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
        });
        return false;
    });

    $("a.single_image").fancybox({
        padding: 4,
    });

    /**
     *   add lazy loading to images out of screen viewport
     */
    $(function() {
        $("img.lazy").lazyload({
            effect : "fadeIn"
        });
    });
});

/**
 *   catch laravel form/route notifications
 */
function catchLaravelNotification(errorHtmlSourceID, notificationType) {
    var outputMsg = $('#outputMsg');
    var errorMsg = $('#'+errorHtmlSourceID).html();
    outputMsg.append(errorMsg).addClass(notificationType).slideDown();

    //timer
    var numSeconds = 5;
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
            setTimeout(function () {
                outputMsg.empty().attr('class', 'notificationOutput');
            }, 2000);
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