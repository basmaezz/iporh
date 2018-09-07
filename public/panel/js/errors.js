function getErrors(jqXhr, path) {
    switch (jqXhr.status) {
        case 401 :
            $(location).prop('pathname', path);
            break;
        case 400 :
            customSweetAlert(
                'error',
                jqXhr.responseJSON.message,
                ''
            );
            break;
        case 422 :
            var $errors = jqXhr.responseJSON.errors;
            var errorsHtml = '<ul>';
            $.each($errors, function (key, value) {
                errorsHtml += '<li>' + value[0] + '</li>';
            });
            errorsHtml += '</ul>';
            customSweetAlert(
                'error',
                (window.lang === 'ar') ?'حدثت الأخطاء التالية' : 'The Following Error Occurred',
                errorsHtml
            );
            break;
        default:
            errorCustomSweet();
            break;
    }
    return false;
}