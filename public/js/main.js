/**
 * main JS file
 */

jQuery(document).ready(function(){
    // page loader public pages
    $("#fakeloader").fakeLoader({
        timeToHide: 500,
        zIndex: 999,
        spinner: "spinner5", // spinner1-7
        bgColor: "#5bb9ea"
    });

});

$(document).ready(function(){
    /*
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

    /*
    *   masonry gallery
     */
    new CBPGridGallery(document.getElementById('grid-gallery') );
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