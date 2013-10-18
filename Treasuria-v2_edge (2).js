/**
 * Adobe Edge: symbol definitions
 */
(function($, Edge, compId){
//images folder
var im='images/';

var fonts = {};
   fonts['asul, sans-serif']='<script src=\"http://use.edgefonts.net/asul:n4,n7:all.js\"></script>';


var resources = [
];
var symbols = {
"stage": {
   version: "2.0.1",
   minimumCompatibleVersion: "2.0.0",
   build: "2.0.1.268",
   baseState: "Base State",
   initialState: "Base State",
   gpuAccelerate: false,
   resizeInstances: false,
   content: {
         dom: [
         {
            id:'bg_rocky_beach',
            type:'image',
            rect:['0.3%','0.3%','99.3%','99.2%','auto','auto'],
            fill:["rgba(0,0,0,0)",im+"rocky%20beach.png",'50%','50%','953.27px','595.2px']
         },
         {
            id:'rem_time',
            type:'text',
            rect:['auto','4.8%','2.9%','3.5%','29.1%','auto'],
            text:"60",
            align:"left",
            font:['asul, sans-serif',[131.25,"%"],"rgba(255,255,255,1)","bold","none","normal"],
            textShadow:["rgba(178,149,118,1.00)",3,3,3]
         },
         {
            id:'text_rem_time',
            type:'text',
            rect:['auto','4.8%','25.4%','3.5%','2%','auto'],
            text:"seconds remaining",
            align:"left",
            font:['asul, sans-serif',[131.25,"%"],"rgba(255,255,255,1)","bold","none","normal"],
            textShadow:["rgba(178,149,118,1.00)",3,3,3]
         },
         {
            id:'bet_5',
            type:'text',
            rect:['26.2%','72.7%','7.2%','7.2%','auto','auto'],
            cursor:['default'],
            text:"500",
            align:"center",
            font:['asul, sans-serif',[137.5,"%"],"rgba(0,0,0,1)","700","none","normal"],
            textShadow:["rgba(0,0,0,0.648438)",3,3,3]
         },
         {
            id:'blue_key',
            type:'image',
            rect:['74.3%','69%','3.7%','14.5%','auto','auto'],
            cursor:['pointer'],
            fill:["rgba(0,0,0,0)",im+"blue-key.png",'0px','0px']
         },
         {
            id:'bet_4',
            type:'text',
            rect:['26.2%','72.7%','7.2%','7.2%','auto','auto'],
            cursor:['default'],
            text:"300",
            align:"center",
            font:['asul, sans-serif',[137.5,"%"],"rgba(0,0,0,1)","700","none","normal"],
            textShadow:["rgba(0,0,0,0.648438)",3,3,3]
         },
         {
            id:'orange_key',
            type:'image',
            rect:['63.8%','69%','3.9%','14.3%','auto','auto'],
            cursor:['pointer'],
            fill:["rgba(0,0,0,0)",im+"orange-key.png",'0px','0px']
         },
         {
            id:'bet_3',
            type:'text',
            rect:['26.2%','72.7%','7.2%','7.2%','auto','auto'],
            cursor:['default'],
            text:"150",
            align:"center",
            font:['asul, sans-serif',[137.5,"%"],"rgba(0,0,0,1)","700","none","normal"],
            textShadow:["rgba(0,0,0,0.648438)",3,3,3]
         },
         {
            id:'green_key',
            type:'image',
            rect:['53.8%','69.3%','3.2%','13.5%','auto','auto'],
            cursor:['pointer'],
            fill:["rgba(0,0,0,0)",im+"green-key.png",'0px','0px']
         },
         {
            id:'bet_2',
            type:'text',
            rect:['26.2%','72.7%','7.2%','7.2%','auto','auto'],
            cursor:['default'],
            text:"50",
            align:"center",
            font:['asul, sans-serif',[137.5,"%"],"rgba(0,0,0,1)","700","none","normal"],
            textShadow:["rgba(0,0,0,0.648438)",3,3,3]
         },
         {
            id:'purple_key',
            type:'image',
            rect:['42.8%','69.2%','4.1%','14.2%','auto','auto'],
            cursor:['pointer'],
            fill:["rgba(0,0,0,0)",im+"purple-key.png",'0px','0px']
         },
         {
            id:'yellow_bet',
            type:'rect',
            rect:['283','412','auto','auto','auto','auto'],
            cursor:['pointer']
         },
         {
            id:'treasure_box_1',
            type:'rect',
            rect:['13.3%','37.2%','23.8%','33%','auto','auto'],
            cursor:['pointer']
         },
         {
            id:'treasure_box_2',
            type:'rect',
            rect:['auto','37.2%','23.8%','33%','18.6%','auto'],
            cursor:['pointer']
         }],
         symbolInstances: [
         {
            id:'treasure_box_2',
            symbolName:'treasure_box_2'
         },
         {
            id:'yellow_bet',
            symbolName:'yellow_bet'
         },
         {
            id:'treasure_box_1',
            symbolName:'treasure_box_1'
         }
         ]
      },
   states: {
      "Base State": {
         "${_yellow_bet}": [
            ["style", "left", '283px'],
            ["style", "cursor", 'pointer']
         ],
         "${_rem_time}": [
            ["subproperty", "textShadow.blur", '3px'],
            ["style", "letter-spacing", '0em'],
            ["style", "bottom", 'auto'],
            ["style", "right", '29.06%'],
            ["subproperty", "textShadow.offsetV", '3px'],
            ["style", "left", 'auto'],
            ["style", "width", '2.92%'],
            ["style", "top", '4.83%'],
            ["style", "font-size", '131.25%'],
            ["subproperty", "textShadow.color", 'rgba(178,149,118,1.00)'],
            ["style", "text-indent", '0%'],
            ["style", "height", '3.5%'],
            ["style", "font-family", 'asul, sans-serif'],
            ["style", "word-spacing", '0em'],
            ["subproperty", "textShadow.offsetH", '3px']
         ],
         "${_bet_3}": [
            ["color", "color", 'rgba(255,255,255,1.00)'],
            ["subproperty", "textShadow.offsetV", '3px'],
            ["style", "left", '50.21%'],
            ["style", "word-spacing", '0em'],
            ["subproperty", "textShadow.blur", '3px'],
            ["style", "letter-spacing", '0em'],
            ["style", "cursor", 'default'],
            ["subproperty", "textShadow.offsetH", '3px'],
            ["style", "width", '10.34%'],
            ["style", "top", '83.5%'],
            ["style", "font-size", '175%'],
            ["style", "text-align", 'center'],
            ["style", "text-indent", '0%'],
            ["style", "height", '6.17%'],
            ["subproperty", "textShadow.color", 'rgba(178,149,118,1.00)'],
            ["style", "font-family", 'asul, sans-serif'],
            ["style", "font-weight", '700']
         ],
         "${_orange_key}": [
            ["style", "top", '69%'],
            ["style", "left", '63.75%'],
            ["style", "cursor", 'pointer']
         ],
         "${_bet_2}": [
            ["color", "color", 'rgba(255,255,255,1.00)'],
            ["style", "font-weight", '700'],
            ["style", "cursor", 'default'],
            ["style", "word-spacing", '0em'],
            ["subproperty", "textShadow.blur", '3px'],
            ["style", "letter-spacing", '0em'],
            ["style", "width", '10.34%'],
            ["subproperty", "textShadow.offsetH", '3px'],
            ["style", "font-size", '175%'],
            ["style", "top", '83.5%'],
            ["style", "font-family", 'asul, sans-serif'],
            ["style", "text-align", 'center'],
            ["style", "text-indent", '0%'],
            ["style", "height", '6.17%'],
            ["subproperty", "textShadow.color", 'rgba(178,149,118,1.00)'],
            ["subproperty", "textShadow.offsetV", '3px'],
            ["style", "left", '39.69%']
         ],
         "${_bet_4}": [
            ["color", "color", 'rgba(255,255,255,1.00)'],
            ["subproperty", "textShadow.offsetV", '3px'],
            ["style", "left", '60.52%'],
            ["style", "word-spacing", '0em'],
            ["subproperty", "textShadow.blur", '3px'],
            ["style", "letter-spacing", '0em'],
            ["style", "cursor", 'default'],
            ["subproperty", "textShadow.offsetH", '3px'],
            ["style", "font-size", '175%'],
            ["style", "top", '83.5%'],
            ["style", "width", '10.34%'],
            ["style", "text-align", 'center'],
            ["style", "text-indent", '0%'],
            ["style", "height", '6.17%'],
            ["subproperty", "textShadow.color", 'rgba(178,149,118,1.00)'],
            ["style", "font-family", 'asul, sans-serif'],
            ["style", "font-weight", '700']
         ],
         "${_bet_5}": [
            ["color", "color", 'rgba(255,255,255,1.00)'],
            ["subproperty", "textShadow.offsetV", '3px'],
            ["style", "left", '70.94%'],
            ["style", "word-spacing", '0em'],
            ["subproperty", "textShadow.blur", '3px'],
            ["style", "letter-spacing", '0em'],
            ["style", "cursor", 'default'],
            ["subproperty", "textShadow.offsetH", '3px'],
            ["style", "width", '10.33%'],
            ["style", "top", '83.5%'],
            ["style", "font-size", '175%'],
            ["style", "text-align", 'center'],
            ["style", "text-indent", '0%'],
            ["style", "height", '6.17%'],
            ["subproperty", "textShadow.color", 'rgba(178,149,118,1.00)'],
            ["style", "font-family", 'asul, sans-serif'],
            ["style", "font-weight", '700']
         ],
         "${_green_key}": [
            ["style", "top", '69.33%'],
            ["style", "left", '53.75%'],
            ["style", "cursor", 'pointer']
         ],
         "${_treasure_box_2}": [
            ["style", "top", '4.16%'],
            ["style", "cursor", 'pointer'],
            ["style", "height", '54.16%'],
            ["style", "right", '18.75%'],
            ["style", "left", 'auto'],
            ["style", "width", '23.75%']
         ],
         "${_bg_rocky_beach}": [
            ["style", "top", '0.34%'],
            ["style", "cursor", 'auto'],
            ["style", "background-position", [50,50], {valueTemplate:'@@0@@% @@1@@%'} ],
            ["style", "left", '0.31%']
         ],
         "${_purple_key}": [
            ["style", "top", '69.17%'],
            ["style", "left", '42.81%'],
            ["style", "cursor", 'pointer']
         ],
         "${_text_rem_time}": [
            ["subproperty", "textShadow.blur", '3px'],
            ["style", "letter-spacing", '0em'],
            ["style", "bottom", 'auto'],
            ["style", "right", '1.98%'],
            ["subproperty", "textShadow.offsetV", '3px'],
            ["style", "left", 'auto'],
            ["style", "width", '25.42%'],
            ["style", "top", '4.83%'],
            ["style", "font-size", '131.25%'],
            ["subproperty", "textShadow.color", 'rgba(178,149,118,1.00)'],
            ["style", "text-indent", '0%'],
            ["style", "height", '3.5%'],
            ["style", "font-family", 'asul, sans-serif'],
            ["style", "word-spacing", '0em'],
            ["subproperty", "textShadow.offsetH", '3px']
         ],
         "${_Stage}": [
            ["color", "background-color", 'rgba(255,255,255,1)'],
            ["style", "min-width", '0%'],
            ["style", "overflow", 'hidden'],
            ["style", "height", '600px'],
            ["style", "max-width", 'none'],
            ["style", "width", '960px']
         ],
         "${_blue_key}": [
            ["style", "top", '69%'],
            ["style", "left", '74.27%'],
            ["style", "cursor", 'pointer']
         ],
         "${_treasure_box_1}": [
            ["style", "top", '4.01%'],
            ["style", "height", '54.33%'],
            ["style", "cursor", 'pointer'],
            ["style", "left", '18.74%'],
            ["style", "width", '23.75%']
         ]
      }
   },
   timelines: {
      "Default Timeline": {
         fromState: "Base State",
         toState: "",
         duration: 1000,
         autoPlay: true,
         timeline: [
            { id: "eid210", tween: [ "subproperty", "${_bet_4}", "textShadow.blur", '3px', { fromValue: '3px'}], position: 0, duration: 0 },
            { id: "eid59", tween: [ "style", "${_bet_3}", "left", '50.21%', { fromValue: '50.21%'}], position: 1000, duration: 0 },
            { id: "eid50", tween: [ "style", "${_bet_2}", "height", '6.17%', { fromValue: '6.17%'}], position: 1000, duration: 0 },
            { id: "eid69", tween: [ "style", "${_bet_5}", "height", '6.17%', { fromValue: '6.17%'}], position: 1000, duration: 0 },
            { id: "eid239", tween: [ "style", "${_bet_3}", "top", '83.5%', { fromValue: '83.5%'}], position: 0, duration: 0 },
            { id: "eid240", tween: [ "style", "${_bet_3}", "top", '83.5%', { fromValue: '83.5%'}], position: 1000, duration: 0 },
            { id: "eid237", tween: [ "style", "${_bet_2}", "top", '83.5%', { fromValue: '83.5%'}], position: 0, duration: 0 },
            { id: "eid238", tween: [ "style", "${_bet_2}", "top", '83.5%', { fromValue: '83.5%'}], position: 1000, duration: 0 },
            { id: "eid211", tween: [ "subproperty", "${_bet_5}", "textShadow.offsetH", '3px', { fromValue: '3px'}], position: 0, duration: 0 },
            { id: "eid52", tween: [ "style", "${_bet_2}", "font-size", '175%', { fromValue: '175%'}], position: 1000, duration: 0 },
            { id: "eid51", tween: [ "color", "${_bet_2}", "color", 'rgba(255,255,255,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(255,255,255,1.00)'}], position: 1000, duration: 0 },
            { id: "eid53", tween: [ "style", "${_bet_2}", "left", '39.69%', { fromValue: '39.69%'}], position: 1000, duration: 0 },
            { id: "eid208", tween: [ "subproperty", "${_bet_4}", "textShadow.offsetH", '3px', { fromValue: '3px'}], position: 0, duration: 0 },
            { id: "eid209", tween: [ "subproperty", "${_bet_4}", "textShadow.offsetV", '3px', { fromValue: '3px'}], position: 0, duration: 0 },
            { id: "eid214", tween: [ "subproperty", "${_bet_5}", "textShadow.offsetV", '3px', { fromValue: '3px'}], position: 0, duration: 0 },
            { id: "eid263", tween: [ "style", "${_yellow_bet}", "left", '283px', { fromValue: '283px'}], position: 1000, duration: 0 },
            { id: "eid199", tween: [ "subproperty", "${_bet_3}", "textShadow.blur", '3px', { fromValue: '3px'}], position: 0, duration: 0 },
            { id: "eid184", tween: [ "style", "${_treasure_box_1}", "left", '18.74%', { fromValue: '18.74%'}], position: 0, duration: 0 },
            { id: "eid23", tween: [ "style", "${_treasure_box_1}", "left", '18.75%', { fromValue: '18.74%'}], position: 1000, duration: 0, easing: "easeInQuart" },
            { id: "eid196", tween: [ "subproperty", "${_bet_2}", "textShadow.color", 'rgba(178,149,118,1.00)', { fromValue: 'rgba(178,149,118,1.00)'}], position: 0, duration: 0 },
            { id: "eid58", tween: [ "style", "${_bet_3}", "height", '6.17%', { fromValue: '6.17%'}], position: 1000, duration: 0 },
            { id: "eid183", tween: [ "style", "${_treasure_box_1}", "top", '4.01%', { fromValue: '4.01%'}], position: 0, duration: 0 },
            { id: "eid19", tween: [ "style", "${_treasure_box_1}", "top", '4%', { fromValue: '4.01%'}], position: 1000, duration: 0, easing: "easeInQuart" },
            { id: "eid63", tween: [ "color", "${_bet_4}", "color", 'rgba(255,255,255,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(255,255,255,1.00)'}], position: 1000, duration: 0 },
            { id: "eid243", tween: [ "style", "${_bet_5}", "top", '83.5%', { fromValue: '83.5%'}], position: 0, duration: 0 },
            { id: "eid244", tween: [ "style", "${_bet_5}", "top", '83.5%', { fromValue: '83.5%'}], position: 1000, duration: 0 },
            { id: "eid68", tween: [ "style", "${_bet_5}", "font-size", '175%', { fromValue: '175%'}], position: 1000, duration: 0 },
            { id: "eid70", tween: [ "color", "${_bet_5}", "color", 'rgba(255,255,255,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(255,255,255,1.00)'}], position: 1000, duration: 0 },
            { id: "eid56", tween: [ "style", "${_bet_3}", "width", '10.34%', { fromValue: '10.34%'}], position: 1000, duration: 0 },
            { id: "eid284", tween: [ "style", "${_treasure_box_2}", "right", '18.75%', { fromValue: '18.75%'}], position: 1000, duration: 0 },
            { id: "eid60", tween: [ "style", "${_bet_3}", "font-size", '175%', { fromValue: '175%'}], position: 1000, duration: 0 },
            { id: "eid241", tween: [ "style", "${_bet_4}", "top", '83.5%', { fromValue: '83.5%'}], position: 0, duration: 0 },
            { id: "eid242", tween: [ "style", "${_bet_4}", "top", '83.5%', { fromValue: '83.5%'}], position: 1000, duration: 0 },
            { id: "eid288", tween: [ "style", "${_treasure_box_2}", "top", '4.16%', { fromValue: '4.16%'}], position: 1000, duration: 0 },
            { id: "eid62", tween: [ "style", "${_bet_4}", "font-size", '175%', { fromValue: '175%'}], position: 1000, duration: 0 },
            { id: "eid156", tween: [ "style", "${_treasure_box_1}", "height", '54.33%', { fromValue: '54.33%'}], position: 1000, duration: 0 },
            { id: "eid289", tween: [ "gradient", "${_Stage}", "background-image", [270,[['rgba(255,255,255,0)',0],['rgba(255,255,255,0)',100]]], { fromValue: [270,[['rgba(255,255,255,0)',0],['rgba(255,255,255,0)',100]]]}], position: 1000, duration: 0 },
            { id: "eid64", tween: [ "style", "${_bet_4}", "height", '6.17%', { fromValue: '6.17%'}], position: 1000, duration: 0 },
            { id: "eid206", tween: [ "subproperty", "${_bet_4}", "textShadow.color", 'rgba(178,149,118,1.00)', { fromValue: 'rgba(178,149,118,1.00)'}], position: 0, duration: 0 },
            { id: "eid57", tween: [ "color", "${_bet_3}", "color", 'rgba(255,255,255,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(255,255,255,1.00)'}], position: 1000, duration: 0 },
            { id: "eid201", tween: [ "subproperty", "${_bet_3}", "textShadow.offsetH", '3px', { fromValue: '3px'}], position: 0, duration: 0 },
            { id: "eid65", tween: [ "style", "${_bet_4}", "left", '60.52%', { fromValue: '60.52%'}], position: 1000, duration: 0 },
            { id: "eid54", tween: [ "style", "${_bet_2}", "width", '10.34%', { fromValue: '10.34%'}], position: 1000, duration: 0 },
            { id: "eid72", tween: [ "style", "${_bet_5}", "width", '10.33%', { fromValue: '10.33%'}], position: 1000, duration: 0 },
            { id: "eid190", tween: [ "style", "${_bet_5}", "left", '70.93%', { fromValue: '70.94%'}], position: 500, duration: 500 },
            { id: "eid197", tween: [ "subproperty", "${_bet_3}", "textShadow.color", 'rgba(178,149,118,1.00)', { fromValue: 'rgba(178,149,118,1.00)'}], position: 0, duration: 0 },
            { id: "eid66", tween: [ "style", "${_bet_4}", "width", '10.34%', { fromValue: '10.34%'}], position: 1000, duration: 0 },
            { id: "eid213", tween: [ "subproperty", "${_bet_5}", "textShadow.blur", '3px', { fromValue: '3px'}], position: 0, duration: 0 },
            { id: "eid207", tween: [ "subproperty", "${_bet_5}", "textShadow.color", 'rgba(178,149,118,1.00)', { fromValue: 'rgba(178,149,118,1.00)'}], position: 0, duration: 0 },
            { id: "eid205", tween: [ "subproperty", "${_bet_3}", "textShadow.offsetV", '3px', { fromValue: '3px'}], position: 0, duration: 0 },
            { id: "eid7", trigger: [ function executeSymbolFunction(e, data) { this._executeSymbolAction(e, data); }, ['stop', '${_treasure_box_2}', ['close_chest'] ], ""], position: 1000 },
            { id: "eid8", trigger: [ function executeSymbolFunction(e, data) { this._executeSymbolAction(e, data); }, ['stop', '${_treasure_box_1}', ['close_chest'] ], ""], position: 1000 },
            { id: "eid262", trigger: [ function executeSymbolFunction(e, data) { this._executeSymbolAction(e, data); }, ['stop', '${_yellow_bet}', ['normal'] ], ""], position: 1000 }         ]
      }
   }
},
"treasure_box_1": {
   version: "2.0.1",
   minimumCompatibleVersion: "2.0.0",
   build: "2.0.1.268",
   baseState: "Base State",
   initialState: "Base State",
   gpuAccelerate: false,
   resizeInstances: false,
   content: {
   dom: [
   {
      id: 'chest_spritesheet2',
      type: 'image',
      rect: ['-97.8%','39.1%','195.6%','60.9%','auto','auto'],
      fill: ['rgba(0,0,0,0)','images/chest_spritesheet2.png','0px','0px']
   },
   {
      rect: ['9.2%','70.8%','81.2%','6.2%','auto','auto'],
      id: 'lose-ticket3',
      type: 'image',
      display: 'none',
      fill: ['rgba(0,0,0,0)','images/lose-ticket.png','0px','0px']
   },
   {
      rect: ['9.2%','70.5%','81.2%','5.9%','auto','auto'],
      id: 'ticket3',
      type: 'image',
      display: 'none',
      fill: ['rgba(0,0,0,0)','images/ticket.png','0px','0px']
   }],
   symbolInstances: [
   ]
   },
   states: {
      "Base State": {
         "${_ticket3}": [
            ["style", "height", '5.85%'],
            ["style", "top", '70.46%'],
            ["style", "left", '9.21%'],
            ["style", "display", 'none']
         ],
         "${_chest_spritesheet2}": [
            ["style", "top", '39.07%'],
            ["style", "opacity", '1'],
            ["style", "left", '-97.81%']
         ],
         "${_lose-ticket3}": [
            ["style", "height", '7.08%'],
            ["style", "top", '69.84%'],
            ["style", "left", '9.21%'],
            ["style", "display", 'none']
         ],
         "${symbolSelector}": [
            ["style", "min-width", '228px'],
            ["style", "overflow", 'hidden'],
            ["style", "height", '54.17%'],
            ["style", "max-width", '228px'],
            ["style", "width", '23.75%']
         ]
      }
   },
   timelines: {
      "Default Timeline": {
         fromState: "Base State",
         toState: "",
         duration: 5000,
         autoPlay: false,
         labels: {
            "close_chest": 5,
            "open_chest": 1750,
            "stop_open_chest": 2000,
            "you_lose": 2500,
            "stop_you_lose": 3500,
            "you_win": 4000,
            "stop_you_win": 5000
         },
         timeline: [
            { id: "eid174", tween: [ "style", "${_ticket3}", "height", '34.46%', { fromValue: '5.85%'}], position: 4000, duration: 1000 },
            { id: "eid175", tween: [ "style", "${_ticket3}", "top", '41.84%', { fromValue: '70.46%'}], position: 4000, duration: 1000 },
            { id: "eid176", tween: [ "style", "${_ticket3}", "display", 'none', { fromValue: 'none'}], position: 0, duration: 0 },
            { id: "eid177", tween: [ "style", "${_ticket3}", "display", 'block', { fromValue: 'none'}], position: 4000, duration: 0 },
            { id: "eid226", tween: [ "style", "${_chest_spritesheet2}", "left", '-97.81%', { fromValue: '-97.81%'}], position: 0, duration: 0 },
            { id: "eid227", tween: [ "style", "${_chest_spritesheet2}", "left", '2.19%', { fromValue: '-97.81%'}], position: 1750, duration: 0 },
            { id: "eid162", tween: [ "style", "${_lose-ticket3}", "display", 'none', { fromValue: 'none'}], position: 0, duration: 0 },
            { id: "eid161", tween: [ "style", "${_lose-ticket3}", "display", 'block', { fromValue: 'none'}], position: 2500, duration: 0 },
            { id: "eid173", tween: [ "style", "${_lose-ticket3}", "display", 'block', { fromValue: 'block'}], position: 3000, duration: 0 },
            { id: "eid273", tween: [ "style", "${_lose-ticket3}", "display", 'block', { fromValue: 'block'}], position: 3500, duration: 0 },
            { id: "eid271", tween: [ "style", "${_chest_spritesheet2}", "opacity", '0.85', { fromValue: '1'}], position: 0, duration: 250 },
            { id: "eid276", tween: [ "style", "${_chest_spritesheet2}", "opacity", '0.75', { fromValue: '0.85'}], position: 250, duration: 500 },
            { id: "eid272", tween: [ "style", "${_chest_spritesheet2}", "opacity", '0.65', { fromValue: '0.75'}], position: 750, duration: 500 },
            { id: "eid277", tween: [ "style", "${_chest_spritesheet2}", "opacity", '1', { fromValue: '0.65'}], position: 1250, duration: 500 },
            { id: "eid160", tween: [ "style", "${_lose-ticket3}", "top", '41.54%', { fromValue: '69.84%'}], position: 2500, duration: 1000 },
            { id: "eid231", tween: [ "style", "${_chest_spritesheet2}", "top", '39.07%', { fromValue: '39.07%'}], position: 1750, duration: 0 },
            { id: "eid158", tween: [ "style", "${_lose-ticket3}", "height", '35.38%', { fromValue: '7.08%'}], position: 2500, duration: 1000 }         ]
      }
   }
},
"treasure_box_2": {
   version: "2.0.1",
   minimumCompatibleVersion: "2.0.0",
   build: "2.0.1.268",
   baseState: "Base State",
   initialState: "Base State",
   gpuAccelerate: false,
   resizeInstances: false,
   content: {
   dom: [
   {
      id: 'chest_spritesheet2',
      type: 'image',
      rect: ['-97.8%','39.1%','195.6%','60.9%','auto','auto'],
      fill: ['rgba(0,0,0,0)','images/chest_spritesheet2.png','0px','0px']
   },
   {
      type: 'image',
      display: 'none',
      rect: ['9.2%','70.8%','81.2%','6.2%','auto','auto'],
      id: 'lose-ticket3',
      fill: ['rgba(0,0,0,0)','images/lose-ticket.png','0px','0px']
   },
   {
      type: 'image',
      display: 'none',
      rect: ['9.2%','70.5%','81.2%','5.9%','auto','auto'],
      id: 'ticket3',
      fill: ['rgba(0,0,0,0)','images/ticket.png','0px','0px']
   }],
   symbolInstances: [
   ]
   },
   states: {
      "Base State": {
         "${_ticket3}": [
            ["style", "height", '5.85%'],
            ["style", "top", '70.46%'],
            ["style", "left", '9.21%'],
            ["style", "display", 'none']
         ],
         "${_chest_spritesheet2}": [
            ["style", "top", '39.07%'],
            ["style", "opacity", '1'],
            ["style", "left", '-97.81%']
         ],
         "${_lose-ticket3}": [
            ["style", "height", '7.08%'],
            ["style", "top", '69.84%'],
            ["style", "left", '9.21%'],
            ["style", "display", 'none']
         ],
         "${symbolSelector}": [
            ["style", "min-width", '228px'],
            ["style", "overflow", 'hidden'],
            ["style", "height", '54.17%'],
            ["style", "max-width", '228px'],
            ["style", "width", '23.75%']
         ]
      }
   },
   timelines: {
      "Default Timeline": {
         fromState: "Base State",
         toState: "",
         duration: 5000,
         autoPlay: false,
         labels: {
            "close_chest": 5,
            "open_chest": 1750,
            "stop_open_chest": 2000,
            "you_lose": 2500,
            "stop_you_lose": 3500,
            "you_win": 4000,
            "stop_you_win": 5000
         },
         timeline: [
            { id: "eid174", tween: [ "style", "${_ticket3}", "height", '34.46%', { fromValue: '5.85%'}], position: 4000, duration: 1000 },
            { id: "eid175", tween: [ "style", "${_ticket3}", "top", '41.84%', { fromValue: '70.46%'}], position: 4000, duration: 1000 },
            { id: "eid176", tween: [ "style", "${_ticket3}", "display", 'none', { fromValue: 'none'}], position: 0, duration: 0 },
            { id: "eid177", tween: [ "style", "${_ticket3}", "display", 'block', { fromValue: 'none'}], position: 4000, duration: 0 },
            { id: "eid226", tween: [ "style", "${_chest_spritesheet2}", "left", '-97.81%', { fromValue: '-97.81%'}], position: 0, duration: 0 },
            { id: "eid227", tween: [ "style", "${_chest_spritesheet2}", "left", '2.19%', { fromValue: '-97.81%'}], position: 1750, duration: 0 },
            { id: "eid162", tween: [ "style", "${_lose-ticket3}", "display", 'none', { fromValue: 'none'}], position: 0, duration: 0 },
            { id: "eid161", tween: [ "style", "${_lose-ticket3}", "display", 'block', { fromValue: 'none'}], position: 2500, duration: 0 },
            { id: "eid173", tween: [ "style", "${_lose-ticket3}", "display", 'block', { fromValue: 'block'}], position: 3000, duration: 0 },
            { id: "eid273", tween: [ "style", "${_lose-ticket3}", "display", 'block', { fromValue: 'block'}], position: 3500, duration: 0 },
            { id: "eid271", tween: [ "style", "${_chest_spritesheet2}", "opacity", '0.85', { fromValue: '1'}], position: 0, duration: 250 },
            { id: "eid276", tween: [ "style", "${_chest_spritesheet2}", "opacity", '0.75', { fromValue: '0.85'}], position: 250, duration: 500 },
            { id: "eid272", tween: [ "style", "${_chest_spritesheet2}", "opacity", '0.65', { fromValue: '0.75'}], position: 750, duration: 500 },
            { id: "eid277", tween: [ "style", "${_chest_spritesheet2}", "opacity", '1', { fromValue: '0.65'}], position: 1250, duration: 500 },
            { id: "eid160", tween: [ "style", "${_lose-ticket3}", "top", '41.54%', { fromValue: '69.84%'}], position: 2500, duration: 1000 },
            { id: "eid231", tween: [ "style", "${_chest_spritesheet2}", "top", '39.07%', { fromValue: '39.07%'}], position: 1750, duration: 0 },
            { id: "eid158", tween: [ "style", "${_lose-ticket3}", "height", '35.38%', { fromValue: '7.08%'}], position: 2500, duration: 1000 }         ]
      }
   }
},
"yellow_bet": {
   version: "2.0.1",
   minimumCompatibleVersion: "2.0.0",
   build: "2.0.1.268",
   baseState: "Base State",
   initialState: "Base State",
   gpuAccelerate: false,
   resizeInstances: false,
   content: {
   dom: [
   {
      rect: ['-257px','-319px','97%','31.2%','auto','auto'],
      font: ['asul, sans-serif',[137.5,'%'],'rgba(0,0,0,1)','700','none','normal'],
      textShadow: ['rgba(0,0,0,0.648438)',3,3,3],
      align: 'center',
      id: 'bet_1',
      text: '20',
      cursor: ['default'],
      type: 'text'
   },
   {
      rect: ['-102px','0px','200px','89px','auto','auto'],
      id: 'yellow_key_sprite2',
      type: 'image',
      cursor: ['pointer'],
      fill: ['rgba(0,0,0,0)','images/yellow_key_sprite.png','0px','0px']
   }],
   symbolInstances: [
   ]
   },
   states: {
      "Base State": {
         "${_bet_1}": [
            ["color", "color", 'rgba(255,255,255,1.00)'],
            ["style", "opacity", '1'],
            ["style", "cursor", 'default'],
            ["style", "word-spacing", '0em'],
            ["subproperty", "textShadow.blur", '3px'],
            ["subproperty", "textShadow.offsetH", '4px'],
            ["style", "font-weight", '700'],
            ["style", "font-size", '175%'],
            ["style", "letter-spacing", '0em'],
            ["style", "width", '100.03%'],
            ["style", "top", '89px'],
            ["subproperty", "textShadow.color", 'rgba(178,149,118,1.00)'],
            ["style", "text-align", 'center'],
            ["style", "text-indent", '0%'],
            ["style", "height", '30.47%'],
            ["style", "font-family", 'asul, sans-serif'],
            ["subproperty", "textShadow.offsetV", '1px'],
            ["style", "left", '0px']
         ],
         "${_yellow_key_sprite2}": [
            ["style", "top", '0px'],
            ["style", "left", '0px'],
            ["style", "cursor", 'pointer']
         ],
         "${symbolSelector}": [
            ["style", "height", '128px'],
            ["style", "overflow", 'hidden'],
            ["style", "width", '98px']
         ]
      }
   },
   timelines: {
      "Default Timeline": {
         fromState: "Base State",
         toState: "",
         duration: 1000,
         autoPlay: true,
         labels: {
            "normal": 0,
            "stop_normal": 250,
            "hover": 500,
            "clicked": 1000
         },
         timeline: [
            { id: "eid266", tween: [ "style", "${_yellow_key_sprite2}", "top", '0px', { fromValue: '0px'}], position: 0, duration: 0 },
            { id: "eid73", tween: [ "subproperty", "${_bet_1}", "textShadow.offsetH", '4px', { fromValue: '4px'}], position: 500, duration: 0 },
            { id: "eid235", tween: [ "style", "${_bet_1}", "top", '89px', { fromValue: '89px'}], position: 0, duration: 0 },
            { id: "eid236", tween: [ "style", "${_bet_1}", "top", '89px', { fromValue: '89px'}], position: 500, duration: 0 },
            { id: "eid195", tween: [ "subproperty", "${_bet_1}", "textShadow.color", 'rgba(178,149,118,1.00)', { fromValue: 'rgba(178,149,118,1.00)'}], position: 0, duration: 0 },
            { id: "eid74", tween: [ "subproperty", "${_bet_1}", "textShadow.offsetV", '1px', { fromValue: '1px'}], position: 500, duration: 0 },
            { id: "eid268", tween: [ "color", "${_bet_1}", "color", 'rgba(255,255,255,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(255,255,255,1.00)'}], position: 0, duration: 0 },
            { id: "eid37", tween: [ "color", "${_bet_1}", "color", 'rgba(255,255,255,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(255,255,255,1.00)'}], position: 500, duration: 0 },
            { id: "eid269", tween: [ "color", "${_bet_1}", "color", 'rgba(255,223,0,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(255,255,255,1.00)'}], position: 1000, duration: 0 },
            { id: "eid39", tween: [ "style", "${_bet_1}", "height", '30.47%', { fromValue: '30.47%'}], position: 500, duration: 0 },
            { id: "eid38", tween: [ "style", "${_bet_1}", "font-size", '175%', { fromValue: '175%'}], position: 500, duration: 0 },
            { id: "eid40", tween: [ "style", "${_bet_1}", "width", '100.03%', { fromValue: '100.03%'}], position: 500, duration: 0 },
            { id: "eid265", tween: [ "style", "${_yellow_key_sprite2}", "left", '0px', { fromValue: '0px'}], position: 0, duration: 0 },
            { id: "eid267", tween: [ "style", "${_yellow_key_sprite2}", "left", '-102px', { fromValue: '0px'}], position: 1000, duration: 0 },
            { id: "eid247", tween: [ "style", "${_bet_1}", "left", '0px', { fromValue: '0px'}], position: 0, duration: 0 },
            { id: "eid248", tween: [ "style", "${_bet_1}", "left", '0px', { fromValue: '0px'}], position: 500, duration: 0 }         ]
      }
   }
}
};


Edge.registerCompositionDefn(compId, symbols, fonts, resources);

/**
 * Adobe Edge DOM Ready Event Handler
 */
$(window).ready(function() {
     Edge.launchComposition(compId);
});
})(jQuery, AdobeEdge, "EDGE-14851457");
