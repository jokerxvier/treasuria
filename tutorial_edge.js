
(function($,Edge,compId){var _=null,y=true,n=false,x82='ellipse',x87='rgb(0, 0, 0)',x2='2.0.1',x55='45px',cl='clip',e23='${_Text_5}',x56='Text5',x118='Text_7',x129='Text_8',x4='2.0.1.268',i='none',x45='rect(@@0@@px @@1@@px @@2@@px @@3@@px)',x68='Text_4',e29='${_Text_8}',x59='653px',x11='rgba(255,255,255,1)',e63='${_Text6}',e12='${_Stage}',x10='rgba(0,0,0,0.65)',x8='stage',x47='916px',c='color',x126='Text14',e132='${_Text14}',e65='${_Text4}',x58='0',x84='164px',e77='${_Text9}',e69='${_Text7}',x9='pointer',x62='Text_3',e43='${symbolSelector}',e18='${_market}',e19='${_Rectangle}',x39='38px',x52='Text4',x93='start_button',x111='919px',ql='linear',x20='rgba(199,154,115,0.7891)',x48='Text3',e44='${_Text2}',b='block',e22='${_start_button}',x40='Text2',a='Base State',x1='asul, sans-serif',x13='hidden',e119='${_Text10}',dt='Default Timeline',e30='${_Text_7}',d='display',e24='${_Text_2}',e130='${_Text13}',x128='38',e51='${_Text3}',x72='Text9',x42='Text_1',x74='46px',x7='rgba(199,154,115,0.79)',x124='Text13',x54='1px',x85='70px',x122='Text12',x120='Text11',bg='background-color',x112='31px',x37='auto',e17='${_Text_1_0}',x116='Text10',x115='35px',x113='Text_6',tp='top',x86='Ellipse4',e46='${_Text}',ov='overflow',x110='rect(0px 310.6666259765625px 31px 0px)',x108='Text_1_2',x91='25px',x106='rect(0px 910.857177734375px 32px 0px)',x104='Text_1_1',x76='Text_5',x5='rgba(0,0,0,0)',e15='${_Text_1_22}',x3='2.0.0',x88='rgba(217,186,160,0.69)',g='image',x60='Text6',x50='Text_2',e14='${_Text_1_1}',x101='play',x107='918px',x38='2px',x92='7px',e25='${_Text_3}',e26='${_play}',x97='pause',m='rect',x35='0px',x21='rgba(128,103,81,0.83)',h='height',x96='rgba(255,255,255,0.65)',e31='${_pause}',e32='${_Text_1}',fs='font-size',s='style',x89='rgba(61,54,38,1.00)',e133='${_Text11}',e27='${_Text_6}',x100='34px',e64='${_Text5}',x36='917px',lf='left',e16='${_replay}',e94='${_Ellipse4}',e28='${_Text_4}',x83='50%',x81='Text_1_0',l='normal',xc='rgba(0,0,0,1)',x99='replay',x33='Text',e78='${_Text8}',w='width',x70='Text8',e131='${_Text12}',x='text',ff='font-family',x66='Text7';var im='images/';var g6='market.jpg';var s61="and the other will be consumed by the key’s magic.\"",s57="other. For any two chests you have, you can only open one,",s73="treasure. Of course, if the chest you chose was empty, then there would be",s109="\"That makes sense, I guess.\"",s125="There is no limit to how many rounds you can play as long as you have keys to open",s90="PLAY",s105="\"Me? Oh! Alright! I have these treasure chests I want to open. Can you help?\"",s71="\"Each key has a different value. The higher the value, the more it will multiply your",s127="chests.\"",s121="Click open before those 60 seconds are up to open that during that round.",s114="\"To open a chest, click on a key you are going to use and a chest you want to open.",s49="\"That’s exactly what I need!\"",s67="\"I have to choose carefully then.\"",s98="REPLAY",s80="cabinets, even treasure chests! You there! Yes, you!",s102="It seems that you are in need of something. Come over and check out ",s117="Each round only lasts 60 seconds.",s53="\"A word of caution, to you dear one: you can open any chests, for the cost of the",s103="what we have!",s41="Even multiply the amount of gold inside it!\"",s95="PAUSE",s79="\"Step right up! I have all you need to open all sorts of things. Drawers,",s34="\"I have just what you need. These are magical keys. They can open any treasure chests.",s75="nothing for you, worse, loss to the current treasure you have.\"",s123="Another round immediately starts after.";var fonts={};fonts[x1]='<script src=\"http://use.edgefonts.net/asul:n4,n7:all.js\"></script>';var P=Edge.P,T=Edge.T,A=Edge.A;var resources=[];var symbols={"stage":{v:x2,mv:x3,b:x4,bS:a,iS:a,gpu:n,rI:n,cn:{dom:[{id:'market',v:i,t:g,r:['0px','-49px','960px','682px','auto','auto'],f:[x5,im+g6,'0px','0px']},{id:'Rectangle',v:i,t:m,r:['16px','480px','932px','99px','auto','auto'],f:[x7],s:[0,xc,i],boxShadow:["",3,3,0,0,"rgba(0,0,0,0.65)"]},{id:'Text_1_0',v:i,t:m,r:['23','492','auto','auto','auto','auto']},{id:'Text_1_1',v:i,t:m,r:['23','492','auto','auto','auto','auto']},{id:'Text_1_22',v:i,t:m,r:['23','492','auto','auto','auto','auto']},{id:'Text_1',v:i,t:m,r:['23','492','auto','auto','auto','auto']},{id:'Text_2',v:i,t:m,r:['23','492','auto','auto','auto','auto']},{id:'Text_3',v:i,t:m,r:['22','492','auto','auto','auto','auto']},{id:'Text_4',v:i,t:m,r:['23','492','auto','auto','auto','auto']},{id:'Text_5',v:i,t:m,r:['22','491','auto','auto','auto','auto']},{id:'Text_6',v:i,t:m,r:['23','492','auto','auto','auto','auto']},{id:'Text_7',v:i,t:m,r:['23','492','auto','auto','auto','auto']},{id:'Text_8',v:i,t:m,r:['23','492','auto','auto','auto','auto']},{id:'start_button',t:m,r:['399','357','auto','auto','auto','auto'],cu:['pointer']},{id:'play',v:i,t:m,r:['774','582','auto','auto','auto','auto'],cu:['pointer']},{id:'replay',v:i,t:m,r:['887','582','auto','auto','auto','auto'],cu:['pointer']},{id:'pause',v:i,t:m,r:['825','582','auto','auto','auto','auto'],cu:['pointer']}],sI:[{id:'Text_6',sN:'Text_6'},{id:'Text_1_22',sN:'Text_1_2'},{id:'start_button',sN:'start_button'},{id:'Text_2',sN:'Text_2'},{id:'pause',sN:'pause'},{id:'Text_1_1',sN:'Text_1_1'},{id:'Text_1',sN:'Text_1'},{id:'replay',sN:'replay'},{id:'Text_3',sN:'Text_3'},{id:'Text_4',sN:'Text_4'},{id:'Text_8',sN:'Text_8'},{id:'Text_7',sN:'Text_7'},{id:'Text_5',sN:'Text_5'},{id:'play',sN:'play'},{id:'Text_1_0',sN:'Text_1_0'}]},s:{},tl:{"Default Timeline":{fS:a,tS:"",d:105000,a:n,l:{"start":1250},tt:[{id:"eid36",tr:[function(e,d){this.eSA(e,d);},['stop','${_Text_1}',[]],""],p:0},{id:"eid290",tr:[function(e,d){this.eSA(e,d);},['stop','${_Text_8}',[]],""],p:0},{id:"eid138",tr:[function(e,d){this.eSA(e,d);},['play','${_start_button}',[]],""],p:0},{id:"eid70",tr:[function(e,d){this.eSA(e,d);},['stop','${_Text_3}',[]],""],p:0},{id:"eid46",tr:[function(e,d){this.eSA(e,d);},['stop','${_Text_2}',[]],""],p:0},{id:"eid100",tr:[function(e,d){this.eSA(e,d);},['stop','${_Text_5}',[]],""],p:0},{id:"eid132",tr:[function(e,d){this.eSA(e,d);},['stop','${_Text_1_0}',[0]],""],p:0},{id:"eid89",tr:[function(e,d){this.eSA(e,d);},['stop','${_Text_4}',[]],""],p:0},{id:"eid270",tr:[function(e,d){this.eSA(e,d);},['stop','${_Text_7}',[]],""],p:0},{id:"eid250",tr:[function(e,d){this.eSA(e,d);},['stop','${_Text_6}',[]],""],p:0},{id:"eid169",tr:[function(e,d){this.eSA(e,d);},['stop','${_replay}',[]],""],p:0},{id:"eid176",tr:[function(e,d){this.eSA(e,d);},['stop','${_Text_1_1}',[]],""],p:0},{id:"eid215",tr:[function(e,d){this.eSA(e,d);},['stop','${_Text_1_22}',[]],""],p:0},{id:"eid133",tr:[function(e,d){this.eSA(e,d);},['play','${_Text_1_0}',[]],""],p:1250},{id:"eid177",tr:[function(e,d){this.eSA(e,d);},['play','${_Text_1_1}',[]],""],p:12250},{id:"eid216",tr:[function(e,d){this.eSA(e,d);},['play','${_Text_1_22}',[]],""],p:19000},{id:"eid37",tr:[function(e,d){this.eSA(e,d);},['play','${_Text_1}',[]],""],p:28026.736018801},{id:"eid47",tr:[function(e,d){this.eSA(e,d);},['play','${_Text_2}',[]],""],p:39026.736018801},{id:"eid71",tr:[function(e,d){this.eSA(e,d);},['play','${_Text_3}',[]],""],p:42026.736018801},{id:"eid90",tr:[function(e,d){this.eSA(e,d);},['play','${_Text_4}',[]],""],p:56026.736018801},{id:"eid101",tr:[function(e,d){this.eSA(e,d);},['play','${_Text_5}',[]],""],p:60026.736018801},{id:"eid251",tr:[function(e,d){this.eSA(e,d);},['play','${_Text_6}',[]],""],p:78000},{id:"eid271",tr:[function(e,d){this.eSA(e,d);},['play','${_Text_7}',[]],""],p:81000},{id:"eid291",tr:[function(e,d){this.eSA(e,d);},['play','${_Text_8}',[]],""],p:93000},{id:"eid170",tr:[function(e,d){this.eSA(e,d);},['play','${_replay}',[]],""],p:105000}]}}},"Text_1":{v:x2,mv:x3,b:x4,bS:a,iS:a,gpu:n,rI:n,cn:{dom:[{t:x,id:x33,text:s34,r:[x35,x35,x36,x37,x37,x37],n:[x1,24,xc,l,i,'']},{t:x,r:[x38,x39,x36,x37,x37,x37],id:x40,text:s41,align:lf,n:[x1,24,xc,l,i,l]}],sI:[]},s:{},tl:{"Default Timeline":{fS:a,tS:"",d:9250,a:y,tt:[]}}},"Text_2":{v:x2,mv:x3,b:x4,bS:a,iS:a,gpu:n,rI:n,cn:{dom:[{t:x,r:[x35,x35,x47,x37,x37,x37],id:x48,text:s49,align:lf,n:[x1,24,xc,l,i,l]}],sI:[]},s:{},tl:{"Default Timeline":{fS:a,tS:"",d:1250,a:y,tt:[]}}},"Text_3":{v:x2,mv:x3,b:x4,bS:a,iS:a,gpu:n,rI:n,cn:{dom:[{r:[x35,x35,x47,x37,x37,x37],n:[x1,24,xc,l,i,l],id:x52,text:s53,align:lf,t:x},{r:[x54,x55,x47,x37,x37,x37],n:[x1,24,xc,l,i,l],align:lf,id:x56,text:s57,v:i,t:x},{r:[x58,x58,x59,x37,x37,x37],n:[x1,24,xc,l,i,l],align:lf,id:x60,text:s61,v:i,t:x}],sI:[]},s:{},tl:{"Default Timeline":{fS:a,tS:"",d:12000,a:y,tt:[]}}},"Text_4":{v:x2,mv:x3,b:x4,bS:a,iS:a,gpu:n,rI:n,cn:{dom:[{t:x,r:[x35,x35,x36,x37,x37,x37],id:x66,text:s67,align:lf,n:[x1,24,xc,l,i,l]}],sI:[]},s:{},tl:{"Default Timeline":{fS:a,tS:"",d:1750,a:y,tt:[]}}},"Text_5":{v:x2,mv:x3,b:x4,bS:a,iS:a,gpu:n,rI:n,cn:{dom:[{n:[x1,24,xc,l,i,l],t:x,id:x70,text:s71,align:lf,r:[x35,x35,x47,x37,x37,x37]},{n:[x1,24,xc,l,i,l],t:x,id:x72,text:s73,align:lf,r:[x54,x74,x47,x37,x37,x37]},{n:[x1,24,xc,l,i,l],t:x,v:i,id:x66,text:s75,align:lf,r:[x58,x58,x37,x37,x37,x37]}],sI:[]},s:{},tl:{"Default Timeline":{fS:a,tS:"",d:15000,a:y,tt:[]}}},"Text_1_0":{v:x2,mv:x3,b:x4,bS:a,iS:a,gpu:n,rI:n,cn:{dom:[{n:[x1,26,xc,l,i,''],t:x,id:x33,text:s79,v:i,r:[x35,x35,x47,x37,x37,x37]},{n:[x1,26,xc,l,i,l],t:x,v:i,id:x40,text:s80,align:lf,r:[x35,x55,x37,x37,x37,x37]}],sI:[]},s:{},tl:{"Default Timeline":{fS:a,tS:"",d:8500,a:y,tt:[]}}},"start_button":{v:x2,mv:x3,b:x4,bS:a,iS:a,gpu:n,rI:n,cn:{dom:[{t:x82,br:[x83,x83,x83,x83],r:[x35,x35,x84,x85,x37,x37],id:x86,s:[0,x87,i],cu:[x9],f:[x88]},{n:[x1,50,x89,l,i,l],t:x,align:lf,id:x66,text:s90,cu:[x9],r:[x91,x92,x37,x37,x37,x37]}],sI:[]},s:{},tl:{"Default Timeline":{fS:a,tS:"",d:0,a:y,tt:[]}}},"pause":{v:x2,mv:x3,b:x4,bS:a,iS:a,gpu:n,rI:n,cn:{dom:[{r:[x35,x35,x37,x37,x37,x37],n:[x1,16,xc,l,i,l],align:lf,id:x60,text:s95,textShadow:[x96,1,1,0],t:x}],sI:[]},s:{},tl:{"Default Timeline":{fS:a,tS:"",d:0,a:y,tt:[]}}},"replay":{v:x2,mv:x3,b:x4,bS:a,iS:a,gpu:n,rI:n,cn:{dom:[{r:[x35,x35,x37,x37,x37,x37],n:[x1,16,xc,l,i,l],align:lf,id:x56,text:s98,textShadow:[x96,1,1,0],t:x}],sI:[]},s:{},tl:{"Default Timeline":{fS:a,tS:"",d:0,a:y,tt:[]}}},"play":{v:x2,mv:x3,b:x4,bS:a,iS:a,gpu:n,rI:n,cn:{dom:[{r:[x35,x35,x100,x37,x37,x37],n:[x1,16,xc,l,i,l],align:lf,id:x52,text:s90,textShadow:[x96,1,1,0],t:x}],sI:[]},s:{},tl:{"Default Timeline":{fS:a,tS:"",d:0,a:y,tt:[]}}},"Text_1_1":{v:x2,mv:x3,b:x4,bS:a,iS:a,gpu:n,rI:n,cn:{dom:[{n:[x1,26,xc,l,i,l],t:x,id:x48,text:s102,align:lf,r:[x35,x35,x36,x37,x37,x37]},{n:[x1,26,xc,l,i,l],t:x,v:i,id:x52,text:s103,align:lf,r:[x35,x55,x36,x37,x37,x37]}],sI:[]},s:{},tl:{"Default Timeline":{fS:a,tS:"",d:4500,a:y,tt:[]}}},"Text_1_2":{v:x2,mv:x3,b:x4,bS:a,iS:a,gpu:n,rI:n,cn:{dom:[{n:[x1,26,xc,l,i,l],t:x,align:lf,id:x56,text:s105,cl:[x106],r:[x35,x35,x107,x37,x37,x37]}],sI:[]},s:{},tl:{"Default Timeline":{fS:a,tS:"",d:5000,a:y,tt:[]}}},"Text_6":{v:x2,mv:x3,b:x4,bS:a,iS:a,gpu:n,rI:n,cn:{dom:[{n:[x1,24,xc,l,i,l],t:x,align:lf,id:x70,text:s109,cl:[x110],r:[x35,x35,x111,x112,x37,x37]}],sI:[]},s:{},tl:{"Default Timeline":{fS:a,tS:"",d:1750,a:y,tt:[]}}},"Text_7":{v:x2,mv:x3,b:x4,bS:a,iS:a,gpu:n,rI:n,cn:{dom:[{n:[x1,24,xc,l,i,l],t:x,id:x72,text:s114,align:lf,r:[x35,x35,x47,x115,x37,x37]},{n:[x1,24,xc,l,i,l],t:x,v:i,id:x116,text:s117,align:lf,r:[x35,x55,x47,x115,x37,x37]}],sI:[]},s:{},tl:{"Default Timeline":{fS:a,tS:"",d:7000,a:y,tt:[]}}},"Text_8":{v:x2,mv:x3,b:x4,bS:a,iS:a,gpu:n,rI:n,cn:{dom:[{n:[x1,24,xc,l,i,l],t:x,id:x120,text:s121,align:lf,r:[x35,x35,x36,x112,x37,x37]},{n:[x1,24,xc,l,i,l],t:x,v:i,id:x122,text:s123,align:lf,r:[x35,x55,x36,x112,x37,x37]},{n:[x1,24,xc,l,i,l],t:x,v:i,id:x124,text:s125,align:lf,r:[x58,x58,x37,x37,x37,x37]},{n:[x1,24,xc,l,i,l],t:x,v:i,id:x126,text:s127,align:lf,r:[x58,x128,x37,x37,x37,x37]}],sI:[]},s:{},tl:{"Default Timeline":{fS:a,tS:"",d:10886,a:y,tt:[]}}}};var S1=symbols[x8];var tl0=S1.tl[dt].tt,st1=S1.s[a]={},A1=A(_,tl0,st1);A1.A(e12).P(bg,x11,c).P(w,960).P(h,600).P(ov,x13);A1.A(e14).P(d,i).T(0,i).T(12.25,b).T(19,i);A1.A(e15).P(d,i).T(0,i).T(19,b).T(28.027,i);A1.A(e16).P("cursor",x9).P(d,i).T(0,i).T(105,b);A1.A(e17).P(d,i).T(0,i).T(1.25,b).T(12.25,i);A1.A(e18).P(tp,-49).P(lf,0).P(d,i).T(0,i).T(1.25,b);A1.A(e19).P("boxShadow.blur",0,"subproperty").P("boxShadow.color",x10,"subproperty").P("boxShadow.offsetV",3,"subproperty").P("boxShadow.offsetH",3,"subproperty").P(bg,x7,c).T(0,x20,_,_,x20).T(1.25,x21).T(19,x7).T(28.027,x21).T(39.027,x7).T(42.027,x21).T(56.027,x7).T(60.027,x21).T(78,x7).T(81,x21).P(d,i).T(0,i).T(1.25,b).P(h,99).T(0,99).P(tp,480).T(0,480).P(lf,12).T(0,12).P(w,936).T(0,936);A1.A(e22).P("cursor",x9).P(d,b).T(0,b).T(1.25,i);A1.A(e23).P(d,i).T(0,i).T(60.027,b).T(78,i);A1.A(e24).P(d,i).T(0,i).T(39.027,b).T(42.027,i);A1.A(e25).P(d,i).T(0,i).T(42.027,b).T(56.027,i);A1.A(e26).P("cursor",x9).P(lf,887).T(0.037,887).P(d,i).T(0,i);A1.A(e27).P(d,i).T(0,i).T(78,b).T(81,i);A1.A(e28).P(d,i).T(0,i).T(56.027,b).T(60.027,i);A1.A(e29).P(d,i).T(0,i).T(93,b);A1.A(e30).P(d,i).T(0,i).T(81,b).T(93,i);A1.A(e31).P("cursor",x9).P(lf,887).P(d,i).T(0,i).T(7.5,b).T(12.25,i).T(16.215,b).T(19,i).T(23.931,b).T(28.027,i).T(36.343,b).T(39.027,i).T(40,b).T(42.027,i).T(52.5,b).T(56.027,i).T(57.5,b).T(60.027,i).T(74.028,b).T(78,i).T(78.949,b).T(81,i).T(87.5,b).T(93,i);A1.A(e32).P(d,i).T(0,i).T(28.027,b).T(39.027,i);var S2=symbols[x42];var tl1=S2.tl[dt].tt,st2=S2.s[a]={},A2=A(_,tl1,st2);A2.A(e43).P(h,67).P(w,919);A2.A(e44).P(tp,38).P(lf,2).P(w,917).P(cl,[0,917,29,0],_,x45).T(0,[0,18.1904296875,29,0],6.5,ql).T(6.5,[0,477.71435546875,29,0],2.75).P(d,b).T(0,i).T(6.5,b);A2.A(e46).P(tp,0).P(ff,x1).P(lf,0).P(w,917).P(d,b).T(0,b).P(cl,[0,12.2379150390625,29,0],_,x45).T(0,[0,286.6427001953125,29,0],1.25,ql).T(1.25,[0,289.5791931152344,29,0],0.5).T(1.75,[0,537.494140625,29,0],1.25).T(3,[0,538.5991821289062,29,0],0.75).T(3.75,[0,915.809326171875,29,0],1.75);var S3=symbols[x50];var tl2=S3.tl[dt].tt,st3=S3.s[a]={},A3=A(_,tl2,st3);A3.A(e43).P(h,29).P(w,916);A3.A(e51).P(tp,0).P(lf,0).P(w,916).P(cl,[0,16,29,0],_,x45).T(0,[0,310.0477294921875,29,0],1.25,ql);var S4=symbols[x62];var tl3=S4.tl[dt].tt,st4=S4.s[a]={},A4=A(_,tl3,st4);A4.A(e43).P(h,74).P(w,917);A4.A(e63).P(w,653).P(d,i).T(0,i).T(9.305,b).P(cl,[0,653,29,0],_,x45).T(0,[0,16.0953369140625,29,0],9.305,ql).T(9.305,[0,579.190673828125,29,0],2.695);A4.A(e64).P(tp,45).P(lf,1).P(w,916).P(d,i).T(0,i).T(5.25,b).T(9.305,i).P(cl,[0,916,29,0],_,x45).T(0,[0,12.4285888671875,29,0],5.25,ql).T(5.25,[0,66.73583984375,29,0],0.331).T(5.581,[0,70.63603973388672,29,0],0.256).T(5.837,[0,372.19061279296875,29,0],1.163).T(7,[0,371.7145080566406,29,0],0.5).T(7.5,[0,620.76220703125,29,0],1);A4.A(e65).P(tp,0).P(lf,0).P(w,916).P(d,b).T(0,b).T(9.305,i).P(cl,[0,8.857177734375,29,0],_,x45).T(0,[0,382.463134765625,29,0],2.25,ql).T(2.25,[0,383.7117919921875,29,0],0.5).T(2.75,[0,916,29,0],2.5);var S5=symbols[x68];var tl4=S5.tl[dt].tt,st5=S5.s[a]={},A5=A(_,tl4,st5);A5.A(e43).P(h,29).P(w,917);A5.A(e69).P(tp,0).P(lf,0).P(w,917).P(d,b).T(0,b).P(cl,[0,14.6190185546875,29,0],_,x45).T(0,[0,359.857177734375,29,0],1.75,ql);var S6=symbols[x76];var tl5=S6.tl[dt].tt,st6=S6.s[a]={},A6=A(_,tl5,st6);A6.A(e43).P(h,75).P(w,917);A6.A(e77).P(tp,46).P(lf,1).P(w,916).P(d,b).T(0,i).T(5.392,b).T(12,i).P(cl,[0,916,29,0],_,x45).T(0,[0,11.2381591796875,29,0],5.392,ql).T(5.392,[0,99.0687255859375,29,0],0.608).T(6,[0,97.40576171875,29,0],0.5).T(6.5,[0,215.4473876953125,29,0],0.75).T(7.25,[0,216.09951782226562,29,0],0.5).T(7.75,[0,570.6737670898438,29,0],1.5).T(9.25,[0,573.6939697265625,29,0],0.5).T(9.75,[0,867.190673828125,29,0],0.75);A6.A(e78).P(tp,0).P(lf,0).P(w,916).P(d,b).T(0,b).T(12,i).P(cl,[0,16,29,0],_,x45).T(0,[0,333.5596923828125,29,0],1,ql).T(1,[0,332.6665954589844,29,0],0.75).T(1.75,[0,556.3062744140625,29,0],1.25).T(3,[0,555.6259765625,29,0],0.5).T(3.5,[0,914.8094482421875,29,0],2);A6.A(e69).P(cl,[0,9.333251953125,29,0],_,x45).T(12,[0,171.23794555664062,29,0],0.75,ql).T(12.75,[0,174.4125518798828,29,0],0.25).T(13,[0,250.4003448486328,29,0],0.25).T(13.25,[0,247.11669921875,29,0],0.264).T(13.514,[0,658.142822265625,29,0],1.486).P(d,i).T(0,i).T(12,b);var S7=symbols[x81];var tl6=S7.tl[dt].tt,st7=S7.s[a]={},A7=A(_,tl6,st7);A7.A(e43).P(h,77).P(w,916);A7.A(e44).P(lf,0).P(tp,45).P(cl,[0,590,32,0],_,x45).T(0.5,[0,6.6666259765625,32,0],5.25,ql).T(5.75,[0,109.2044677734375,32,0],0.363).T(6.113,[0,109.84126281738281,32,0],0.387).T(6.5,[0,362.4205017089844,32,0],0.75).T(7.25,[0,362.48663330078125,32,0],0.25).T(7.5,[0,486.22625732421875,32,0],0.352).T(7.852,[0,487.03662109375,32,0],0.223).T(8.075,[0,588.8094482421875,32,0],0.425).P(d,i).T(0,i).T(0.5,i).T(5.75,b);A7.A(e46).P(tp,0).P(w,916).P(lf,0).P(ff,x1).P(fs,26).P(d,i).T(0,i).T(0.5,b).P(cl,[0,11.2381591796875,32,0],_,x45).T(0.5,[0,176.1190948486328,32,0],0.5,ql).T(1,[0,175.67276000976562,32,0],0.75).T(1.75,[0,704.5586547851562,32,0],2.5).T(4.25,[0,710.2067260742188,32,0],0.5).T(4.75,[0,914.8095703125,32,0],1);var S8=symbols[x93];var tl7=S8.tl[dt].tt,st8=S8.s[a]={},A8=A(_,tl7,st8);A8.A(e94).P(tp,0).P(lf,0).P("cursor",x9).P(bg,x88,c);A8.A(e69).P(tp,7).P(c,x89,c).P("cursor",x9).P(lf,25).P(fs,50);A8.A(e43).P(h,70).P(w,164);var S9=symbols[x97];var tl8=S9.tl[dt].tt,st9=S9.s[a]={},A9=A(_,tl8,st9);A9.A(e63).P("textShadow.blur",0,"subproperty").P("textShadow.offsetH",1,"subproperty").P(tp,0).P("textShadow.offsetV",1,"subproperty").P(lf,0).P("textShadow.color",x96,"subproperty");A9.A(e43).P(h,19).P(w,48);var S10=symbols[x99];var tl9=S10.tl[dt].tt,st10=S10.s[a]={},A10=A(_,tl9,st10);A10.A(e64).P("textShadow.blur",0,"subproperty").P("textShadow.offsetH",1,"subproperty").P(tp,0).P("textShadow.offsetV",1,"subproperty").P(lf,0).P("textShadow.color",x96,"subproperty");A10.A(e43).P(h,19).P(w,54);var S11=symbols[x101];var tl10=S11.tl[dt].tt,st11=S11.s[a]={},A11=A(_,tl10,st11);A11.A(e65).P("textShadow.blur",0,"subproperty").P("textShadow.offsetH",1,"subproperty").P(w,34).P(tp,0).P("textShadow.offsetV",1,"subproperty").P("textShadow.color",x96,"subproperty").P(lf,0).P(fs,16);A11.A(e43).P(h,19).P(w,34);var S12=symbols[x104];var tl11=S12.tl[dt].tt,st12=S12.s[a]={},A12=A(_,tl11,st12);A12.A(e43).P(h,77).P(w,917);A12.A(e51).P(tp,0).P(lf,0).P(w,917).P(cl,[0,7.47607421875,32,0],_,x45).T(0,[0,509.85687255859375,32,0],2,ql).T(2,[0,507.475830078125,32,0],0.5).T(2.5,[0,821.76171875,32,0],1).P(d,b).T(0,b);A12.A(e65).P(tp,45).P(lf,0).P(w,917).P(d,i).T(0,i).T(3.75,b).P(cl,[0,917,32,0],_,x45).T(0,[0,12.2379150390625,32,0],3.75,ql).T(3.75,[0,188.4283447265625,32,0],0.75);var S13=symbols[x108];var tl12=S13.tl[dt].tt,st13=S13.s[a]={},A13=A(_,tl12,st13);A13.A(e43).P(h,32).P(w,918);A13.A(e64).P(tp,0).P(lf,0).P(w,918).P(cl,[0,7.28564453125,32,0],_,x45).T(0,[0,61.415077209472656,32,0],0.178,ql).T(0.178,[0,61.9962158203125,32,0],0.322).T(0.5,[0,113.61568450927734,32,0],0.156).T(0.656,[0,112.63035583496094,32,0],0.344).T(1,[0,202.4385223388672,32,0],0.5).T(1.5,[0,204.65557861328125,32,0],0.25).T(1.75,[0,717.5888671875,32,0],2.422).T(4.172,[0,716.7454833984375,32,0],0.328).T(4.5,[0,916.8095703125,32,0],0.5);var S14=symbols[x113];var tl13=S14.tl[dt].tt,st14=S14.s[a]={},A14=A(_,tl13,st14);A14.A(e43).P(h,31).P(w,919);A14.A(e78).P(tp,0).P(h,31).P(lf,0).P(w,919).P(cl,[0,7.0950927734375,31,0],_,x45).T(0,[0,210.0712890625,31,0],1,ql).T(1,[0,205.45816040039062,31,0],0.25).T(1.25,[0,310.6666259765625,31,0],0.5);var S15=symbols[x118];var tl14=S15.tl[dt].tt,st15=S15.s[a]={},A15=A(_,tl14,st15);A15.A(e43).P(h,80).P(w,916);A15.A(e77).P(tp,0).P(h,35).P(lf,0).P(w,916).P(cl,[0,5.28564453125,35,0],_,x45).T(0,[0,185.16653442382812,35,0],0.75,ql).T(0.75,[0,188.02374267578125,35,0],0.5).T(1.25,[0,543.7515258789062,35,0],1.75).T(3,[0,543.8570556640625,35,0],0.5).T(3.5,[0,874.333251953125,35,0],1.5).P(d,b).T(0,b);A15.A(e119).P(tp,45).P(h,35).P(lf,0).P(w,916).P(d,i).T(0,i).T(5,b).P(cl,[0,916,35,0],_,x45).T(0,[0,12.4285888671875,35,0],5,ql).T(5,[0,373.1429443359375,35,0],2);var S16=symbols[x129];var tl15=S16.tl[dt].tt,st16=S16.s[a]={},A16=A(_,tl15,st16);A16.A(e43).P(h,76).P(w,917);A16.A(e130).P(d,i).T(0,i).T(7.25,b).P(cl,[0,10.0477294921875,29,0],_,x45).T(7.25,[0,869.571533203125,29,0],3,ql);A16.A(e131).P(tp,45).P(h,31).P(lf,0).P(w,917).P(cl,[0,917,31,0],_,x45).T(0,[0,6.28564453125,31,0],4,ql).T(4,[0,430.09521484375,31,0],2).P(d,i).T(0,i).T(4,b).T(7.25,i);A16.A(e132).P(cl,[0,87,29,0],_,x45).T(7.25,[0,8.4285888671875,29,0],3.25,ql).T(10.5,[0,90.5714111328125,29,0],0.386).P(d,i).T(0,i).T(7.25,i).T(10.5,b);A16.A(e133).P(tp,0).P(h,31).P(lf,0).P(w,917).P(cl,[0,8.666748046875,31,0],_,x45).T(0,[0,794.3809814453125,31,0],3.5,ql).P(d,b).T(0,b).T(7.25,i);Edge.registerCompositionDefn(compId,symbols,fonts,resources);$(window).ready(function(){Edge.launchComposition(compId);});})(jQuery,AdobeEdge,"EDGE-26812176");