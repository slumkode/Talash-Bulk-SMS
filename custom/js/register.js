$(document).ready(function () {
    $("#registerForm").unbind('submit').bind('submit', function () {

        var form = $(this);
        var url = form.attr('action');
        var type = form.attr('method');

        $.ajax({
            url: url,
            type: type,
            data: form.serialize(),
            dataType: 'json',
            success: function (response) {
                if (response.success === true) {
                    // window.location = response.messages;
                    $("#message").html('<div class="alert alert-success">' +
                        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' +
                        response.messages +
                        '</div>');
                        clearForm();
                }
                else {
                    if (response.messages instanceof Object) {
                        $("#message").html('');

                        $.each(response.messages, function (index, value) {
                            var key = $("#" + index);

                            key.closest('.form-group')
                                .removeClass('has-error')
                                .removeClass('has-success')
                                .addClass(value.length > 0 ? 'has-error' : 'has-success')
                                .find('.text-danger').remove();

                            key.after(value);

                        });
                    }
                    else {
                        $(".text-danger").remove();
                        $(".form-group").removeClass('has-error').removeClass('has-success');

                        $("#message").html('<div class="alert alert-danger alert-dismissible" role="alert">' +
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                            response.messages +
                            '</div>');
                    } // /else
                } // /else
            } // /if
        });

        return false;
    });
});

function clearForm() {
    $('input[type="text"]').val('');
    $('input[type="email"]').val('');
    $('input[type="password"]').val('');
    $('select').val('');
    $(".fileinput-remove-button").click();
}