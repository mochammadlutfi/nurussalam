/**
 * bootstrap.masonry.js - Masonry Bootstrap 3 (https://github.com/gustavoconci/bootstrap.masonry.js)
 * Copyright (c) 2017-2018, Gustavo Henrique Conci. (MIT Licensed)
 */

!function(t){function a(t){return void 0===window.matchMedia||window.matchMedia(t).matches}t.fn.masonry=function(){var e=t(this),i=e.find(e.attr("data-target")),n=function(){var n={},o={lg:1200,md:992,sm:768,xs:0};data=e.data();for(var r in data)if(!(r.indexOf("col")<0)){var c=r.replace("col","").toLowerCase();if(a("(min-width: "+o[c]+"px)")){var d=data[r],l=12/d;n={length:l,html:function(t,a){return new Array(Math.ceil(t)+1).join(a)}(l,'<div class="col-'+c+"-"+d+'"/>')};break}}var h=t(n.html),f=-1,v=-1;for(e.html(h),$colActive=h.eq(0);++f<i.length;){for(v=-1;++v<n.length;)h.eq(v).height()<$colActive.height()&&($colActive=h.eq(v));$colActive.append(i.eq(f))}};t(window).resize(n),n()}}(jQuery);