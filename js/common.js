
function a_onClick(){
    $("#search").fadeToggle("fast"); //toggles the visibility of the search bar
    $('#search-item').toggleClass('active'); //toggles the sctive state of search button on the navbar
}
function srch_onClick() {
    var txt;
    var url = window.location.href;//url of current page
    /*the below if statement checks whether current page is create.php if it is, it informs the user abt the loss
     of the entered data*/
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