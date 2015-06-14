$(document).ready(function() {
    $("#user_photo img, #edit").hover(function() {
        $("#edit").fadeIn();
    },function() {
        $("#edit").hide();
    });
    $("#edit").mouseover(function() {
        $(this).show();
    });
    $("#edit").click(function(){
        $("#myfile").trigger("click");
    });
    var formdata = $("#myform")[0];
    $("#myfile").change(function() {
        $(".loader").show();
        var myfile = $("#myfile").val();
        if (myfile == '' || myfile == null)
        {
            alert("Please select file");
        }
        else
        {
            $.ajax({
                url: base_url+"/user/ajaxfileupload",
                type: 'POST',
                data: new FormData(formdata),
                processData: false,
                contentType: false,
                success: function(data) {
                    $(".loader").hide();
                    $("#cropbox").attr("src", base_url+"/assets/images/" + data);
                    $("#hid_image_name").val(data);
                     $('#cropbox').Jcrop({
                        minSize: [150, 100], // min crop size
                        maxSize: [255, 200], // max crop size
                        setSelect: [500,100,150,100],
                        aspectRatio: 1,
                        onSelect: updateCoords
                    });
                    $('.jcrop-holder img').attr('src', base_url+"/assets/images/" + data);
                    $.fancybox.open([{href: '#myimage'}], {
                        afterClose: function() {
                        }
                    });
                },
               
            });
        }
    });
    
});  


