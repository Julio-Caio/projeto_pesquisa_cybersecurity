(()=>{"use strict";var e,t={475:(e,t,n)=>{n.d(t,{Z:()=>a});var r=n(196),o=n(441),i=n(501);function a({attributes:e,id:t}){const{adobeEmbedder:n,adobeOptions:a,file:d,title:s,height:l,width:c,align:u,protect:p,popupBtnText:f}=e,h=(0,r.useRef)(),m=(0,r.useMemo)((()=>({showPrintPDF:!1,showDownloadPDF:!1,showAnnotationTools:!1,embedMode:a.embedMode})),[]);(0,r.useEffect)((()=>{!n&&h.current&&(h.current.innerHTML=""),h?.current&&"LIGHT_BOX"!=a.embedMode&&w(p?m:a)}),[a,n,d,p]),(0,r.useEffect)((()=>{document.getElementById(t)&&(document.getElementById(t).style.height=l)}),[a.embedMode]);const w=e=>{"undefined"!=typeof AdobeDC&&new AdobeDC.View({clientId:(0,o.Z)("decode",pdfp?.adobeClientKey),divId:t}).previewFile({content:{location:{url:d}},metaData:{fileName:s||" "}},e)};return pdfp?.adobeClientKey?(0,i.jsx)(i.Fragment,{children:(0,i.jsx)("div",{ref:h,style:{width:`${"LIGHT_BOX"===a?.embedMode?"fit-content":c} `},"data-align":u,children:"LIGHT_BOX"===a?.embedMode?(0,i.jsx)(i.Fragment,{children:(0,i.jsx)("button",{className:`${t}btn`,onClick:()=>{w(p?m:a)},children:f||d?.split(".").slice(0,-1).join(".")})}):(0,i.jsx)("div",{id:t,style:{height:l}})})}):(0,i.jsx)(i.Fragment,{children:"adobe client key missing"})}},682:(e,t,n)=>{n.d(t,{Z:()=>a});var r=n(196),o=n(937),i=n(501);function a({attributes:e,source:t,RichText:n,setAttributes:a,__,wrapper:d,previewSrc:s}){const{downloadButton:l,protect:c,downloadButtonText:u,fullscreenButton:p,fullscreenButtonText:f,showName:h,titleFontSize:m,title:w,adobeEmbedder:b,newWindow:v}=e;return(0,r.useEffect)((()=>{}),[]),(0,i.jsx)(i.Fragment,{children:!b&&(0,i.jsxs)(i.Fragment,{children:[h&&(0,i.jsx)(n,{tagName:"p",value:w,allowedFormats:[],style:{fontSize:m,margin:"20px"},onChange:e=>a({title:e}),placeholder:__("Title","pdfp")}),(0,i.jsxs)("div",{className:"cta_wrapper",children:[l&&!c&&(0,i.jsx)("a",{className:"pdfp_download",download:!0,target:"blank",href:t,rel:"noreferrer",children:(0,i.jsx)("button",{className:"pdfp_download_btn",children:u})}),p&&!c&&(0,i.jsx)("a",{href:s,rel:"noreferrer",onClick:e=>{"_self"===e.target.parentElement.target&&((0,o.Z)()?e.target="blank":(e.preventDefault(),d?.querySelector(".iframe_wrapper")?.requestFullscreen()))},target:v?"blank":"_self",children:(0,i.jsx)("button",{children:f})})]})]})})}},551:(e,t,n)=>{n.d(t,{Z:()=>i});var r=n(196),o=n(501);const i=function({__,attributes:e,source:t=pdfp?.placeholder||"http://localhost/freemius/wp-content/uploads/2022/02/temp.pdf"}){const{height:n}=e;return(0,o.jsx)(o.Fragment,{children:t.includes("dropbox.com")?(0,o.jsx)("div",{style:{border:"2px solid #ddd"},children:(0,o.jsx)("p",{children:__("Preview is not available for dropbox","pdfp")})}):(0,o.jsx)(r.Fragment,{children:(0,o.jsxs)("div",{className:"iframe_wrapper",children:[(0,o.jsx)("div",{className:"pdfp_frame_overlay"}),(0,o.jsx)("iframe",{className:"pdfp_iframe",height:n,style:{height:n,width:"100%"},src:t}),(0,o.jsx)("span",{className:"close",onClick:()=>{document.exitFullscreen()},children:"×"})]})})})}},843:(e,t,n)=>{n.d(t,{Z:()=>i});var r=n(196),o=n(501);function i({attributes:e,id:t}){const[n,i]=(0,r.useState)(null),{height:a,popupBtnStyle:d}=e;return(0,r.useEffect)((()=>{i(`.${t}btn {background: ${d?.background}; color: ${d?.color}; padding: ${d?.padding?.top}px ${d?.padding?.right}px ${d?.padding?.bottom}px ${d?.padding?.left}px}`)}),[d,t,a]),(0,o.jsx)("style",{children:n})}},10:(e,t,n)=>{n.d(t,{Z:()=>m});var r=n(196),o=n(586),i=n(552),a=n(684),d=n(441),s=n(475),l=n(682),c=n(551),u=n(843),p=n(131),f=n(365),h=n(501);const m=({attributes:e,RichText:t,setAttributes:n,__,id:m})=>{const{adobeEmbedder:w,file:b,protect:v,alert:g,additional:x,width:j,align:y,print:_,onlyPDF:E,downloadButton:Z,thumbMenu:k,hrScroll:O,initialPage:$,zoomLevel:N}=e,[D,S]=(0,r.useState)(""),F=(0,r.useRef)();(0,r.useEffect)((()=>{(async()=>{if(v){let e=(0,p.Z)((0,d.Z)("decode",b));e=await(0,i.Z)(e),S(e),(0,a.Z)(e),(0,o.Z)(g,F.current?.querySelector("iframe"))}else S((0,p.Z)(b))})()}),[b]);const[R,L]=(0,r.useState)(null);return(0,r.useEffect)((()=>{let e="";if(D.includes(window.location.origin))if((0,f.Z)())e=`//docs.google.com/gview?embedded=true&url=${D}`;else{let t="&z=auto";N&&(t="&z="+N/100),e=`${pdfp?.dir}pdfjs-new/web/viewer.html?file=${D}${t}&raw=${E?"1":""}&nobaki=${!v&&Z?"vera":"false"}&stdono=${_&&!v?"vera":"false"}&open=false&onlypdf=${E?"vera":"false"}&hrscroll=${O?"vera":"false"}&side=${k}#page=${$}`}else D.includes(".google.com")&&(e=D);L(e)}),[E,k,$,v,O,D,N]),(0,h.jsxs)("div",{ref:F,className:`pdfp_wrapper ${x?.Class} align-${y}`,style:{width:j,maxWidth:"100%",display:"inline-block"},children:[(0,h.jsx)(u.Z,{attributes:e,id:m}),D&&(0,h.jsxs)(h.Fragment,{children:[(0,h.jsx)(l.Z,{attributes:e,source:D,previewSrc:R,RichText:t,setAttributes:n,__,wrapper:F.current}),w&&(0,h.jsx)(s.Z,{attributes:e,source:D,id:m}),!w&&(0,h.jsx)(c.Z,{source:R,attributes:e,setAttributes:n,__,wrapper:F.current})]})]})}},87:(e,t,n)=>{const r=window.ReactDOM;var o=n(10),i=n(501);function a({attributes:e,id:t}){return(0,i.jsx)(i.Fragment,{children:(0,i.jsx)(o.Z,{RichText:d,attributes:e,setAttributes:()=>{},__,id:t})})}function d({tag:e="p",value:t=""}){return(0,i.jsx)(e,{children:t})}function __(e,t){return e}document.addEventListener("DOMContentLoaded",(function(){document.querySelectorAll(".wp-block-pdfp-pdf-poster").forEach((e=>{const t=JSON.parse(e.dataset.attributes);e.removeAttribute("data-attributes"),(0,r.createRoot)(e).render((0,i.jsx)(a,{attributes:t,id:e.id}))}))}))},586:(e,t,n)=>{function r(e,t){e?(setTimeout((()=>{t&&(t.contentWindow.document.oncontextmenu=function(e){alert("Right Click Disabled"),e.preventDefault()})}),1e3),document.oncontextmenu=function(e){alert("Right Click Disabled"),e.preventDefault()}):(document.oncontextmenu=function(e){e.preventDefault()},t&&(t.contentWindow.document.oncontextmenu=function(e){e.preventDefault()}))}n.d(t,{Z:()=>r})},552:(e,t,n)=>{async function r(e){const t=await fetch(e),n=await t.blob();return URL.createObjectURL(n)}n.d(t,{Z:()=>r})},365:(e,t,n)=>{function r(){return window.navigator.userAgent.includes("Edg")}n.d(t,{Z:()=>r})},937:(e,t,n)=>{function r(){return/iPad|iPhone|iPod/.test(navigator.userAgent)&&!window.MSStream}n.d(t,{Z:()=>r})},131:(e,t,n)=>{function r(e){return e.replace(/https?:/,window.location.protocol)}n.d(t,{Z:()=>r})},684:(e,t,n)=>{function r(e){function t(t){isNaN(+t)&&(t=100);var n=+new Date,r=+new Date;(isNaN(n)||isNaN(r)||r-n>t)&&(URL.revokeObjectURL(e),alert("please close devtool"))}window.attachEvent?"complete"===document.readyState||"interactive"===document.readyState?(t(),window.attachEvent("onresize",t),window.attachEvent("onmousemove",t),window.attachEvent("onfocus",t),window.attachEvent("onblur",t)):setTimeout(argument.callee,0):(window.addEventListener("load",t),window.addEventListener("resize",t),window.addEventListener("mousemove",t),window.addEventListener("focus",t),window.addEventListener("blur",t))}n.d(t,{Z:()=>r})},441:(e,t,n)=>{function r(e="encode",t=""){const n="abcdefghijklmnopqrstuvwxyz1234567890",r="z1ntg4ihmwj5cr09byx8spl7ak6vo2q3eduf";let o="";if("encode"==e&&""!=t){const e=t.length;for(let i=0;i<e;i++){const e=n.indexOf(t[i]);o+=-1!==e?r[e]:t[i]}}if("decode"==e&&""!=t){const e=t.length;for(let i=0;i<e;i++){const e=t[i],a=r.indexOf(e);o+=-1!==a?n[a]:e}}return o}n.d(t,{Z:()=>r})},196:e=>{e.exports=window.React},501:e=>{e.exports=window.ReactJSXRuntime}},n={};function r(e){var o=n[e];if(void 0!==o)return o.exports;var i=n[e]={exports:{}};return t[e](i,i.exports,r),i.exports}r.m=t,e=[],r.O=(t,n,o,i)=>{if(!n){var a=1/0;for(c=0;c<e.length;c++){n=e[c][0],o=e[c][1],i=e[c][2];for(var d=!0,s=0;s<n.length;s++)(!1&i||a>=i)&&Object.keys(r.O).every((e=>r.O[e](n[s])))?n.splice(s--,1):(d=!1,i<a&&(a=i));if(d){e.splice(c--,1);var l=o();void 0!==l&&(t=l)}}return t}i=i||0;for(var c=e.length;c>0&&e[c-1][2]>i;c--)e[c]=e[c-1];e[c]=[n,o,i]},r.n=e=>{var t=e&&e.__esModule?()=>e.default:()=>e;return r.d(t,{a:t}),t},r.d=(e,t)=>{for(var n in t)r.o(t,n)&&!r.o(e,n)&&Object.defineProperty(e,n,{enumerable:!0,get:t[n]})},r.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),(()=>{var e={450:0,722:0};r.O.j=t=>0===e[t];var t=(t,n)=>{var o,i,a=n[0],d=n[1],s=n[2],l=0;if(a.some((t=>0!==e[t]))){for(o in d)r.o(d,o)&&(r.m[o]=d[o]);if(s)var c=s(r)}for(t&&t(n);l<a.length;l++)i=a[l],r.o(e,i)&&e[i]&&e[i][0](),e[i]=0;return r.O(c)},n=self.webpackChunkpdf_poster_pro=self.webpackChunkpdf_poster_pro||[];n.forEach(t.bind(null,0)),n.push=t.bind(null,n.push.bind(n))})();var o=r.O(void 0,[722],(()=>r(87)));o=r.O(o)})();