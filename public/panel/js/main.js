$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function () {
    $('#logout').on('click', function () {
        var url = $(this).data('link');
        $.ajax({
            url: url,
            type: 'POST',
            success: function (response) {
                window.location = '/'+window.lang+'/admin';
            }
        });
    });
});