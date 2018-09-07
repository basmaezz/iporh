var form = $('#form');
window.is_all_images_uploaded = true;
form.validate({
    highlight: function (element) {
        jQuery(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function (element) {
        jQuery(element).closest('.form-group').removeClass('has-error').addClass('has-success');
    },
    submitHandler: function (f, e) {
        e.preventDefault();
        if (window.is_all_images_uploaded) {
            $('.upload-spinn').removeClass('hidden');
            var formData = new FormData(form[0]);
            var url = form.attr('action');
            var redirectUrl = form.attr('to');
            var _method = form.attr('method');
            if (window.images !== undefined && window.images !== null) {
                formData.append('images', JSON.stringify(window.images));
            }
            $.ajax({
                url: url,
                method: _method,
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    $('.upload-spinn').addClass('hidden');
                    if (response.status) {
                        customSweetAlert(
                            'success',
                            response.message,
                            response.item,
                            function (event) {
                                window.location = redirectUrl
                            }
                        );
                    } else {
                        customSweetAlert(
                            'error',
                            response.message,
                            response.errors_object
                        );
                    }
                },
                error: function (jqXhr) {
                    $('.upload-spinn').addClass('hidden');
                    getErrors(jqXhr, '/' + window.lang + '/admin/login');
                }
            });
        } else {
            customSweetAlert(
                'warning',
                'الرجاء الإنتظار حتى يتم رفع الصور',
                ''
            );
        }


    }
});

$('#summernote').summernote({
    height: 300, // set editor height
    placeholder: 'أكتب نص الخبر هنا',
    minHeight: null, // set minimum height of editor
    maxHeight: null, // set maximum height of editor
    focus: false // set focus to editable area after initializing summernote
});
var edit = function() {
    $('.click2edit').summernote({focus: true});
};

var save = function() {
    var markup = $('.click2edit').summernote('code');
    $('.click2edit').summernote('destroy');
};
