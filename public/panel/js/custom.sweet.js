var ok_btn = 'موافق';
var err_txt = 'حدث خطأ غير متوقع .. الرجاء المحاولة لاحقاً';
if (window.lang === 'en'){
     ok_btn = 'Ok';
    err_txt = 'Unknown Error .. Try Again';
}
function customSweetAlert(type ,title , html , func) {
    var then_function = func || function () {
    };
    swal({
        title: '<span class="'+type+'">'+title+'</span>',
        type: type ,
        html : html ,
        confirmButtonText: ok_btn,
        confirmButtonColor: '#56ace0',
        width: '500px'
    }).then(then_function);
}

function errorCustomSweet() {
    customSweetAlert(
        'error',
        err_txt
    );
}