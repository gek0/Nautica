/**
 * main JS file
 */

jQuery(document).ready(function(){
    // page loader public pages
    $("#fakeloader").fakeLoader({
        timeToHide: 500,
        zIndex: 999,
        spinner: "spinner5", // spinner1-7
        bgColor: "#2086f4"
    });

    /**
     *   google maps
     */
    if($("#map").length > 0) {
        var map;
        // main directions
        map = new GMaps({
            el: '#map', lat: 43.1723624, lng: 16.4408177, zoom: 15, linksControl: true, zoomControl: true,
            panControl: true, scrollwheel: false, streetViewControl: true
        });

        // add address markers
        var image = 'css/assets/images/map-marker.png';
        map.addMarker({lat: 43.172686, lng: 16.4408177, title: 'Nautica Adventure', icon: image});
        //apply custom styles
        var styles = [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#46bcec"},{"visibility":"on"}]}];
        map.setOptions({styles: styles});
    }

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

$(document).ready(function(){
    /**
    *   navigation
    */
    var trigger = $('.hamburger'),
        overlay = $('.overlay'),
        isClosed = false;

    trigger.click(function () {
        hamburger_cross();
    });

    function hamburger_cross() {

        if (isClosed == true) {
            overlay.hide();
            trigger.removeClass('is-open');
            trigger.addClass('is-closed');
            isClosed = false;
        } else {
            overlay.show();
            trigger.removeClass('is-closed');
            trigger.addClass('is-open');
            isClosed = true;
        }
    }

    $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
    });

    /**
    *   masonry gallery
    */
    new CBPGridGallery(document.getElementById('grid-gallery'));

    /**
     *   add lazy loading to images out of screen viewport
     */
    $(function() {
        $("img.lazy").lazyload({
            effect : "fadeIn"
        });
    });

    /**
     *   wind rose on main page
     */
    var imageHeight = $(".img-block img").height();
    $("table").css("height", imageHeight + 50 + "px");
});

/**
 *   wind rose on main page
 */
$(window).resize(function() {
    var imageResizeHeight = $(".img-block img").height();
    $("table").css("height", imageResizeHeight + 50 + "px");
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