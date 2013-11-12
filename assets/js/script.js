include('assets/js/bootstrap.min.js');
include('assets/js/joyride-2.1.js');
include('assets/js/jquery.cookie.js');
include('assets/js/modernizr.mq.js');

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