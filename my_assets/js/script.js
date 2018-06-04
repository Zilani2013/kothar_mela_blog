$(document).ready(function() {
  
  $('#comment').click(function() { //when clicking the link

        $('#commentForm').toggle();  //toggles visibility

    });

   $('.replyButton').click(function() { //when clicking the link

        $('.replyForm').toggle();  //toggles visibility

    });

   $('.editing').click(function() {
   	/* Act on the event */
   	$('.editing').show();
    $('.edit_profile_picture').toggle();

   });

  $('#user').click(function() { //when clicking the link

      $('#logout').toggle();  //toggles visibility

    });

  
});

