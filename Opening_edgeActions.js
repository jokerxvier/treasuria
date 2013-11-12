
(function($,Edge,compId){var Composition=Edge.Composition,Symbol=Edge.Symbol;
//Edge symbol: 'stage'
(function(symbolName){Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",17000,function(sym,e){});
//Edge binding end
Symbol.bindElementAction(compId,symbolName,"document","compositionReady",function(sym,e){var stageHeight=sym.$('Stage').height();sym.$("#Stage").css({"transform-origin":"0 0","-ms-transform-origin":"0 0","-webkit-transform-origin":"0 0","-moz-transform-origin":"0 0","-o-transform-origin":"0 0"});function scaleStage(){var stage=sym.$('Stage');var parent=sym.$('Stage').parent();var parentWidth=stage.parent().width();var stageWidth=stage.width();var desiredWidth=Math.round(parentWidth*1);var rescale=(desiredWidth/stageWidth);stage.css('transform','scale('+rescale+')');stage.css('-o-transform','scale('+rescale+')');stage.css('-ms-transform','scale('+rescale+')');stage.css('-webkit-transform','scale('+rescale+')');stage.css('-moz-transform','scale('+rescale+')');stage.css('-o-transform','scale('+rescale+')');parent.height(stageHeight*rescale);}
$(window).on('resize',function(){scaleStage();});$(document).ready(function(){scaleStage();});sym.$('pause').click(function(){sym.stop();sym.$("play").show();sym.$("pause").hide();});sym.$('play').click(function(){var timelinePos=sym.getPosition();sym.play(timelinePos);sym.$("pause").show();sym.$("play").hide();});sym.$('start_button').click(function(){sym.play('start');});});
//Edge binding end
Symbol.bindTimelineAction(compId,symbolName,"Default Timeline","complete",function(sym,e){sym.$('replay').click(function(){sym.play('start');});});
//Edge binding end
})("stage");
//Edge symbol end:'stage'

//=========================================================

//Edge symbol: 'paper'
(function(symbolName){})("paper");
//Edge symbol end:'paper'

//=========================================================

//Edge symbol: 'Opening1'
(function(symbolName){})("Opening1");
//Edge symbol end:'Opening1'

//=========================================================

//Edge symbol: 'Opening2'
(function(symbolName){})("Opening2");
//Edge symbol end:'Opening2'

//=========================================================

//Edge symbol: 'Map'
(function(symbolName){})("Map");
//Edge symbol end:'Map'

//=========================================================

//Edge symbol: 'Opening3'
(function(symbolName){})("Opening3");
//Edge symbol end:'Opening3'

//=========================================================

//Edge symbol: 'Opening4'
(function(symbolName){})("Opening4");
//Edge symbol end:'Opening4'

//=========================================================

//Edge symbol: 'full_chest'
(function(symbolName){})("full_chest");
//Edge symbol end:'full_chest'

//=========================================================

//Edge symbol: 'Opening5'
(function(symbolName){})("Opening5");
//Edge symbol end:'Opening5'

//=========================================================

//Edge symbol: 'Keys'
(function(symbolName){})("Keys");
//Edge symbol end:'Keys'

//=========================================================

//Edge symbol: 'Glow'
(function(symbolName){})("Glow");
//Edge symbol end:'Glow'

//=========================================================

//Edge symbol: 'Opening6'
(function(symbolName){})("Opening6");
//Edge symbol end:'Opening6'

//=========================================================

//Edge symbol: 'Merchant'
(function(symbolName){})("Merchant");
//Edge symbol end:'Merchant'

//=========================================================

//Edge symbol: 'Opening7'
(function(symbolName){})("Opening7");
//Edge symbol end:'Opening7'
})(jQuery,AdobeEdge,"EDGE-3625037");