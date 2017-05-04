/**
 * main JS file
 */


jQuery(document).ready(function(){
    /**
     *   BBcode editor
     */
    var lg = {
        lang: "hr",
        buttons: "bold,italic,underline,strike,sup,sub,|,justifyleft,justifycenter,justifyright,fontSize,quote,|,table,bullist,numlist,fontcolor,code,|,link,video,removeFormat"
    }
    $("#codeEditor, #codeEditor2").wysibb(lg);

    /**
     *   add lazy loading to images out of screen viewport
     */
    $(function() {
        $("img.lazy").lazyload({
            effect : "fadeIn"
        });
    });

});

$(document).ready(function(){
    $(function()
    {
        $("button#toggle-admin-video-help").click(function()
        {
            $(".admin-video-help").slideToggle();
            return false;
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

/**
 *  image lightbox gallery
 */
(function($){
    $(document).ready(function(){
        //activity indicator
        var activityIndicatorOn = function(){
                $( '<div id="imagelightbox-loading"><div></div></div>' ).appendTo('body');
            },
            activityIndicatorOff = function(){
                $('#imagelightbox-loading').remove();
            },
        //overlay
            overlayOn = function(){
                $( '<div id="imagelightbox-overlay"></div>' ).appendTo('body');
            },
            overlayOff = function(){
                $('#imagelightbox-overlay').remove();
            },
        //close button
            closeButtonOn = function(instance){
                $( '<button type="button" id="imagelightbox-close" title="Zatvori"></button>' ).appendTo('body').on('click touchend', function(){ $(this).remove(); instance.quitImageLightbox(); return false; });
            },
            closeButtonOff = function(){
                $('#imagelightbox-close').remove();
            },
        //arrows
            arrowsOn = function(instance, selector){
                var $arrows = $('<button type="button" class="imagelightbox-arrow imagelightbox-arrow-left" title="Prethodna"></button><button type="button" class="imagelightbox-arrow imagelightbox-arrow-right" title="Sljedeća"></button>');
                $arrows.appendTo('body');

                $arrows.on('click touchend', function(e){
                    e.preventDefault();

                    var $this = $(this),
                        $target = $(selector + '[href="' + $('#imagelightbox').attr('src') + '"]'),
                        index = $target.index(selector);

                    if ($this.hasClass('imagelightbox-arrow-left')) {
                        index = index - 1;
                        if (!$(selector).eq(index).length)
                            index = $(selector).length;
                    } else {
                        index = index + 1;
                        if (!$(selector).eq(index).length)
                            index = 0;
                    }

                    instance.switchImageLightbox(index);
                    return false;
                });
            },
            arrowsOff = function(){
                $('.imagelightbox-arrow').remove();
            };

        //run gallery
        var selector = 'a[data-imagelightbox="gallery-images"]';
        var instance = $(selector).imageLightbox({
            onStart:        function() { overlayOn(); closeButtonOn(instance); arrowsOn(instance, selector); },
            onEnd:          function() { overlayOff(); closeButtonOff(); arrowsOff(); activityIndicatorOff(); },
            onLoadStart:    function() { activityIndicatorOn(); },
            onLoadEnd:      function() { activityIndicatorOff(); $('.imagelightbox-arrow').css('display', 'block'); }
        });

    });
})(this.jQuery);
