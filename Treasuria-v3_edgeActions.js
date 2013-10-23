
(function($,Edge,compId){var Composition=Edge.Composition,Symbol=Edge.Symbol;
//Edge symbol: 'stage'
(function(symbolName){Symbol.bindElementAction(compId,symbolName,"document","compositionReady",function(sym,e){var stageHeight=sym.$('Stage').height();sym.$("#Stage").css({"transform-origin":"0 0","-ms-transform-origin":"0 0","-webkit-transform-origin":"0 0","-moz-transform-origin":"0 0","-o-transform-origin":"0 0"});function scaleStage(){var stage=sym.$('Stage');var parent=sym.$('Stage').parent();var parentWidth=stage.parent().width();var stageWidth=stage.width();var desiredWidth=Math.round(parentWidth*1);var rescale=(desiredWidth/stageWidth);stage.css('transform','scale('+rescale+')');stage.css('-o-transform','scale('+rescale+')');stage.css('-ms-transform','scale('+rescale+')');stage.css('-webkit-transform','scale('+rescale+')');stage.css('-moz-transform','scale('+rescale+')');stage.css('-o-transform','scale('+rescale+')');parent.height(stageHeight*rescale);}
$(window).on('resize',function(){scaleStage();});$(document).ready(function(){scaleStage();});});
//Edge binding end
})("stage");
//Edge symbol end:'stage'

//=========================================================

//Edge symbol: 'chest_1'
(function(symbolName){Symbol.bindElementAction(compId,symbolName,"${_chest_spritesheet}","click",function(sym,e){sym.play('open_chest');sym.stop('stop_open_chest');sym.play('prize');sym.stop('end_prize');sym.play('prize_text');});
//Edge binding end
})("chest_1");
//Edge symbol end:'chest_1'

//=========================================================

//Edge symbol: 'chest_2'
(function(symbolName){Symbol.bindElementAction(compId,symbolName,"${_chest_spritesheet}","click",function(sym,e){sym.play('open_chest');sym.stop('stop_open_chest');sym.play('prize');sym.stop('end_prize');sym.play('prize_text');});
//Edge binding end
})("chest_2");
//Edge symbol end:'chest_2'

//=========================================================

//Edge symbol: 'key_1'
(function(symbolName){Symbol.bindElementAction(compId,symbolName,"${_yellow_key_sprite}","click",function(sym,e){sym.play('clicked_key_text');sym.stop('end_clicked_key_text');});
//Edge binding end
Symbol.bindElementAction(compId,symbolName,"${_keytext_1}","click",function(sym,e){sym.play('clicked_key_text');sym.stop('end_clicked_key_text');});
//Edge binding end
})("key_text_1");
//Edge symbol end:'key_text_1'

//=========================================================

//Edge symbol: 'key_text_2'
(function(symbolName){Symbol.bindElementAction(compId,symbolName,"${_purple_key_sprite}","click",function(sym,e){sym.play('clicked_key_text');sym.stop('end_clicked_key_text');});
//Edge binding end
Symbol.bindElementAction(compId,symbolName,"${_keytext_2}","click",function(sym,e){sym.play('clicked_key_text');sym.stop('end_clicked_key_text');});
//Edge binding end
})("key_text_2");
//Edge symbol end:'key_text_2'

//=========================================================

//Edge symbol: 'key_text_3'
(function(symbolName){Symbol.bindElementAction(compId,symbolName,"${_green_key_sprite}","click",function(sym,e){sym.play('clicked_key_text');sym.stop('end_clicked_key_text');});
//Edge binding end
Symbol.bindElementAction(compId,symbolName,"${_keytext_3}","click",function(sym,e){sym.play('clicked_key_text');sym.stop('end_clicked_key_text');});
//Edge binding end
})("key_text_3");
//Edge symbol end:'key_text_3'

//=========================================================

//Edge symbol: 'key_text_4'
(function(symbolName){Symbol.bindElementAction(compId,symbolName,"${_orange_key_sprite}","click",function(sym,e){sym.play('clicked_key_text');sym.stop('end_clicked_key_text');});
//Edge binding end
Symbol.bindElementAction(compId,symbolName,"${_keytext_4}","click",function(sym,e){sym.play('clicked_key_text');sym.stop('end_clicked_key_text');});
//Edge binding end
})("key_text_4");
//Edge symbol end:'key_text_4'

//=========================================================

//Edge symbol: 'key_text_5'
(function(symbolName){Symbol.bindElementAction(compId,symbolName,"${_blue_key_sprite}","click",function(sym,e){sym.play('clicked_key_text');sym.stop('end_clicked_key_text');});
//Edge binding end
Symbol.bindElementAction(compId,symbolName,"${_keytext_5}","click",function(sym,e){sym.play('clicked_key_text');sym.stop('end_clicked_key_text');});
//Edge binding end
})("key_text_5");
//Edge symbol end:'key_text_5'

//=========================================================

//Edge symbol: 'rem_time'
(function(symbolName){Symbol.bindTimelineAction(compId,symbolName,"Default Timeline","play",function(sym,e){var element=sym.$("time_seconds");});
//Edge binding end
})("rem_time");
//Edge symbol end:'rem_time'
})(jQuery,AdobeEdge,"EDGE-22450839");