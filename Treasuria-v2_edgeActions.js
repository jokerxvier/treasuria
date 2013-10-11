/***********************
* Adobe Edge Animate Composition Actions
*
* Edit this file with caution, being careful to preserve 
* function signatures and comments starting with 'Edge' to maintain the 
* ability to interact with these actions from within Adobe Edge Animate
*
***********************/
(function($, Edge, compId){
var Composition = Edge.Composition, Symbol = Edge.Symbol; // aliases for commonly used Edge classes

   //Edge symbol: 'stage'
   (function(symbolName) {
      

      Symbol.bindElementAction(compId, symbolName, "document", "compositionReady", function(sym, e) {
         //----------code for responsive -------//
         
         var stageHeight = sym.$('Stage').height(); // Set a variable for the height of the stage
         
         sym.$("#Stage").css({ // Set the transform origin so we always scale to the top left corner of the stage
         "transform-origin":"0 0",
         "-ms-transform-origin":"0 0",
         "-webkit-transform-origin":"0 0",
         "-moz-transform-origin":"0 0",
         "-o-transform-origin":"0 0"
         });
         
         function scaleStage() {
             var stage = sym.$('Stage'); // Set a reusable variable to reference the stage
             var parent = sym.$('Stage').parent(); // Set a reusable variable to reference the parent container of the stage
         
             var parentWidth = stage.parent().width(); // Get the parent of the stage width
             var stageWidth = stage.width(); // Get the stage width
             var desiredWidth = Math.round(parentWidth * 1); // Set the new width of the stage as it scales
             var rescale = (desiredWidth / stageWidth); // Set a variable to calculate the new width of the stage as it scales
         
         // Rescale the stage!
         	 stage.css('transform', 'scale(' + rescale + ')'); 
             stage.css('-o-transform', 'scale(' + rescale + ')');
         	 stage.css('-ms-transform', 'scale(' + rescale + ')');
             stage.css('-webkit-transform', 'scale(' + rescale + ')');
         	 stage.css('-moz-transform', 'scale(' + rescale + ')');
             stage.css('-o-transform', 'scale(' + rescale + ')');
             parent.height(stageHeight * rescale); // Reset the height of the parent container so the objects below it will reflow as the height adjusts
         }
         
         // Make it happen when the browser resizes
         $(window).on('resize', function(){ 
         	 scaleStage(); 
         });
         
         // Make it happen when the page first loads
         $(document).ready(function(){
             scaleStage();
         });
         
         //---------- END code for responsive -------//
         
         
         
         
         

      });
      //Edge binding end

      Symbol.bindTimelineAction(compId, symbolName, "Default Timeline", "stop", function(sym, e) {
         // insert code here to be run when the timeline stops

      });
      //Edge binding end

      Symbol.bindTimelineAction(compId, symbolName, "Default Timeline", "complete", function(sym, e) {
         // insert code to be run at timeline end here
		 
		 
         

      });
      //Edge binding end

      Symbol.bindTriggerAction(compId, symbolName, "Default Timeline", 1000, function(sym, e) {
         // insert code here
      });
      //Edge binding end

   })("stage");
   //Edge symbol end:'stage'

   //=========================================================
   
   //Edge symbol: 'treasure_box_1'
	
	
	
   (function(box1, box2, key, countTime) {
		var flag = "";
		 Symbol.bindElementAction(compId, key, "${_yellow_key_sprite2}", "click", function(sym, e) {
				sym.play('clicked');
				flag = "click";
				
				if (flag === 'click'){
					 Symbol.bindElementAction(compId, box1, "${_chest_spritesheet2}", "click", function(sym, e) {
						sym.play('open_chest');
						sym.stop('stop_open_chest');
						
						
						sym.play('you_win');
						sym.stop('stop_you_win');

					 });
					 
					 Symbol.bindElementAction(compId, box2, "${_chest_spritesheet2}", "click", function(sym, e) {
							sym.play('open_chest');
							sym.stop('stop_open_chest');
							
							sym.play('you_lose');
							sym.stop('stop_you_lose');
					});
					
					
				}
				
				

		
				
		 });
		 
	
		 

	
   })(("treasure_box_1"), ("treasure_box_2"), ("yellow_bet"), ("rem_time"));
   
   
   

})(jQuery, AdobeEdge, "EDGE-14851457");