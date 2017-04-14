$(document).ready(function(){
    /*
     * On click of accordian children
     */
    // Get all the links.
    var acc_link = $("#theme-accordion .accordion-link");

    // On clicking of the links do something.
    acc_link.on('click', function(e) {
        e.preventDefault();

        var acc_link_block = $(this).attr("href");
        $(acc_link_block).slideDown('ease');

        $("#theme-accordion .accordion-collapse").not(acc_link_block).slideUp('ease');

    });

});