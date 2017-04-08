/**
 * Created by kanishkar on 4/8/17.
 */
img_id = 2;
function add_img(){
    $("#images").append('<li><div class="form-group"><label class="control-label col-sm-2" for="img'+img_id+'">Select image to upload: :</label> <div class="col-sm-10"> <input type="file" name="img'+img_id+'" id="img'+img_id+'"> </div> </div> <div class="form-group"> <label class="control-label col-sm-2" for="desc'+img_id+'">Short description of image :</label> <div class="col-sm-10"> <input type="text" required="required" name="img_desc'+img_id+'" class="form-control" id="desc'+img_id+'" placeholder="Enter description"> </div> </div> </li>');
    img_id++;
}
$(Document).ready(function () {
    console.log("data");
    /*$('#form-create').submit(function (event) {
        event.preventDefault();
        var form = $(this);
        var data=  form.serialize();
        console.log(data);
    });*/


});