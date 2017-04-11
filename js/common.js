
$(document).ready(function(){

    $(function(){

        $(document).on( 'scroll', function(){

            if ($(window).scrollTop() > 100) {
                $('.scroll-top-wrapper').addClass('show');
            } else {
                $('.scroll-top-wrapper').removeClass('show');
            }
        });

        $('.scroll-top-wrapper').on('click', scrollToTop);
    });

    function scrollToTop() {
        verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
        element = $('body');
        offset = element.offset();
        offsetTop = offset.top;
        $('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
        //$('.scroll-top-wrapper i ').css('background-color','steelblue');
    }

});

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
            var v = $('#srch-term').val();
            var q = v.replace(/ /g, '+')
            window.open("../?search=" + q, "_self");
        } else {

        }
    }
    else{
        var v = $('#srch-term').val();
        var q = v.replace(/ /g, '+')
        window.open("../?search=" + q, "_self");
    }

}