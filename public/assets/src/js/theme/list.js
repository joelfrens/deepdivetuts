$(document).ready(function(){
    /*
     * On click of other checkboxes inside the table list
     */
    $(".table-list-check, .table-list-check-all").change(function() {
         if ($(this).hasClass("table-list-check-all")) {
             $(".table-list-check").prop("checked", $(this).prop("checked"));
         }

         if(false == $(this).prop("checked")) {
             $(".table-list-check-all").prop("checked", false);
             if ($(".table-list-check:checked").length > 0) {
                 // Display the trash button
                 $(".table-del-ic").addClass("active");
             } else {
                 // Hide the trash button
                 $(".table-del-ic").removeClass("active")
             }
         } else {
             // Display the trash button
             $(".table-del-ic").addClass("active");

             // Check if all checkbox items are checked
             if ($(".table-list-check:checked").length === $(".table-list-check").length ) {
                 $(".table-list-check-all").prop("checked", true);
             }
         }
    });

});