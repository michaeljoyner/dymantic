(function(g){function h(a,b,c,d){a.addEventListener?a.addEventListener(b,c.bind(d),!1):a.attachEvent?a.attachEvent("on"+b,c.bind(d)):a["on"+b]=c.bind(d)}function l(a,b,c,d,e){this.fileSelect=a;this.dropzone=b;this.progressbox=c;this.callback=e;this.hiddens=d;this.firstImage=!0;this.init()}var f=g.document,k=1;l.prototype={init:function(){g.File&&g.FileList&&g.FileReader&&(h(this.fileSelect,"change",this.fileSelectHandler,this),(new XMLHttpRequest).upload&&(h(this.dropzone,"dragover",this.fileDragHover,
this),h(this.dropzone,"dragleave",this.fileDragHover,this),h(this.dropzone,"drop",this.fileSelectHandler,this),this.dropzone.style.display="block"))},fileDragHover:function(a){a.stopPropagation();a.preventDefault();"dragover"==a.type?a.target.classList.add("hover"):a.target.classList.remove("hover")},fileSelectHandler:function(a){var b=0;this.fileDragHover(a);var c=a.target.files||a.dataTransfer.files;a=c.length;for(b;b<a;b++)this.parseFile(c[b])},parseFile:function(a){var b=this;if(0==a.type.indexOf("image")){var c=
new FileReader;c.onload=function(c){b.firstImage&&(b.dropzone.innerHTML="",b.firstImage=!1);var e=new Image;e.src=c.target.result;b.addImage(e,k);b.uploadFile(a,k);k++};c.readAsDataURL(a)}else alert("That is not an accepted image file")},addImage:function(a,b){var c=f.createElement("div");c.setAttribute("id","imgbox_"+b);c.setAttribute("class","imgbox");var d=f.createElement("div");d.setAttribute("class","discard_img_btn");d.setAttribute("id","img_"+b);d.innerHTML="x";d.addEventListener("click",this.discardUpload.bind(this),
!1);c.appendChild(d);c.appendChild(a);this.dropzone.appendChild(c)},uploadFile:function(a,b){var c=this,d=new XMLHttpRequest;if(d.upload){var e=document.createElement("div");e.setAttribute("id","prog_"+b);var f=document.createElement("div");e.setAttribute("class","progress_bar");var g=25<a.name.length?"..."+a.name.substring(a.name.length-25):a.name;e.innerHTML+=g;e.appendChild(f);this.progressbox.appendChild(e);e=new FormData;e.append("logo",a);d.open("POST","/logoautoupload",!0);d.upload.addEventListener("progress",
function(a){a=parseInt(a.loaded/a.total*100);f.style.width=a+"%"},!1);d.send(e);d.onreadystatechange=function(a){4==d.readyState&&(f.style.width="100%",f.style.backgroundColor=200==d.status?"green":"red",200==d.status&&c.addHidden(JSON.parse(d.response),b))}}},addHidden:function(a,b){var c=f.createElement("input");c.setAttribute("type","hidden");c.setAttribute("id","hid_"+b);c.setAttribute("name","uploadedlogos[]");c.setAttribute("value",a);this.hiddens.appendChild(c)},discardUpload:function(a){a=
a.target.id.substring(a.target.id.indexOf("_")+1);var b=f.querySelector("#uploaded_logos").querySelector("#hid_"+a);b&&b.setAttribute("name","discardedLogos[]");(b=f.querySelector("#logo_upload_progress_box").querySelector("#prog_"+a))&&b.parentNode.removeChild(b);(a=f.querySelector("#imgbox_"+a))&&a.parentNode.removeChild(a)}};g.DragAndDrop=l})(window);