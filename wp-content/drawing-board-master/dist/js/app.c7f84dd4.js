(function(t){function e(e){for(var i,a,s=e[0],c=e[1],l=e[2],h=0,d=[];h<s.length;h++)a=s[h],Object.prototype.hasOwnProperty.call(o,a)&&o[a]&&d.push(o[a][0]),o[a]=0;for(i in c)Object.prototype.hasOwnProperty.call(c,i)&&(t[i]=c[i]);u&&u(e);while(d.length)d.shift()();return r.push.apply(r,l||[]),n()}function n(){for(var t,e=0;e<r.length;e++){for(var n=r[e],i=!0,a=1;a<n.length;a++){var c=n[a];0!==o[c]&&(i=!1)}i&&(r.splice(e--,1),t=s(s.s=n[0]))}return t}var i={},o={app:0},r=[];function a(t){return s.p+"js/"+({about:"about"}[t]||t)+"."+{about:"0a91be1e"}[t]+".js"}function s(e){if(i[e])return i[e].exports;var n=i[e]={i:e,l:!1,exports:{}};return t[e].call(n.exports,n,n.exports,s),n.l=!0,n.exports}s.e=function(t){var e=[],n=o[t];if(0!==n)if(n)e.push(n[2]);else{var i=new Promise((function(e,i){n=o[t]=[e,i]}));e.push(n[2]=i);var r,c=document.createElement("script");c.charset="utf-8",c.timeout=120,s.nc&&c.setAttribute("nonce",s.nc),c.src=a(t);var l=new Error;r=function(e){c.onerror=c.onload=null,clearTimeout(h);var n=o[t];if(0!==n){if(n){var i=e&&("load"===e.type?"missing":e.type),r=e&&e.target&&e.target.src;l.message="Loading chunk "+t+" failed.\n("+i+": "+r+")",l.name="ChunkLoadError",l.type=i,l.request=r,n[1](l)}o[t]=void 0}};var h=setTimeout((function(){r({type:"timeout",target:c})}),12e4);c.onerror=c.onload=r,document.head.appendChild(c)}return Promise.all(e)},s.m=t,s.c=i,s.d=function(t,e,n){s.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:n})},s.r=function(t){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},s.t=function(t,e){if(1&e&&(t=s(t)),8&e)return t;if(4&e&&"object"===typeof t&&t&&t.__esModule)return t;var n=Object.create(null);if(s.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var i in t)s.d(n,i,function(e){return t[e]}.bind(null,i));return n},s.n=function(t){var e=t&&t.__esModule?function(){return t["default"]}:function(){return t};return s.d(e,"a",e),e},s.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},s.p="",s.oe=function(t){throw console.error(t),t};var c=window["webpackJsonp"]=window["webpackJsonp"]||[],l=c.push.bind(c);c.push=e,c=c.slice();for(var h=0;h<c.length;h++)e(c[h]);var u=l;r.push([0,"chunk-vendors"]),n()})({0:function(t,e,n){t.exports=n("56d7")},"034f":function(t,e,n){"use strict";var i=n("64a9"),o=n.n(i);o.a},"03d1":function(t,e,n){"use strict";var i=n("67c2"),o=n.n(i);o.a},"174d":function(t,e,n){},"21bb":function(t,e,n){"use strict";var i=n("7a98"),o=n.n(i);o.a},2922:function(t,e,n){"use strict";var i=n("a8d1"),o=n.n(i);o.a},"56d7":function(t,e,n){"use strict";n.r(e);n("cadf"),n("551c"),n("f751"),n("097d");var i=n("2b0e"),o=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{attrs:{id:"app"}},[n("router-view")],1)},r=[],a={name:"app"},s=a,c=(n("034f"),n("2877")),l=Object(c["a"])(s,o,r,!1,null,null,null),h=l.exports,u=n("8c4f"),d=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"home"},[n("my-header",{on:{coverageCont:t.coverageCont}}),n("main",[n("my-left",{on:{changePenType:t.changePenType}}),n("my-canvas"),n("my-right",{attrs:{nowColor:t.ctxColor,ctxSize:t.ctxSize,nowCoverage:t.nowCoverage},on:{changeColor:t.changeColor,changeSize:t.changeSize}})],1),t._m(0)],1)},p=[function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"img-box",staticStyle:{display:"none"}},[n("input",{attrs:{type:"file",id:"imageGo",accept:"image/*"}}),n("img",{attrs:{src:"http://curtaintan.club/headImg/1549358122065.jpg",alt:"",id:"imgEle"}})])}],f=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"home-header"},[n("div",{staticClass:"control-box"},[n("ButtonGroup",t._l(t.lists,(function(e,i){return n("Button",{key:i,attrs:{type:"primary"},on:{click:function(e){return t.myclick(i)}}},[t._v("\n                "+t._s(e)+"\n            ")])})),1)],1)])},g=[],x={data:function(){return{lists:["图层上移","图层下移","图层置顶","图层置底","删除图层","下载图层"]}},methods:{myclick:function(t){console.log(t),this.$emit("coverageCont",t)}}},w=x,v=(n("2922"),Object(c["a"])(w,f,g,!1,null,null,null)),m=v.exports,y=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"home-left"},[n("ButtonGroup",{attrs:{vertical:""}},t._l(t.icons,(function(e,i){return n("Button",{key:i,attrs:{title:t.title[i],size:"large",type:t.nowType===i?"primary":"default"},on:{click:function(e){return t.changeType(i)}}},[n("Icon",{class:"iconfont "+e,attrs:{size:"22"}})],1)})),1)],1)},b=[],C={data:function(){return{icons:["icon-shubiao","icon-pen","icon-line1","icon-arrow-right","icon-juxing","icon-wenzi","icon-tupian1","icon-caijian","icon-down-load","icon-clear2","icon-undo1","icon-redo2"],title:["鼠标模式","画笔模式","直线","箭头","矩形","文字","插入图片","截图","下载","清空画布","撤销","前进"],nowType:1}},methods:{changeType:function(t){t<6&&(this.nowType=t),this.$emit("changePenType",this.icons[t])}}},T=C,k=(n("03d1"),Object(c["a"])(T,y,b,!1,null,null,null)),_=k.exports,j=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"home-right"},[n("h2",[t._v("辅助栏")]),n("div",{staticClass:"my-color-box"},[n("Divider",{attrs:{orientation:"left"}},[t._v("画笔参数")]),n("div",{staticClass:"now-color"},[n("span",[t._v("当前颜色：")]),n("div",{staticClass:"dot-color",style:"background-color:"+t.nowColor})]),t._m(0),n("div",{staticClass:"default-color-box"},t._l(t.colors,(function(e,i){return n("div",{key:i,class:t.nowColorIndex===i?"color-item action":"color-item",style:"background-color:"+e,on:{click:function(e){return t.changColor(i)}}})})),0),n("div",{staticClass:"ui-select"},[n("span",[t._v("颜色选择器：")]),n("ColorPicker",{attrs:{editable:"",alpha:"",hue:""},on:{"on-change":t.setColor},model:{value:t.color1,callback:function(e){t.color1=e},expression:"color1"}})],1),n("div",{staticClass:"size-box"},[n("span",[t._v("画笔大小：")]),n("Slider",{attrs:{max:t.sizeMax,min:t.sizeMin},on:{"on-change":t.changeSize},model:{value:t.size,callback:function(e){t.size=e},expression:"size"}})],1)],1),n("div",{staticClass:"card-contentbox"},[n("Divider",{attrs:{orientation:"left"}},[t._v("图层")]),t._m(1)],1)])},P=[function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"title-text"},[n("span",[t._v("颜色选择：")])])},function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"top-canvas-box"},[n("canvas",{attrs:{id:"tcan"}})])}],z=(n("ac6a"),n("c5f6"),{props:{nowColor:{type:String,default:"#000"},ctxSize:{type:Number,default:5},nowCoverage:{type:Object|Array,default:null}},data:function(){return{color1:"rgba(25, 190,107, .5)",size:10,color2:"",sizeMax:20,sizeMin:0,ctx2:null,colors:["#000","#2c3e50","#8e44ad","#3498db","#2ecc71","#f39c12","#16a085","#e74c3c"]}},watch:{nowCoverage:function(t){var e=this;if(t)if(Array.isArray(t)){console.log("是数组");var n=t[0].toDataURL();fabric.Image.fromURL(n,(function(t){t.scale(.5),e.ctx2.add(t)}))}else{this.ctx2.clear();n=t.toDataURL();fabric.Image.fromURL(n,(function(t){var n=t.width<100?1:240/t.width,i=t.height<50?1:120/t.height,o=n>i?i:n;t.scale(o),console.log(t);var r=t.width>240?20:(240-t.width*o)/2,a=t.height>120?15:(120-t.height*o)/2;t.set({left:r,top:a}),e.ctx2.add(t)}))}}},computed:{nowColorIndex:function(){var t=this,e=-2;return this.colors.forEach((function(n,i){n===t.nowColor&&(e=i)})),e}},methods:{changColor:function(t){this.$emit("changeColor",this.colors[t])},setColor:function(t){this.$emit("changeColor",t)},changeSize:function(t){this.$emit("changeSize",t)}},mounted:function(){tcan.parentNode;tcan.width=280,tcan.height=150,this.ctx2=new fabric.Canvas("tcan")}}),S=z,F=(n("bd5e"),Object(c["a"])(S,j,P,!1,null,null,null)),O=F.exports,D=function(){var t=this,e=t.$createElement;t._self._c;return t._m(0)},M=[function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"canvas-box"},[n("canvas",{attrs:{id:"can"}})])}],E=(n("c675"),{}),B=Object(c["a"])(E,D,M,!1,null,null,null),I=B.exports,$={name:"home",data:function(){return{ctx:null,isDrawing:!1,ctxColor:"#16a085",ctxSize:6,penType:"pen",history:[],step:-1,nowCoverage:null,textBox:null,drawingObject:null,drawPointer:{x:0,y:0}}},components:{myHeader:m,myLeft:_,myRight:O,myCanvas:I},methods:{changeColor:function(t){this.ctxColor=t,this.ctx.freeDrawingBrush.color=t},changeSize:function(t){this.ctxSize=parseInt(t),this.ctx.freeDrawingBrush.width=parseInt(t)},coverageCont:function(t){0===parseInt(t)&&this.nowCoverage&&this.nowCoverage.bringForward(),1===parseInt(t)&&this.nowCoverage&&this.nowCoverage.sendBackwards(),2===parseInt(t)&&this.nowCoverage&&this.nowCoverage.bringToFront(),3===parseInt(t)&&this.nowCoverage&&this.nowCoverage.sendToBack(),4===parseInt(t)&&this.nowCoverage&&(console.log(this.nowCoverage),this.ctx.remove(this.nowCoverage),this.nowCoverage=null),5===parseInt(t)&&this.nowCoverage&&this.nowCoverage.bringForward()},changePenType:function(t){switch(t){case"icon-shubiao":this.shubiaoFun();break;case"icon-pen":this.penFun();break;case"icon-line1":this.lineFun();break;case"icon-arrow-right":this.arrowFun();break;case"icon-juxing":this.junxingFun();break;case"icon-clear2":this.clear();break;case"icon-wenzi":this.textFun();break;case"icon-tupian1":this.picFun();break;case"icon-undo1":this.undo();break;case"icon-redo2":this.redo();break}this.textBox&&(this.textBox.exitEditing(),this.textBox=null)},shubiaoFun:function(){this.ctx.isDrawingMode=!1,this.penType="shubiao",this.ctx.skipTargetFind=!1},penFun:function(){this.ctx.isDrawingMode=!0,this.penType="pen"},lineFun:function(){this.penType="line",this.ctx.skipTargetFind=!0,this.ctx.selection=!1,this.ctx.isDrawingMode=!1},arrowFun:function(){this.penType="arrow",this.ctx.skipTargetFind=!0,this.ctx.selection=!1,this.ctx.isDrawingMode=!1},junxingFun:function(){this.penType="juxing",this.ctx.skipTargetFind=!0,this.ctx.selection=!1,this.ctx.isDrawingMode=!1},clear:function(){this.ctx.clear(),this.step=0,this.history.length=1},textFun:function(){this.ctx.isDrawingMode=!1,this.ctx.skipTargetFind=!0,this.penType="text"},picFun:function(){imageGo.click()},undo:function(){this.step>0?this.renderHistory(--this.step):this.$Notice.open({title:"提示",desc:"这是最开始的画布，不能再撤销了. "})},redo:function(){this.step+1<this.history.length?this.renderHistory(++this.step):this.$Notice.open({title:"提示",desc:"这是最新的画布，不能再前进了. "})},createText:function(t){this.textBox=new fabric.Textbox("",{left:t.pointer.x,width:150,top:t.pointer.y,borderColor:"#2c2c2c",fill:this.ctxColor,fontSize:2*this.ctxSize,hasControls:!1}),this.ctx.add(this.textBox),this.textBox.enterEditing(),this.textBox.hiddenTextarea.focus()},addHistory:function(){this.history.push(this.ctx.toDatalessObject()),this.step++},renderHistory:function(t){this.ctx.loadFromDatalessJSON(this.history[t])},mouseDownFun:function(t){this.step+1!==this.history.length&&(this.history.length=this.step+1),"pen"===this.penType&&(this.isDrawing=!0),"shubiao"===this.penType&&t.target&&(this.nowCoverage=this.ctx.getActiveObject(),console.log("分组选1111")),"text"===this.penType&&this.createText(t),"line"!==this.penType&&"arrow"!==this.penType&&"juxing"!==this.penType||(this.isDrawing=!0,this.drawPointer.x=t.pointer.x,this.drawPointer.y=t.pointer.y)},mouseUpFun:function(t){console.log("画笔抬起"),this.drawingObject&&(this.ctx.add(this.drawingObject),this.drawingObject=null),this.isDrawing&&this.addHistory(),this.isDrawing=!1,this.drawingObject=null},drawingFun:function(t){if(this.isDrawing){this.drawingObject&&this.ctx.remove(this.drawingObject);var e=null;if("line"===this.penType&&(console.log("现在的步数",this.step),e=new fabric.Line([this.drawPointer.x,this.drawPointer.y,t.pointer.x,t.pointer.y],{stroke:this.ctxColor,strokeWidth:this.ctxSize})),"arrow"===this.penType&&(console.log("箭头模式"),e=new fabric.Path(this.drawArrow(this.drawPointer.x,this.drawPointer.y,t.pointer.x,t.pointer.y,30,30),{stroke:this.ctxColor,fill:"rgba(255,255,255,0)",strokeWidth:this.ctxSize})),"juxing"===this.penType){var n="M "+this.drawPointer.x+" "+this.drawPointer.y+" L "+t.pointer.x+" "+this.drawPointer.y+" L "+t.pointer.x+" "+t.pointer.y+" L "+this.drawPointer.x+" "+t.pointer.y+" L "+this.drawPointer.x+" "+this.drawPointer.y+" z";e=new fabric.Path(n,{left:this.drawPointer.x,top:this.drawPointer.y,stroke:this.ctxColor,strokeWidth:this.ctxSize,fill:"rgba(255, 255, 255, 0)"})}e&&(this.ctx.add(e),this.drawingObject=e)}},selectionGroup:function(t){console.log("分组选中"),console.log(t),this.nowCoverage=t.selected},drawArrow:function(t,e,n,i,o,r){o="undefined"!=typeof o?o:30,r="undefined"!=typeof o?r:10;var a=180*Math.atan2(e-i,t-n)/Math.PI,s=(a+o)*Math.PI/180,c=(a-o)*Math.PI/180,l=r*Math.cos(s),h=r*Math.sin(s),u=r*Math.cos(c),d=r*Math.sin(c),p=t-l,f=e-h,g=" M "+t+" "+e;return g+=" L "+n+" "+i,p=n+l,f=i+h,g+=" M "+p+" "+f,g+=" L "+n+" "+i,p=n+u,f=i+d,g+=" L "+p+" "+f,g}},mounted:function(){var t=this,e=can.parentNode;can.width=e.clientWidth,can.height=e.clientHeight,this.ctx=new fabric.Canvas("can"),this.ctx.isDrawingMode=!0,this.ctx.freeDrawingBrush.color=this.ctxColor,this.ctx.freeDrawingBrush.width=this.ctxSize,this.ctx.preserveObjectStacking=!0,this.addHistory(),this.ctx.on("mouse:down",this.mouseDownFun),this.ctx.on("object:modified",(function(){t.addHistory()})),this.ctx.on("mouse:up",this.mouseUpFun),this.ctx.on("mouse:move",this.drawingFun),this.ctx.on("selection:created",this.selectionGroup),console.dir(imgEle),imageGo.addEventListener("change",(function(e){console.log("触发上传文件事件了，"),console.log(e);var n=imageGo.files,i=new FileReader;n&&n[0]&&(i.onload=function(e){imgEle.src=e.target.result,console.dir(imgEle),setTimeout((function(){fabric.Image.fromURL(imgEle.currentSrc,(function(e){e.set({left:100,top:100,centeredScaling:!0,cornerSize:7,cornerColor:"#9cb8ee",transparentCorners:!1}),e.scaleToWidth(300),e.scaleToHeight(200),t.ctx.add(e),t.addHistory()}))}),0)},i.readAsDataURL(n[0]))}))}},L=$,H=(n("21bb"),Object(c["a"])(L,d,p,!1,null,null,null)),G=H.exports;i["a"].use(u["a"]);var A=new u["a"]({base:"",routes:[{path:"/",name:"home",component:G},{path:"/about",name:"about",component:function(){return n.e("about").then(n.bind(null,"f820"))}}]}),R=n("a8ee"),U=n("d531"),N=n("f69c"),W=n("dd4b"),J=n("7d1f"),q=n("d3b2"),K=n("c4f3"),Q=n("01f8");n("dcad");i["a"].component("Button",Q["a"]),i["a"].component("ButtonGroup",K["a"]),i["a"].component("Icon",q["a"]),i["a"].component("Tooltip",J["a"]),i["a"].component("ColorPicker",W["a"]),i["a"].component("Divider",N["a"]),i["a"].component("Slider",U["a"]),i["a"].prototype.$Notice=R["a"],i["a"].config.productionTip=!1,new i["a"]({router:A,render:function(t){return t(h)}}).$mount("#app")},"64a9":function(t,e,n){},"67c2":function(t,e,n){},"7a98":function(t,e,n){},a8d1:function(t,e,n){},bd5e:function(t,e,n){"use strict";var i=n("174d"),o=n.n(i);o.a},c1e5:function(t,e,n){},c675:function(t,e,n){"use strict";var i=n("c1e5"),o=n.n(i);o.a}});