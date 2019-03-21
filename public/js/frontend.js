$('.sound').on('click', function(){
    var el = $(this);

    if (!el.hasClass('clicked')) {
        new Audio(el.attr('data-source')).play();

        el.addClass('clicked');

        setTimeout(function () {
            el.removeClass('clicked');
        }, 1000);
    }
});
