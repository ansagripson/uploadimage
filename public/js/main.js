var baseurl=$('meta[name="baseurl"]').attr('content');
var flag=0;
$(document).ready(function () {
    $("#img-upload").hide();
});
$(function () {
    $(":file").change(function () {

        if (this.files && this.files[0]) {
            if((this.files[0]["type"]=="image/png" || this.files[0]["type"]=="image/jpeg" || this.files[0]["type"]=="image/jpg") && this.files[0]["size"]<500000) {
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
                $("#show-text").val(this.files[0]["name"]);
                flag=1;
            }
            else
            {
                alert("This file is not supported")
                flag=0;
            }
        }
    });
});

function imageIsLoaded(e) {
    if(flag==1) {
        $('#img-upload').attr('src', e.target.result);
        $("#img-upload").hide();
        flag=0;
    }
    else
    {
        alert("This file is not supported")
    }
};
$(".upload-image").click(function(){
    var form = new FormData(document.getElementById('post-image-form'));
    $.ajax({
        type: "POST",
        url: baseurl + "post-image",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: form,
        cache: false,
        contentType: false, //must, tell jQuery not to process the data
        processData: false,
        success: function(data)
        {
           swal("Success",data,"success");
           if(data=="Your Image has been uploaded successfully")
           {

               $("#img-upload").show();
           }
           else
           {
               $("#img-upload").hide();

           }
        }
    });
});
