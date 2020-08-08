$(document).ready(function () {
    $(".myupdatecart").click(function () {
        var id = $(this).attr('id');
        var qty = $(this).parent().parent().parent().next().next().find("#quantity_input").val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: 'updatecart/'+id+'/'+qty,
            type: 'post',
            cache: false,
            data: {"_token":token,"id":id,"qty":qty},
            success: function (data) {
                if (data == "OK")
                {
                    window.location = "cart";
                }
            }
        });
    });
});
