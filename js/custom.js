( function( $ ) {


    // get info from target and set into modal;
    let name, date, text;

    $(".pgcu_post_slider__single").click(function(evt) {
        text = evt.target.lastChild.previousSibling.innerText;
        name = evt.target.firstElementChild.innerText;
        date = evt.target.firstElementChild.nextElementSibling.innerText
        $('.modal-review__name').text(name);
        $('.modal-review__data').text(date);
        $('.modal-review__text').text(text);
        $('.overlay-review').fadeIn(150);
    });

    // close modal
    $(".modal-review__close").click(function() {
        $('.overlay-review').fadeOut(150);
    });

    $('.overlay-review').click(function() {
        if ( !$('.modal-review__wrapper').is(':hover') ) {
            $('.overlay-review').fadeOut(150);
        }
    })


    // hide reviews without text
    $(".wp-facebook-review").each(function (index, value) {
        let attr = $(value).context.lastElementChild.lastElementChild.lastElementChild;
        if ($(attr).hasClass("wp-facebook-text")) {

        } else {
            $(value).hide();
        }
    });

} )( jQuery );
