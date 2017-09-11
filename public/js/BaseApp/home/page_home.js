$(document).ready(function () {
    Ladda.bind('.btn-ladda-load',  {
        callback: function(instance) {
            var url =  $('.btn-ladda-load').attr('data-url');
            var count_row =  $('.timeline-row').length;
            var next_page  = Math.round((count_row / 10) + 1);
            $.ajax({
                url: url+'?page='+ parseInt(next_page),
                type: 'POST',
                data: {_method: 'GET'},
                success: function (data) {
                    $(".timeline-container").append(data.logs);
                    instance.stop();
                    if(data.status == 'failed'){
                        swal({
                            title: data.status,
                            text: data.message,
                            confirmButtonColor: "#EF5350",
                            type: "error"
                        });
                    }
                    if(data.end == true){
                        $('#load-section').remove();
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
    });
});