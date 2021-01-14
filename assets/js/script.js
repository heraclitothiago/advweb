$(function() {

    function step(button) {
        $('.form-step:visible').fadeOut(200, function() {
            $('.' + button.data('step')).fadeIn(200);
        });
    }

    $('html').on('submit', 'form.form-wizard', function(event) {
        event.preventDefault();

        var form = $(this);
        var formAction = form.data('action');
        var formSerialize = form.serialize();
        var formButton = form.find('button');

        $.post('controller.php', { action: formAction, formSerialize }, function(data) {

            if (data.error === true) {
                $('.error').html('<p>' + data.errorMessage + '</p>').fadeIn();
            } else {
                $('.error').html('').fadeOut();
            }

            if (data.success === true) {
                step(formButton);
            }

            if (data.finish === true) {
                window.location.href = data.redirect;
            }

        }, 'json');
    });

    $('html').on('click', 'a[data-step]', function(event) {
        event.preventDefault();
        step($(this));
    });

});