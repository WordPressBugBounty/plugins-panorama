(()=>{"use strict";var t={5338:(t,e,n)=>{var r=n(5795);e.H=r.createRoot,r.hydrateRoot},5795:t=>{t.exports=window.ReactDOM}},e={},n=function n(r){var o=e[r];if(void 0!==o)return o.exports;var i=e[r]={exports:{}};return t[r](i,i.exports,n),i.exports}(5338);const r=window.React;function o(t){return o="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},o(t)}var i="C:\\Users\\Shamim bPlugins\\Local Sites\\shamim\\app\\public\\wp-content\\plugins\\panorama\\src\\blocks\\video-360\\Components\\Common\\Video360Viewer.js",a=void 0;function c(t,e){var n=Object.keys(t);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(t);e&&(r=r.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),n.push.apply(n,r)}return n}function l(t){for(var e=1;e<arguments.length;e++){var n=null!=arguments[e]?arguments[e]:{};e%2?c(Object(n),!0).forEach((function(e){u(t,e,n[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(n)):c(Object(n)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(n,e))}))}return t}function u(t,e,n){return(e=function(t){var e=function(t){if("object"!=o(t)||!t)return t;var e=t[Symbol.toPrimitive];if(void 0!==e){var n=e.call(t,"string");if("object"!=o(n))return n;throw new TypeError("@@toPrimitive must return a primitive value.")}return String(t)}(t);return"symbol"==o(e)?e:e+""}(e))in t?Object.defineProperty(t,e,{value:n,enumerable:!0,configurable:!0,writable:!0}):t[e]=n,t}function s(t){return function(t){if(Array.isArray(t))return m(t)}(t)||function(t){if("undefined"!=typeof Symbol&&null!=t[Symbol.iterator]||null!=t["@@iterator"])return Array.from(t)}(t)||function(t,e){if(t){if("string"==typeof t)return m(t,e);var n={}.toString.call(t).slice(8,-1);return"Object"===n&&t.constructor&&(n=t.constructor.name),"Map"===n||"Set"===n?Array.from(t):"Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)?m(t,e):void 0}}(t)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function m(t,e){(null==e||e>t.length)&&(e=t.length);for(var n=0,r=Array(e);n<e;n++)r[n]=t[n];return r}const p=function(t){var e=t.attributes,n=t.setAttributes,o=t.isButton,c=void 0===o||o,u=e.videoUrl,m=e.options,p=m||{},f=p.loop,b=p.initialView,d=p.initialPosition,y=p.play,v=p.progress,g=p.remainingTime,w=p.volume,_=p.pip,N=p.fullscreen,h=p.playbackSpeed,S=(0,r.useRef)(null),j=(0,r.useRef)(null);return(0,r.useEffect)((function(){if(S.current&&window.videojs){var t=[].concat(s(y?["playToggle"]:[]),s(g?["remainingTimeDisplay"]:[]),s(v?["progressControl"]:[]),s(w?["volumePanel"]:[]),s(_?["pictureInPictureToggle"]:[]),s(N?["fullscreenToggle"]:[]),s(h?["playbackRateMenuButton"]:[]));j.current=window.videojs(S.current,{autoplay:!0,loop:f,muted:!1,controls:!0,controlBar:{children:t},fluid:!0,responsive:!0,playbackRates:h?[.5,1,1.5,2]:[],plugins:{vr:{projection:"360"}}});var e=j.current;return e.on("loadedmetadata",(function(){if(e.vr&&d){var t=d.x,n=d.y,r=d.z;e.vr().camera.position.set(t,n,r)}})),function(){j.current&&j.current.dispose()}}console.log("videojs is not loaded")}),[u,b,f,y,v,g,w,_,N,h]),React.createElement("div",{key:"".concat(u,"-").concat(b,"-").concat(f,"-").concat(y,"-").concat(v,"-").concat(g,"-").concat(w,"-").concat(_,"-").concat(N,"-").concat(h),className:"panoramaVideo360Viewer",__self:a,__source:{fileName:i,lineNumber:79,columnNumber:5}},c&&b&&React.createElement("button",{onClick:function(){if(j.current){var t=j.current.vr().camera.position,e=t.x,r=t.y,o=t.z;n({options:l(l({},m),{},{initialPosition:{x:e,y:r,z:o}})})}},className:"setInitialViewButton",__self:a,__source:{fileName:i,lineNumber:84,columnNumber:9}},"Set as Initial View"),React.createElement("video",{ref:S,className:"video-js vjs-default-skin",crossOrigin:"anonymous",playsInline:!0,__self:a,__source:{fileName:i,lineNumber:88,columnNumber:7}},React.createElement("source",{src:u,type:"video/mp4",__self:a,__source:{fileName:i,lineNumber:94,columnNumber:9}})))},f=function(t){var e=t.attributes,n=t.id,r=t.device,o=void 0===r?"desktop":r,i=e.layout,a=i.width,c=i.alignSl,l="#".concat(n),u="".concat(l," .bBlocksVideo360Viewer"),s="".concat(u," .panoramaVideo360Viewer");return React.createElement("style",{dangerouslySetInnerHTML:{__html:"\n\n\t\t".concat(u,"{\n\t\t\talign-items: ").concat(c[o],";\n\t\t}\n\n\t\t").concat(s,"{\n\t\t\twidth: ").concat(a[o]?a[o]:"100%",";\n\t\t}\n\t\t\n\t\t@media only screen and (min-width:641px) and (max-width: 1024px){\n\t\t\t").concat(u,"{\n\t\t\t\talign-items: ").concat(c.tablet,";\n\t\t\t}\n\n\t\t\t").concat(s,"{\n\t\t\t\twidth: ").concat(a.tablet?a.tablet:"100%",";\n\t\t\t}\n\n\t\t}\n\n\t\t@media only screen and (max-width:640px){\n\t\t\t").concat(u,"{\n\t\t\t\talign-items: ").concat(c.mobile,";\n\t\t\t}\n\n\t\t\t").concat(s,"{\n\t\t\t\twidth: ").concat(a.mobile?a.mobile:"100%",";\n\t\t\t}\n\n\t\t}\n\t")},__self:void 0,__source:{fileName:"C:\\Users\\Shamim bPlugins\\Local Sites\\shamim\\app\\public\\wp-content\\plugins\\panorama\\src\\blocks\\video-360\\Components\\Common\\Style.js",lineNumber:10,columnNumber:5}})};var b="C:\\Users\\Shamim bPlugins\\Local Sites\\shamim\\app\\public\\wp-content\\plugins\\panorama\\src\\blocks\\video-360\\view.js",d=void 0;document.addEventListener("DOMContentLoaded",(function(){document.querySelectorAll(".wp-block-panorama-video-360").forEach((function(t){var e=JSON.parse(t.dataset.attributes);(0,n.H)(t).render(React.createElement(React.Fragment,null,React.createElement(f,{attributes:e,id:t.id,__self:d,__source:{fileName:b,lineNumber:13,columnNumber:9}}),React.createElement("div",{className:"bBlocksVideo360Viewer",__self:d,__source:{fileName:b,lineNumber:15,columnNumber:9}},React.createElement(p,{attributes:e,isButton:!1,__self:d,__source:{fileName:b,lineNumber:16,columnNumber:13}})))),null==t||t.removeAttribute("data-attributes")}))}))})();