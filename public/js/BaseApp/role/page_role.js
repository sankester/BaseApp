/**
 * Created by achva on 21/08/2017.
 */
$(document).ready(function () {
    $('.delete-role').on('click', function () {
        var data_url = $(this).attr('data-url');
        var data_token = $(this).attr('data-token');
        var dataElement = $(this);
        swal({
                title: "Apa anda yakin ?",
                text: "Menghapus role ini mungkin akan menghapus data yang berhubungan",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#FF7043",
                cancelButtonColor: "#ddd",
                confirmButtonText: "Iya, hapus portal.",
                cancelButtonText: "Cancel ",
                closeOnConfirm: false,
                closeOnCancel: false,
                showLoaderOnConfirm: true
            },
            function(isConfirm){
                if (isConfirm) {
                    $.ajax({
                        url: data_url,
                        type: 'POST',
                        data: {_method: 'DELETE', _token: data_token},
                        success: function (data) {
                            if(data.status == 'success'){
                                $(dataElement).parent().parent().parent().parent().remove();
                                swal({
                                        title: data.status,
                                        text: data.message,
                                        confirmButtonColor: "#66BB6A",
                                        type: "success",
                                        closeOnConfirm: false
                                    }
                                );
                            }else{
                                swal({
                                    title: data.status,
                                    text: data.message,
                                    confirmButtonColor: "#EF5350",
                                    type: "error"
                                });
                            }
                        },
                        error:function(data){
                            swal({
                                title: "Gagal !",
                                text: "Kesalahan pada server, mohon hubungi admin.",
                                confirmButtonColor: "#1e88e5 ",
                                type: "info"
                            });
                        }
                    });
                }
                else {
                    swal({
                        title: "Cancelled",
                        text: "Batal menghapus data:)",
                        confirmButtonColor: "#EF5350",
                        type: "error"
                    });
                }
            });
    });
});
<<<<<<< HEAD
=======
$(function() {
    // Initialize
    $(".form-validate-role").validate({
        errorClass: 'validation-error-label',
        successClass: 'validation-valid-label',
        highlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },

        // Different components require proper error label placement
        errorPlacement: function(error, element) {

            // Styled checkboxes, radios, bootstrap switch
            if (element.parents('div').hasClass("checker") || element.parents('div').hasClass("choice") || element.parent().hasClass('bootstrap-switch-container') ) {
                if(element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                    error.appendTo( element.parent().parent().parent().parent() );
                }
                else {
                    error.appendTo( element.parent().parent().parent().parent().parent() );
                }
            }

            // Unstyled checkboxes, radios
            else if (element.parents('div').hasClass('checkbox') || element.parents('div').hasClass('radio')) {
                error.appendTo( element.parent().parent().parent() );
            }

            // Input with icons and Select2
            else if (element.parents('div').hasClass('has-feedback') || element.hasClass('select2-hidden-accessible')) {
                error.appendTo( element.parent() );
            }

            // Inline checkboxes, radios
            else if (element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                error.appendTo( element.parent().parent() );
            }

            // Input group, styled file input
            else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
                error.appendTo( element.parent().parent() );
            }

            else {
                error.insertAfter(element);
            }
        },
        validClass: "validation-valid-label",
        success: function(label) {
            label.addClass("validation-valid-label").text("Success.")
        },
        rules: {
            role_nm: {
                required : true,
                minlength: 3,
                maxlength: 100
            },
            role_desc: {
                required : true,
                minlength: 5
            },
            default_page: {
                required : true,
                minlength: 3,
                maxlength: 100
            },
            portal_id:{
                required : true
            }
        }
    });

    // Reset form
    $('#reset').on('click', function() {
        validator.resetForm();
    });
});
>>>>>>> c0097802c0a8b2611c10f03eda278d8a0b777539
