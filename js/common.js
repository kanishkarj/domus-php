
function a_onClick(){
    $("#search").fadeToggle("fast");
    $('#search-item').toggleClass('active');
}
function srch_onClick() {
    var txt;
    var url = window.location.href;
    if(url.includes("create")) {
        var r = confirm("You will be redirected to Homepage, all data entered will be lost. Press OK to continue !");
        if (r == true) {
            var q = $('#srch-term').val();
            window.open("../?search=" + q, "_self");
        } else {

        }
    }
    else{
        var q = $('#srch-term').val();
        window.open("../?search=" + q, "_self");
    }

}