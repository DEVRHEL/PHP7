function confirmdel(msg) {
    if (window.confirm(msg))
    {
        return true;
    }
    return false;
};

$(document).ready(function () {
    $('#addImage').click(function () {
        $('#insert').append('<div class="controls" style="margin-left: 1px;"><input name="fProductDetail[]" type="file"/></div>');
    });
});
$(document).ready(function () {
    $('a#del_img').on('click', (function () {
        var url='http://localhost/watch/admin/product/delimg/';
        var _token=$("form[name='frmEditProduct']").find("input[name='_token']").val();
        /*
        .parent() lấy phần tử cha trực tiếp của phần tử.
        .parents() lấy phần tử các phần tử cha (kể cả không trực tiếp)
        .children() lấy các phần tử con
        .siblings() các phần tử ngang hàng (anh em)
        .next() phần tử ngang hàng tiếp theo
        .nextAll() tất cả các phần tử ngang hàng tiếp theo
        .prev() phần tử ngang hàng trước
        .prevAll() tất cả các phần tử ngang hàng phía trước
        .eq(index) phần tử có thứ tự index trong tập hợp chọn được
        .find() tìm phần tử trong các phần tử con, cháu ...
         */
        var idImg=$(this).parent().find("img").attr("id");
        var srcImg=$(this).parent().find("img").attr("src");
        var rid=$(this).parent().find("img").attr("idr");
        $.ajax({
            url: url+idImg,
            type: 'GET',
            cache: false,
            data: {"_token":_token,"idImg":idImg,"urlImg":srcImg},
            success: function (data) {
                if(data=="OK")
                {
                    $("#"+rid).remove();
                }
                else{
                    alert("Error");
                }
            }
        });
    }));
});
