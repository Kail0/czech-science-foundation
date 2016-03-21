 // as the page loads, cal these scripts
(function($){
  $(function(){


// SIDE MENU
  $('.button-collapse').sideNav({
      menuWidth: 300, // Default is 240
      edge: 'right', // Choose the horizontal origin
      closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
    }
  );
      
  	
$('li.page_item').addClass('waves-effect waves-light');

  }); // end of document ready
})(jQuery); // end of jQuery name space