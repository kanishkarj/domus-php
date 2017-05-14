/**
 * Created by kanishkar on 4/8/17.
 */
img_id = 2;

//adds a new image entry
function add_img(){
    $("#images").append('<li><div class="form-group"><label class="control-label col-sm-2" for="img'+img_id+'">Select image to upload: :</label> <div class="col-sm-10"> <input type="file" accept="image/*" name="img'+img_id+'" id="img'+img_id+'"> </div> </div> <div class="form-group"> <label class="control-label col-sm-2" for="desc'+img_id+'">Short description of image :</label> <div class="col-sm-10"> <input type="text" required="required" name="img_desc'+img_id+'" class="form-control" id="desc'+img_id+'" placeholder="Description"> </div> </div> </li>');
    img_id++;
}

function submit_click() {
    var create_form = $('#create-form');
    var img_check = true;

    $('#create-form').children(".form-img").css('color','red');

    if(img_check){
        create_form.submit();
    }
    else{
       alert('Sorry, only images can be uploaded. Please check the files you have uploaded !');
    }
}