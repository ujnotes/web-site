var PROJECT_TITLE="Ujnotes";function nowLoading(){var a=document.getElementById("loading");void 0===nowLoading.count?(nowLoading.count=0,resetLoadingText(a),a.setAttribute("style","visibility: visible")):3==nowLoading.count?resetLoadingText(a):(a.innerText+=".",nowLoading.count++)}function beginLoading(){clearTimeout(intrvl);intrvl=setInterval(nowLoading,1E3)}function resetLoadingText(a){a.innerText="Loading"}
function errorLoading(){var a=document.getElementById("loading");a.setAttribute("style","visibility: visible");a.innerText="Error!"}function killLoading(){var a=document.getElementById("loading");nowLoading.count=void 0;a.setAttribute("style","visibility: hidden");clearTimeout(intrvl)}function fbReload(){try{FB.XFBML.parse()}catch(a){}}
function getElementsByClassName(a,g){if(a.getElementsByClassName)return a.getElementsByClassName(g);var j=a;null==j&&(j=document);var d=[],j=j.getElementsByTagName("*"),r=j.length,h=RegExp("(^|\\s)"+g+"(\\s|$)"),v,l;for(l=v=0;v<r;v++)h.test(j[v].className)&&(d[l]=j[v],l++);return d}function supportsSvg(){var a=document.createElement("div");a.innerHTML="<svg/>";return"http://www.w3.org/2000/svg"==(a.firstChild&&a.firstChild.namespaceURI)}
"undefined"!==typeof document&&!("classList"in document.createElement("a"))&&function(a){a=(a.HTMLElement||a.Element).prototype;var g=Object,j=String.prototype.trim||function(){return this.replace(/^\s+|\s+$/g,"")},d=Array.prototype.indexOf||function(a){for(var b=0,d=this.length;b<d;b++)if(b in this&&this[b]===a)return b;return-1},r=function(a,b){this.name=a;this.code=DOMException[a];this.message=b},h=function(a,b){if(""===b)throw new r("SYNTAX_ERR","An invalid or illegal string was specified");if(/\s/.test(b))throw new r("INVALID_CHARACTER_ERR",
"String contains an invalid character");return d.call(a,b)},v=function(a){for(var b=j.call(a.className),b=b?b.split(/\s+/):[],d=0,l=b.length;d<l;d++)this.push(b[d]);this._updateClassName=function(){a.className=this.toString()}},l=v.prototype=[],b=function(){return new v(this)};r.prototype=Error.prototype;l.item=function(a){return this[a]||null};l.contains=function(a){return-1!==h(this,a+"")};l.add=function(a){a+="";-1===h(this,a)&&(this.push(a),this._updateClassName())};l.remove=function(a){a=h(this,
a+"");-1!==a&&(this.splice(a,1),this._updateClassName())};l.toggle=function(a){a+="";-1===h(this,a)?this.add(a):this.remove(a)};l.toString=function(){return this.join(" ")};if(g.defineProperty){l={get:b,enumerable:!0,configurable:!0};try{g.defineProperty(a,"classList",l)}catch(t){-2146823252===t.number&&(l.enumerable=!1,g.defineProperty(a,"classList",l))}}else g.prototype.__defineGetter__&&a.__defineGetter__("classList",b)}(self);
(function(a){function g(a,l){(j(a,l)?r:d)(a,l)}var j,d,r;"classList"in document.documentElement?(j=function(a,d){return a.classList.contains(d)},d=function(a,d){a.classList.add(d)},r=function(a,d){a.classList.remove(d)}):(j=function(a,d){return RegExp("(^|\\s+)"+d+"(\\s+|$)").test(a.className)},d=function(a,d){j(a,d)||(a.className=a.className+" "+d)},r=function(a,d){a.className=a.className.replace(RegExp("(^|\\s+)"+d+"(\\s+|$)")," ")});var h={hasClass:j,addClass:d,removeClass:r,toggleClass:g,has:j,
add:d,remove:r,toggle:g};"function"===typeof define&&define.amd?define(h):"object"===typeof exports?module.exports=h:a.classie=h})(window);
(function(a,g,j,d,r){var h=a.document,v=h.documentElement,l=a.history||{},b=a.location,t=!!l.pushState,Z=t&&l.state===r,x=b.href,w=a.JSON||{},D=Object.defineProperty,E=Object.prototype.__defineGetter__,$=Object.prototype.__defineSetter__,U=l.pushState,V=l.replaceState,I=a.sessionStorage,y=Object.prototype.hasOwnProperty,aa=Object.prototype.toString,J=+((a.eval&&eval("/*@cc_on 1;@*/")&&/msie (\d+)/i.exec(navigator.userAgent)||[])[1]||0),ba=(new Date).getTime(),A=(D||E)&&(!J||8<J)?0:1,n=8>J?h.createElement("iframe"):
j,B,F,G,H="",K=(B="addEventListener",a[B])||(B="attachEvent",H="on",a[B]),ca=(F="removeEventListener",a[F])||(F="detachEvent",a[F]),da=(G="dispatchEvent",a[G])||(G="fireEvent",a[G]),L=[],W=[],P=0,C={onpopstate:L,popstate:L,onhashchange:W,hashchange:W},u=function(){var f,a,b,e={basepath:"/",redirect:0,type:"/"};b=h.getElementsByTagName("SCRIPT");for(f=0;b[f];f++)if(a=/(.*)\/(?:history|spike)(?:-\d\.\d(?:\.\d)?\w?)?(?:\.min)?.js\?(.*)$/i.exec(b[f].src)||f===b.length-1&&2===(a=b[f].src.split("?")).length&&
(a[2]=a[1])&&a){f=0;for(b=a[2].split("&");b[f];)a=b[f++].split("="),e[a[0]]="true"==a[1]?g:"false"==a[1]?j:a[1]||"";e.basepath=e.basepath||"/";break}return e}(),p=function(a){var m,z,e,c,d,k,g,fa=RegExp("^"+u.basepath,"i");return function(q,ia){if(q){if(!t||J){var Y=p(),j=Y._pathname,h=Y._protocol;q=/^(?:[\w0-9]+\:)?\/\//.test(q)?0===q.indexOf("/")?h+q:q:h+"//"+Y._host+(0===q.indexOf("/")?q:0===q.indexOf("?")?j+q:0===q.indexOf("#")?j+Y._search+q:j.replace(/[^\/]+$/g,"")+q)}}else if(q=b.href,!t||ia)q=
b.protocol+"//"+b.host+u.basepath+(q.replace(/^[^#]*/,"")||"#").replace(RegExp("^#[/]?(?:"+u.type+")?"),"");if(m!==q){a.href=m=q;k=a.port;d=a.host;g=a.pathname;if("http:"===a.protocol&&80==k||"https:"===a.protocol&&443==k)d=a.hostname,k="";g=0===g.indexOf("/")?g:"/"+g;z=g+a.search+a.hash;c=g.replace(fa,u.type)+a.search;e=c+a.hash}return{_href:a.protocol+"//"+d+z,_protocol:a.protocol,_host:d,_hostname:a.hostname||b.hostname,_port:k||b.port,_pathname:g,_search:a.search,_hash:a.hash,_relative:z,_nohash:c,
_special:e}}}(h.createElement("a")),s=!A?l:{back:l.back,forward:l.forward,go:l.go,pushState:d,replaceState:d,emulate:!t,toString:function(){return"[object History]"}},M={state:{get:function(){return n&&n.storage||Q()[s.location.href]||d}},length:{get:function(){return l.length}},location:{set:function(f){a.location=f},get:function(){return t?b:R}}},R={assign:function(a){b.assign(t||0!==a.indexOf("#")?a:"#"+p()._nohash+a)},reload:b.reload,replace:function(a){b.replace(t||0!==a.indexOf("#")?a:"#"+p()._nohash+
a)},toString:function(){return this.href}},ha={href:{set:function(a){b.href=a},get:function(){return p()._href}},protocol:{set:function(a){b.protocol=a},get:function(){return b.protocol}},host:{set:function(a){b.host=a},get:function(){return b.host}},hostname:{set:function(a){b.hostname=a},get:function(){return b.hostname}},port:{set:function(a){b.port=a},get:function(){return b.port}},pathname:{set:function(a){b.pathname=a},get:function(){return p()._pathname}},search:{set:function(a){b.search=a},
get:function(){return p()._search}},hash:{set:function(a){a=0===a.indexOf("#")?a:"#"+a;var m=p();n?a!=m._hash&&(s.pushState(d,d,m._nohash+a),X({oldURL:m._href})):b.hash="#"+m._nohash+a},get:function(){return p()._hash}}},S=function(f,m,b){var e=f,c,d=j;if(D||E)for(c in m){if(y.call(m,c))if(E)m[c].get&&E.call(f,c,m[c].get),m[c].set&&$.call(f,c,m[c].set);else if(D)try{D(f,c,m[c])}catch(k){if(b)return j;d=g;break}}else d=g;if(d&&A){b="StaticClass"+ba+A++;e=["Class "+b];"execVB"in a||execScript("Function execVB(c) ExecuteGlobal(c) End Function",
"VBScript");"VBCVal"in a||execScript("Function VBCVal(o,r) If IsObject(o) Then Set r=o Else r=o End If End Function","VBScript");for(c in f)e[e.length]="Public ["+c+"]";y.call(f,"toString")&&(f.propertyIsEnumerable("toString")||(e[e.length]="Public [toString]"),m["(toString)"]={get:function(){return this.toString.call(this)}});for(c in m)y.call(m,c)&&(m[c].get&&(f["get "+c]=m[c].get,e.push("Public [get "+c+"]","Public "+("(toString)"===c?"Default ":"")+"Property Get ["+c+"]","Call VBCVal(me.[get "+
c+"].call(me),["+c+"])","End Property")),m[c].set&&(f["set "+c]=m[c].set,e.push("Public [set "+c+"]","Public Property Let ["+c+"](v)","Call me.[set "+c+"].call(me,v)","End Property","Public Property Set ["+c+"](v)","Call me.[set "+c+"].call(me,v)","End Property")));e.push("End Class","Function "+b+"Factory()","Set "+b+"Factory=New "+b,"End Function");execVB(e.join("\n"));e=a[b+"Factory"]();for(c in f)e[c]=f[c];y.call(f,"toString")&&(e.toString=f.toString)}return e},N=w.stringify||function(a){function m(a){var f=
/[\\\"\u0000-\u001f\u007f-\u009f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,b={"\b":"\\b","\t":"\\t","\n":"\\n","\f":"\\f","\r":"\\r",'"':'\\"',"\\":"\\\\"};f.lastIndex=0;return f.test(a)?'"'+a.replace(f,function(a){var f=b[a];return"string"===typeof f?f:"\\u"+("0000"+a.charCodeAt(0).toString(16)).slice(-4)})+'"':'"'+a+'"'}var b=function(e){var c,d,k;c=(typeof e).charCodeAt(2);if(114===c)e=m(e);else if(109===c)e=isFinite(e)?String(e):"null";else if(111===
c||108===c)e=String(e);else if(106===c)if(e){d=(c="[object Array]"===aa.apply(e))?"[":"{";if(c)for(k=0;k<e.length;k++)d+=(0==k?"":",")+b(e[k]);else for(k in e)y.call(e,k)&&e[k]!==a&&(d+=(1==d.length?"":",")+m(k)+":"+b(e[k]));e=d+(c?"]":"}")}else e="null";else e=a;return e};return b}(),T=function(){var a=w.parse;return function(b){return b?a?a(b):(new Function("return "+b))():d}}(),Q=function(a){return I?a?I.setItem("__hitoryapi__",N(a)):T(I.getItem("__hitoryapi__"))||{}:{}},O=function(f,b,d){var e=
2===f?a.onhashchange:a.onpopstate,c=2===f?"hashchange":"popstate",g=C[c];h.createEvent?(f=h.createEvent("Events"),f.initEvent(c,j,j)):(f=h.createEventObject(),f.type=c);f.state=s.state;f.oldURL=b;f.newURL=d;e&&e.call(a,f);b=0;for(d=g.length;b<d;b++)g[b].call(a,f)},X=function(){var f=a.onpopstate||d,m=a.onhashchange||d,z=0,e=d,c=p(),ea=c._href;c._hash.replace(/^#/,"");var k=function(){if(x&&!(x=0)&&c._relative!==u.basepath)clearInterval(e),setTimeout(O,10)},n=function(a){var f=p();if(P)return ea=f._href,
P=0;var c=a.oldURL||ea;a=ea=a.newURL||f._href;var f=c.replace(/^.*?(#|$)/,""),b=a.replace(/^.*?(#|$)/,"");c!=a&&!z&&O();x=z=0;f!=b&&O(2,c,a)};K(H+"hashchange",n,j);K(H+"popstate",function(){if(x===b.href)return x=0;x=0;O(z=1)},j);s.redirect=function(f,c){u.type=f===r?u.type:f;u.basepath=c===r?u.basepath:c;if(a.top==a.self){var e=p(d,g)._relative,m=b.search,k=b.pathname;c=u.basepath;t?(e!=c&&RegExp("^"+c+"$","i").test(k)&&(b.href=e),RegExp("^"+c+"$","i").test(k+"/")?b.href=c:RegExp("^"+c,"i").test(k)||
(b.href=k.replace(/^\//,c)+m)):k!=c&&(b.href=c+"#"+k.replace(RegExp("^"+c,"i"),u.type)+m+b.hash)}};s=S(s,A?M:l.state===r?{state:M.state,location:M.location}:{location:M.location});R=S(R,ha);a[B]=function(a,f,c,b){C[a]?(C[a].push(f),!t&&L===C[a]&&k()):K(a,f,c,b)};a[F]=function(a,f,c){var b=C[a];if(b)for(a=b.length;--a;){if(b[a]===f){b.splice(a,1);break}}else ca(a,f,c)};a[G]=function(f,c){var b=C[f],e=b===L?a.onpopstate:a.onhashchange;if(b){c=c||("string"==typeof f?a.event:f);try{c&&(c.target=a)}catch(m){try{c.srcElement=
a}catch(d){}}e&&e.call(a,c);for(var e=0,k=b.length;e<k;e++)b[e].call(a,c);return g}return da(f,c)};A&&execScript("Public history, onhashchange","VBScript");if((!D&&!E||!S(a,{onhashchange:{get:function(){return m},set:function(a){m=a||d}},onpopstate:{get:function(){return f},set:function(a){(f=a||d)&&!t&&k()}}},1))&&!t)e=setInterval(function(){a.onpopstate&&k()},100);u.redirect&&s.redirect();if(!t)h[B](H+"click",function(f){var c=f||a.event,b=c.target||c.srcElement;f="defaultPrevented"in c?c.defaultPrevented:
c.returnValue===j;if(b&&("A"===b.nodeName&&!f)&&(f=p(b.getAttribute("href",2),g),f._hash&&"#"!==f._hash&&f._hash===f._href.replace(p()._href.split("#").shift(),""))){history.location.hash=f._hash;f=f._hash.replace(/^#/,"");if((b=h.getElementById(f))&&b.id===f&&"A"===b.nodeName)b=b.getBoundingClientRect(),a.scrollTo(v.scrollLeft||0,b.top+(v.scrollTop||0)-(v.clientTop||0));c.preventDefault?c.preventDefault():c.returnValue=!1}},j);return n}();s.pushState=function(a,m,z,e){var c=Q(),g=p()._href,k=z&&
p(z);x=0;z=k?k._href:g;e&&c[g]&&delete c[g];if((!t||Z)&&I&&a)c[z]=a,Q(c),a=d;U&&V?e?V.call(s,a,m,z):U.call(s,a,m,z):k&&k._relative!=p()._relative&&(P=1,e?b.replace("#"+k._special):b.hash=k._special)};s.replaceState=function(a,b,d){s.pushState(a,b,d,1)};A?(a.history=s,function(f,m){if(n){var d,e,c=function(){var a=p()._href;m!=a&&X({oldURL:m,newURL:m=a})};e=setInterval(c,100);n.src="javascript:true;";n=v.firstChild.appendChild(n).contentWindow;s.pushState=d=function(a,f,g,q,j){var h=n.document,l=["<script>",
"lfirst=1;",,"storage="+N(a)+";","\x3c/script>"];if(g=g&&p(g)){j||clearInterval(e);if(q)n.lfirst?(history.back(),d(a,f,g._href,0,1)):(n.storage=a,b.replace("#"+g._special));else if(g._href!=m||j)n.lfirst||(n.lfirst=1,d(n.storage,f,m,0,1)),l[2]='parent.location.hash="'+g._special.replace(/"/g,'\\"')+'";',h.open(),h.write(l.join("")),h.close();j||(m=p()._href,e=setInterval(c,100))}else n.storage=a};K(H+"unload",function(){if(n.storage){var a={};a[p()._href]=n.storage;h.cookie="_historyAPI="+escape(N(a))}clearInterval(e)},
j);if(1<f.length){f=unescape(f.pop().split(";").shift());try{n.storage=T(f)[p()._href]}catch(g){}}!w.parse&&!w.stringify&&(w.parse=T,w.stringify=N,a.JSON=w)}}(h.cookie.split("_historyAPI="),p()._href)):a.history.emulate=!t})(window,!0,!1,null);var curTab,intrvl=0,gTarget;window.onload=Init;var trackOutboundLink=function(a,g){"undefined"!==typeof ga&&("undefined"!==typeof a&&(a=g),ga("send","event","outbound","click",a,{transport:"beacon",hitCallback:function(){document.location=g}}))};
window.onpopstate=function(a){a.state&&("menu"==a.state.id?activateMenuFn():(LoadCanvas(a.state.id,a.state.title),activateMainFn()))};var menuActive=!1;
function Init(){SetXURL(document);var a=GetHashID(),g=GetURLID(),j=document.querySelector("#canvas-main"),d=document.querySelector(".toggle-push-left"),r=document.querySelectorAll(".XURL");a?(curTab="root",LoadCanvas(document.getElementById(a))):curTab=g?g:"root";"menu"==g?(menuActive=!0,classie.add(d,"active"),j.style.maxHeight=document.querySelector("#nav-menu").scrollHeight+"px"):document.querySelector("#nav-menu").style.maxHeight=j.scrollHeight+"px";!a&&!g&&window.history.replaceState({id:"root"},
"","/");d.addEventListener("click",function(){if(menuActive){if("root"==curTab||"menu"==curTab)curTab="";window.history.pushState({id:curTab},"","/"+curTab);activateMainFn();j.style.maxHeight="99999px";document.querySelector("#nav-menu").style.maxHeight=j.scrollHeight+"px";document.getElementById("path").style.visibility="visible";document.getElementById("title").style.visibility="visible";document.getElementById("updated").style.visibility="visible"}else activateMenuFn()});[].forEach.call(document.getElementsByClassName("coming-soon"),
function(a){a.addEventListener("click",function(){"undefined"!==typeof ga&&ga("send","event",{eventCategory:"download",eventAction:"click"});alert("Hold your breath! Coming soon..")})});[].slice.call(r).forEach(function(a){a.addEventListener("click",function(){curTab=this.getAttribute("data-target");activateMainFn()})});if(!supportsSvg()){a=document.getElementsByClassName("image");d=a.length;for(g=0;g<d;g++)a[g].classList.add("no-svg")}initPageFunction(curTab);return!1}
var initPageFunction=function(a){a=a.replace("/","__");if("function"===typeof window[a])window[a]()},activateMenuFn=function(){document.getElementById("path").style.visibility="hidden";document.getElementById("title").style.visibility="hidden";document.getElementById("updated").style.visibility="hidden";var a=document.querySelector("#nav-menu"),g=document.querySelector("#canvas-main"),j=document.querySelector("#canvas-wrapper"),d=document.querySelector("#menu-button");window.history.pushState({id:"menu"},
"","/menu");classie.add(j,"pml-open");classie.add(d,"active");activeNav="pml-open";g.style.maxHeight=a.scrollHeight+"px";a.style.maxHeight="99999px";menuActive=!0;"undefined"!==typeof ga&&(ga("set","page","/menu"),ga("send","pageview"))},activateMainFn=function(){document.querySelector("#nav-menu");var a=document.querySelector("#canvas-wrapper"),g=document.querySelector("#menu-button");classie.remove(a,"pml-open");classie.remove(g,"active");menuActive=!1};
function GetURLID(){var a=window.location.pathname;return"/"==a?"":a.substring(1)}function GetHashID(){var a=window.location.hash;return 0==a.length?"":a.substring(2)}function SetXURL(a){a=getElementsByClassName(a,"XURL");var g=a.length;for(i=0;i<g;i++)a[i].onclick=LoadCanvasI}function LoadCanvasI(){LoadCanvasH(this);return!1}
function LoadCanvasH(a){var g=a.getAttribute("data-target");URLid="root"==g?"":g;LoadCanvas(g,a.getAttribute("data-title"));window.history.pushState({id:g,title:a.getAttribute("data-title")},"","/"+URLid);"undefined"!==typeof ga&&(ga("set","page","/"+URLid),ga("send","pageview"))}
function LoadCanvas(a,g){"root"==a&&(document.getElementById("path").style.visibility="hidden",document.getElementById("title").style.visibility="hidden");var j=document.getElementById("updated");document.getElementById("canvas-main").innerHTML="";j.style.visibility="hidden";beginLoading();var d=new XMLHttpRequest,d=window.XMLHttpRequest?new XMLHttpRequest:new ActiveXObject("Microsoft.XMLHTTP");d.onreadystatechange=function(){if(4==d.readyState&&a===gTarget){var r=document.getElementById("canvas-main");
switch(d.status){case 200:killLoading();var h=JSON.parse(d.responseText),v=h.xurl,l=h.async,b=PROJECT_TITLE;"root"!=a&&(b+=" - "+g);b+=" : "+h.desc;document.title=b;"root"==a?(document.getElementById("path").innerHTML="&nbsp;",document.getElementById("title").innerHTML=""):(document.getElementById("path").innerHTML=h.path,document.getElementById("title").innerHTML=g);r.innerHTML=h.content;document.getElementById("updated").style.display="block";document.getElementById("date").innerHTML=h.date;""==
!URLid&&(document.getElementById("path").style.visibility="visible",document.getElementById("title").style.visibility="visible");document.getElementById("updated").style.visibility="visible";r=document.getElementById("canvas-main").scrollHeight;document.getElementById("nav-menu").style.maxHeight=r+"px";document.getElementById("canvas-main").style.maxHeight="99999px";j.style.visibility="visible";"1"==v&&SetXURL(document);"1"==l&&initPageFunction(a);fbReload();break;case 404:document.getElementById("updated").style.display=
"none";document.getElementById("date").innerHTML="";r.innerHTML="Error: 404 - Resource not found!";break;case 408:case 501:case 502:document.getElementById("date").innerHTML="",document.getElementById("updated").style.display="none",r.innerHTML="Error!",errorLoading()}}};gTarget=a;d.open("GET","/"+a+".json",!0);d.setRequestHeader("Content-Type","text/plain;charset=UTF-8");d.send()}
(!window.history||!window.history.pushState)&&function(a,g,j,d,r){var h=a.document,v=h.documentElement,l=a.history||{},b=a.location,t=!!l.pushState,Z=t&&l.state===r,x=b.href,w=a.JSON||{},D=Object.defineProperty,E=Object.prototype.__defineGetter__,$=Object.prototype.__defineSetter__,U=l.pushState,V=l.replaceState,I=a.sessionStorage,y=Object.prototype.hasOwnProperty,aa=Object.prototype.toString,J=+((a.eval&&eval("/*@cc_on 1;@*/")&&/msie (\d+)/i.exec(navigator.userAgent)||[])[1]||0),ba=(new Date).getTime(),
A=(D||E)&&(!J||8<J)?0:1,n=8>J?h.createElement("iframe"):j,B,F,G,H="",K=(B="addEventListener",a[B])||(B="attachEvent",H="on",a[B]),ca=(F="removeEventListener",a[F])||(F="detachEvent",a[F]),da=(G="dispatchEvent",a[G])||(G="fireEvent",a[G]),L=[],W=[],P=0,C={onpopstate:L,popstate:L,onhashchange:W,hashchange:W},u=function(){var a,b,d,e={basepath:"/",redirect:0,type:"/"};d=h.getElementsByTagName("SCRIPT");for(a=0;d[a];a++)if(b=/(.*)\/(?:history|spike)(?:-\d\.\d(?:\.\d)?\w?)?(?:\.min)?.js\?(.*)$/i.exec(d[a].src)||
a===d.length-1&&2===(b=d[a].src.split("?")).length&&(b[2]=b[1])&&b){a=0;for(d=b[2].split("&");d[a];)b=d[a++].split("="),e[b[0]]="true"==b[1]?g:"false"==b[1]?j:b[1]||"";e.basepath=e.basepath||"/";break}return e}(),p=function(a){var d,g,e,c,j,k,h,fa=RegExp("^"+u.basepath,"i");return function(q,l){if(q){if(!t||J){var n=p(),r=n._pathname,s=n._protocol;q=/^(?:[\w0-9]+\:)?\/\//.test(q)?0===q.indexOf("/")?s+q:q:s+"//"+n._host+(0===q.indexOf("/")?q:0===q.indexOf("?")?r+q:0===q.indexOf("#")?r+n._search+q:
r.replace(/[^\/]+$/g,"")+q)}}else if(q=b.href,!t||l)q=b.protocol+"//"+b.host+u.basepath+(q.replace(/^[^#]*/,"")||"#").replace(RegExp("^#[/]?(?:"+u.type+")?"),"");if(d!==q){a.href=d=q;k=a.port;j=a.host;h=a.pathname;if("http:"===a.protocol&&80==k||"https:"===a.protocol&&443==k)j=a.hostname,k="";h=0===h.indexOf("/")?h:"/"+h;g=h+a.search+a.hash;c=h.replace(fa,u.type)+a.search;e=c+a.hash}return{_href:a.protocol+"//"+j+g,_protocol:a.protocol,_host:j,_hostname:a.hostname||b.hostname,_port:k||b.port,_pathname:h,
_search:a.search,_hash:a.hash,_relative:g,_nohash:c,_special:e}}}(h.createElement("a")),s=!A?l:{back:l.back,forward:l.forward,go:l.go,pushState:d,replaceState:d,emulate:!t,toString:function(){return"[object History]"}},M={state:{get:function(){return n&&n.storage||Q()[s.location.href]||d}},length:{get:function(){return l.length}},location:{set:function(f){a.location=f},get:function(){return t?b:R}}},R={assign:function(a){b.assign(t||0!==a.indexOf("#")?a:"#"+p()._nohash+a)},reload:b.reload,replace:function(a){b.replace(t||
0!==a.indexOf("#")?a:"#"+p()._nohash+a)},toString:function(){return this.href}},ha={href:{set:function(a){b.href=a},get:function(){return p()._href}},protocol:{set:function(a){b.protocol=a},get:function(){return b.protocol}},host:{set:function(a){b.host=a},get:function(){return b.host}},hostname:{set:function(a){b.hostname=a},get:function(){return b.hostname}},port:{set:function(a){b.port=a},get:function(){return b.port}},pathname:{set:function(a){b.pathname=a},get:function(){return p()._pathname}},
search:{set:function(a){b.search=a},get:function(){return p()._search}},hash:{set:function(a){a=0===a.indexOf("#")?a:"#"+a;var m=p();n?a!=m._hash&&(s.pushState(d,d,m._nohash+a),X({oldURL:m._href})):b.hash="#"+m._nohash+a},get:function(){return p()._hash}}},S=function(b,d,h){var e=b,c,l=j;if(D||E)for(c in d){if(y.call(d,c))if(E)d[c].get&&E.call(b,c,d[c].get),d[c].set&&$.call(b,c,d[c].set);else if(D)try{D(b,c,d[c])}catch(k){if(h)return j;l=g;break}}else l=g;if(l&&A){h="StaticClass"+ba+A++;e=["Class "+
h];"execVB"in a||execScript("Function execVB(c) ExecuteGlobal(c) End Function","VBScript");"VBCVal"in a||execScript("Function VBCVal(o,r) If IsObject(o) Then Set r=o Else r=o End If End Function","VBScript");for(c in b)e[e.length]="Public ["+c+"]";y.call(b,"toString")&&(b.propertyIsEnumerable("toString")||(e[e.length]="Public [toString]"),d["(toString)"]={get:function(){return this.toString.call(this)}});for(c in d)y.call(d,c)&&(d[c].get&&(b["get "+c]=d[c].get,e.push("Public [get "+c+"]","Public "+
("(toString)"===c?"Default ":"")+"Property Get ["+c+"]","Call VBCVal(me.[get "+c+"].call(me),["+c+"])","End Property")),d[c].set&&(b["set "+c]=d[c].set,e.push("Public [set "+c+"]","Public Property Let ["+c+"](v)","Call me.[set "+c+"].call(me,v)","End Property","Public Property Set ["+c+"](v)","Call me.[set "+c+"].call(me,v)","End Property")));e.push("End Class","Function "+h+"Factory()","Set "+h+"Factory=New "+h,"End Function");execVB(e.join("\n"));e=a[h+"Factory"]();for(c in b)e[c]=b[c];y.call(b,
"toString")&&(e.toString=b.toString)}return e},N=w.stringify||function(a){function b(a){var c=/[\\\"\u0000-\u001f\u007f-\u009f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,d={"\b":"\\b","\t":"\\t","\n":"\\n","\f":"\\f","\r":"\\r",'"':'\\"',"\\":"\\\\"};c.lastIndex=0;return c.test(a)?'"'+a.replace(c,function(a){var b=d[a];return"string"===typeof b?b:"\\u"+("0000"+a.charCodeAt(0).toString(16)).slice(-4)})+'"':'"'+a+'"'}var d=function(e){var c,g,k;
c=(typeof e).charCodeAt(2);if(114===c)e=b(e);else if(109===c)e=isFinite(e)?String(e):"null";else if(111===c||108===c)e=String(e);else if(106===c)if(e){g=(c="[object Array]"===aa.apply(e))?"[":"{";if(c)for(k=0;k<e.length;k++)g+=(0==k?"":",")+d(e[k]);else for(k in e)y.call(e,k)&&e[k]!==a&&(g+=(1==g.length?"":",")+b(k)+":"+d(e[k]));e=g+(c?"]":"}")}else e="null";else e=a;return e};return d}(),T=function(){var a=w.parse;return function(b){return b?a?a(b):(new Function("return "+b))():d}}(),Q=function(a){return I?
a?I.setItem("__hitoryapi__",N(a)):T(I.getItem("__hitoryapi__"))||{}:{}},O=function(b,d,g){var e=2===b?a.onhashchange:a.onpopstate,c=2===b?"hashchange":"popstate",l=C[c];h.createEvent?(b=h.createEvent("Events"),b.initEvent(c,j,j)):(b=h.createEventObject(),b.type=c);b.state=s.state;b.oldURL=d;b.newURL=g;e&&e.call(a,b);d=0;for(g=l.length;d<g;d++)l[d].call(a,b)},X=function(){var f=a.onpopstate||d,m=a.onhashchange||d,n=0,e=d,c=p(),w=c._href;c._hash.replace(/^#/,"");var k=function(){if(x&&!(x=0)&&c._relative!==
u.basepath)clearInterval(e),setTimeout(O,10)},y=function(a){var b=p();if(P)return w=b._href,P=0;var c=a.oldURL||w;a=w=a.newURL||b._href;var b=c.replace(/^.*?(#|$)/,""),d=a.replace(/^.*?(#|$)/,"");c!=a&&!n&&O();x=n=0;b!=d&&O(2,c,a)};K(H+"hashchange",y,j);K(H+"popstate",function(){if(x===b.href)return x=0;x=0;O(n=1)},j);s.redirect=function(c,e){u.type=c===r?u.type:c;u.basepath=e===r?u.basepath:e;if(a.top==a.self){var f=p(d,g)._relative,k=b.search,h=b.pathname;e=u.basepath;t?(f!=e&&RegExp("^"+e+"$",
"i").test(h)&&(b.href=f),RegExp("^"+e+"$","i").test(h+"/")?b.href=e:RegExp("^"+e,"i").test(h)||(b.href=h.replace(/^\//,e)+k)):h!=e&&(b.href=e+"#"+h.replace(RegExp("^"+e,"i"),u.type)+k+b.hash)}};s=S(s,A?M:l.state===r?{state:M.state,location:M.location}:{location:M.location});R=S(R,ha);a[B]=function(a,b,c,d){C[a]?(C[a].push(b),!t&&L===C[a]&&k()):K(a,b,c,d)};a[F]=function(a,b,c){var d=C[a];if(d)for(a=d.length;--a;){if(d[a]===b){d.splice(a,1);break}}else ca(a,b,c)};a[G]=function(b,c){var d=C[b],e=d===
L?a.onpopstate:a.onhashchange;if(d){c=c||("string"==typeof b?a.event:b);try{c&&(c.target=a)}catch(f){try{c.srcElement=a}catch(k){}}e&&e.call(a,c);for(var e=0,h=d.length;e<h;e++)d[e].call(a,c);return g}return da(b,c)};A&&execScript("Public history, onhashchange","VBScript");if((!D&&!E||!S(a,{onhashchange:{get:function(){return m},set:function(a){m=a||d}},onpopstate:{get:function(){return f},set:function(a){(f=a||d)&&!t&&k()}}},1))&&!t)e=setInterval(function(){a.onpopstate&&k()},100);u.redirect&&s.redirect();
if(!t)h[B](H+"click",function(b){var c=b||a.event,d=c.target||c.srcElement;b="defaultPrevented"in c?c.defaultPrevented:c.returnValue===j;if(d&&("A"===d.nodeName&&!b)&&(b=p(d.getAttribute("href",2),g),b._hash&&"#"!==b._hash&&b._hash===b._href.replace(p()._href.split("#").shift(),""))){history.location.hash=b._hash;b=b._hash.replace(/^#/,"");if((d=h.getElementById(b))&&d.id===b&&"A"===d.nodeName)d=d.getBoundingClientRect(),a.scrollTo(v.scrollLeft||0,d.top+(v.scrollTop||0)-(v.clientTop||0));c.preventDefault?
c.preventDefault():c.returnValue=!1}},j);return y}();s.pushState=function(a,g,h,e){var c=Q(),j=p()._href,k=h&&p(h);x=0;h=k?k._href:j;e&&c[j]&&delete c[j];if((!t||Z)&&I&&a)c[h]=a,Q(c),a=d;U&&V?e?V.call(s,a,g,h):U.call(s,a,g,h):k&&k._relative!=p()._relative&&(P=1,e?b.replace("#"+k._special):b.hash=k._special)};s.replaceState=function(a,b,d){s.pushState(a,b,d,1)};A?(a.history=s,function(d,g){if(n){var l,e,c=function(){var a=p()._href;g!=a&&X({oldURL:g,newURL:g=a})};e=setInterval(c,100);n.src="javascript:true;";
n=v.firstChild.appendChild(n).contentWindow;s.pushState=l=function(a,d,f,h,j){var r=n.document,s=["<script>","lfirst=1;",,"storage="+N(a)+";","\x3c/script>"];if(f=f&&p(f)){j||clearInterval(e);if(h)n.lfirst?(history.back(),l(a,d,f._href,0,1)):(n.storage=a,b.replace("#"+f._special));else if(f._href!=g||j)n.lfirst||(n.lfirst=1,l(n.storage,d,g,0,1)),s[2]='parent.location.hash="'+f._special.replace(/"/g,'\\"')+'";',r.open(),r.write(s.join("")),r.close();j||(g=p()._href,e=setInterval(c,100))}else n.storage=
a};K(H+"unload",function(){if(n.storage){var a={};a[p()._href]=n.storage;h.cookie="_historyAPI="+escape(N(a))}clearInterval(e)},j);if(1<d.length){d=unescape(d.pop().split(";").shift());try{n.storage=T(d)[p()._href]}catch(r){}}!w.parse&&!w.stringify&&(w.parse=T,w.stringify=N,a.JSON=w)}}(h.cookie.split("_historyAPI="),p()._href)):a.history.emulate=!t}(window,!0,!1,null);
function root(){var a=document.getElementById("profile-image");root.full=!1;a.addEventListener("click",function(){root.full?(a.blur(),root.full=!1):root.full=!0})}function about_me(){gapi.plus.go("me_g-plus");twttr.widgets.load()}function presentation(){beginLoading()};
