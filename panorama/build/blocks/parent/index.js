(()=>{"use strict";const e=JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":2,"name":"panorama/parent","version":"1.0.0","title":"Panorama Viewer","category":"widgets","description":"Interactive Viewer for Panorama Image and video.","keywords":["panorama viewer","panorama block","b-blocks panorama"],"textdomain":"panorama","supports":{"align":["wide","full"],"html":false},"example":{"attributes":{}},"editorScript":"file:./index.js","editorStyle":"file:./index.css"}');var a="C:\\Users\\Shamim bPlugins\\Local Sites\\shamim\\app\\public\\wp-content\\plugins\\panorama\\src\\blocks\\parent\\Edit.js",n=void 0;function l(){return l=Object.assign?Object.assign.bind():function(e){for(var a=1;a<arguments.length;a++){var n=arguments[a];for(var l in n)({}).hasOwnProperty.call(n,l)&&(e[l]=n[l])}return e},l.apply(null,arguments)}var r=wp.blockEditor,t=r.InnerBlocks,m=r.useBlockProps,c=wp.data,o=c.useSelect,s=c.dispatch,u=wp.element.useEffect;var i="C:\\Users\\Shamim bPlugins\\Local Sites\\shamim\\app\\public\\wp-content\\plugins\\panorama\\src\\blocks\\parent\\index.js",_=void 0;function N(){return N=Object.assign?Object.assign.bind():function(e){for(var a=1;a<arguments.length;a++){var n=arguments[a];for(var l in n)({}).hasOwnProperty.call(n,l)&&(e[l]=n[l])}return e},N.apply(null,arguments)}var b=wp.blocks.registerBlockType,p=wp.blockEditor,f=p.InnerBlocks,d=p.useBlockProps;b(e,{icon:"images-alt2",edit:function(e){var r=m(),c=e.clientId,i=e.isSelected,_=o((function(e){return e("core/block-editor").getBlock(c).innerBlocks}));u((function(){i&&wp.data.dispatch("core/edit-post").openGeneralSidebar("edit-post/block")}),[i]),s("core/block-editor").setTemplateValidity(!0);var N=function(e){var a=wp.blocks.createBlock("bpgb/panorama"===e?"bpgb/panorama":"panorama/".concat(e));return s("core/block-editor").insertBlock(a,0,c)};return null!=_&&_.length?React.createElement("div",l({},r,{__self:n,__source:{fileName:a,lineNumber:134,columnNumber:5}}),React.createElement(t,{templateLock:!1,allowedBlocks:["panorama/image-360","panorama/image-3d","panorama/video","panorama/video-360","panorama/google-street","panorama/gallery","panorama/tour","bpgb/panorama"],renderAppender:function(){return 0===_.length&&React.createElement(t.ButtonBlockAppender,{__self:n,__source:{fileName:a,lineNumber:28,columnNumber:14}})},__self:n,__source:{fileName:a,lineNumber:135,columnNumber:7}})):React.createElement("div",l({},r,{__self:n,__source:{fileName:a,lineNumber:36,columnNumber:7}}),React.createElement("div",{className:"bpl-panorama-editor",__self:n,__source:{fileName:a,lineNumber:37,columnNumber:9}},React.createElement("h2",{className:"panorama-title",__self:n,__source:{fileName:a,lineNumber:38,columnNumber:11}},"Choose a viewer "),React.createElement("div",{className:"panorama-buttons",__self:n,__source:{fileName:a,lineNumber:39,columnNumber:11}},React.createElement("button",{className:"panorama-button image-3d",onClick:function(){N("image-3d")},__self:n,__source:{fileName:a,lineNumber:40,columnNumber:13}},React.createElement("span",{className:"icon",__self:n,__source:{fileName:a,lineNumber:46,columnNumber:15}},"🧊"),React.createElement("span",{className:"text",__self:n,__source:{fileName:a,lineNumber:47,columnNumber:15}},"Image 3D")),React.createElement("button",{className:"panorama-button image-360",onClick:function(){N("image-360")},__self:n,__source:{fileName:a,lineNumber:49,columnNumber:13}},React.createElement("span",{className:"icon",__self:n,__source:{fileName:a,lineNumber:55,columnNumber:15}},"🌐"),React.createElement("span",{className:"text",__self:n,__source:{fileName:a,lineNumber:56,columnNumber:15}},"Image 360°")),React.createElement("button",{className:"panorama-button video",onClick:function(){N("video")},__self:n,__source:{fileName:a,lineNumber:59,columnNumber:13}},React.createElement("span",{className:"icon",__self:n,__source:{fileName:a,lineNumber:65,columnNumber:15}},"🎥"),React.createElement("span",{className:"text",__self:n,__source:{fileName:a,lineNumber:66,columnNumber:15}},"Video")),React.createElement("button",{className:"panorama-button video-360",onClick:function(){N("video-360")},__self:n,__source:{fileName:a,lineNumber:68,columnNumber:13}},React.createElement("span",{className:"icon",__self:n,__source:{fileName:a,lineNumber:74,columnNumber:15}},"🎬"),React.createElement("span",{className:"text",__self:n,__source:{fileName:a,lineNumber:75,columnNumber:15}}," Video 360°")),React.createElement("button",{className:"panorama-button gallery",onClick:function(){N("gallery")},__self:n,__source:{fileName:a,lineNumber:77,columnNumber:13}},React.createElement("span",{className:"icon",__self:n,__source:{fileName:a,lineNumber:83,columnNumber:15}},"🖼️"),React.createElement("span",{className:"text",__self:n,__source:{fileName:a,lineNumber:84,columnNumber:15}},"Gallery")),React.createElement("button",{className:"panorama-button tour",onClick:function(){N("tour")},__self:n,__source:{fileName:a,lineNumber:86,columnNumber:13}},React.createElement("span",{className:"icon",__self:n,__source:{fileName:a,lineNumber:92,columnNumber:15}},"🏛️"),React.createElement("span",{className:"text",__self:n,__source:{fileName:a,lineNumber:93,columnNumber:15}},"Tour 360°")),React.createElement("button",{className:"panorama-button google-street",onClick:function(){N("google-street")},__self:n,__source:{fileName:a,lineNumber:95,columnNumber:13}},React.createElement("span",{className:"icon",__self:n,__source:{fileName:a,lineNumber:101,columnNumber:15}},"🗺️"),React.createElement("span",{className:"text",__self:n,__source:{fileName:a,lineNumber:102,columnNumber:15}},"Google Street")),React.createElement("button",{className:"panorama-button gutenberg-block",onClick:function(){N("bpgb/panorama")},__self:n,__source:{fileName:a,lineNumber:104,columnNumber:13}},React.createElement("span",{className:"icon",__self:n,__source:{fileName:a,lineNumber:110,columnNumber:15}},"🌄"),React.createElement("span",{className:"text",__self:n,__source:{fileName:a,lineNumber:111,columnNumber:15}},"Panorama Gutenberg block"))),React.createElement(t,{templateLock:!1,allowedBlocks:["panorama/image-360","panorama/image-3d","panorama/video","panorama/video-360","panorama/google-street","panorama/gallery","panorama/tour","bpgb/panorama"],renderAppender:function(){return!1},__self:n,__source:{fileName:a,lineNumber:114,columnNumber:11}})))},save:function(){var e=d.save();return React.createElement("div",N({},e,{__self:_,__source:{fileName:i,lineNumber:14,columnNumber:7}}),React.createElement(f.Content,{__self:_,__source:{fileName:i,lineNumber:15,columnNumber:9}}))}})})();