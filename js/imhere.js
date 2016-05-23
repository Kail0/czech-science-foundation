 // as the page loads, call these scripts
 (function($) {
     $(function() {

         // SIDE MENU
         $('.button-collapse').sideNav({
             menuWidth: 300, // Default is 240
             edge: 'left', // Choose the horizontal origin
             closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
         });

         //waves efffect on NAV
         // $('li.page_item').addClass('waves-effect waves-light');
         // $('.side-nav').addClass('morph-menu-wrapper-active');

         // dropdown initialization
         $('.dropdown-button').dropdown({
             inDuration: 300,
             outDuration: 225,
             constrain_width: false, // Does not change width of dropdown to that of the activator
             hover: true, // Activate on hover
             gutter: 0, // Spacing from edge
             belowOrigin: true, // Displays dropdown below the button
             alignment: 'left' // Displays dropdown with edge aligned to the left of button
         });

        //  // MD loding transition
        $('[data-animation="animate"]').onScreen({
            doIn: function() {
                $(this).addClass('slideInUp animated')
            },
            tolerance: 0,
            throttle: 0,
            toggleClass: ''
        });

// Add ID to ...
// $('.button-collapse').on('click', function() {
//     $(".side-nav, .drag-target").attr('id','staggered-test').addClass('class1 class2');
// });


     }); // end of document ready
 })(jQuery); // end of jQuery name space
