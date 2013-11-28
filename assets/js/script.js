include('assets/js/bootstrap.min.js');
include('assets/js/joyride-2.1.js');
include('assets/js/jquery.cookie.js');
include('assets/js/buzz.js');

function include(url){ 
  document.write('<script src="'+ url + '" type="text/javascript"></script>'); 
}

/* JOYRIDE TOUR */
      $(window).load(function() {
        $('#joyRideTipContent').joyride({
          autoStart : true,
          postStepCallback : function (index, tip) {
          if (index == 2) {
            $(this).joyride('set_li', false, 1);
          }
        },
        modal:true,
        expose: true
        });
      });

/* KEY TOGGLE */
//$('.game-keys span').click(function () {
   // $('.game-keys span').not($(this)).css({'border':'none'});
   // $(this).css({'border':'1px solid blue'});


/* KEY TOGGLE */
$('.game-keys li').click(function() {
    $('.game-keys li').not(this).removeClass('rotated');
    $(this).toggleClass('rotated');
});

/* DAY & NIGHT */
    datetoday = new Date(); // create new Date()
    timenow = datetoday.getTime(); // grabbing the time it is now
    datetoday.setTime(timenow); // setting the time now to datetoday variable
    hournow = datetoday.getHours();  //the hour it is
 
 
    if (hournow >= 18)  // if it is after 6pm
        $('.game-time').addClass('night');
    else if (hournow >= 12) // if it is after 12pm
        $('.game-time').addClass('game-time');
    else if (hournow >= 6)  // if it is after 6am
        $('.game-time').addClass('game-time');
    else if (hournow >= 0)  // if it is after midnight
        $('.game-time').addClass('night');

/* SFX */

    //openchestSound = new buzz.sound( "assets/sounds/treasuria_openchest_01", {formats: [ "ogg", "mp3", "aac" ]});
    //bgSound = new buzz.sound( "assets/sounds/treasuria_music_temp", {formats: [ "ogg", "mp3", "aac" ]});

//bgSound.play()


$( '.bg-sound' ).click( function() {
         // bgSound.togglePlay(); 
});


