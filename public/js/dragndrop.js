//drag and drop
if(window.File && window.FileList && window.FileReader) {
	dndInit();
}

function dndInit() {
	var logoselect = document.querySelector('#logoselect');
	var logodrag = document.querySelector('#logodrag');
	var submitbutton = document.querySelector('#submitbutton');

	//listen for selected files
	logoselect.addEventListener('change', fileSelectHandler, false);

	//check XHR support
	var xhr = new XMLHttpRequest();
	if(xhr.upload) {
		//drag events
		logodrag.addEventListener('dragover', fileDragHover, false);
		logodrag.addEventListener('dragleave', fileDragHover, false);
		logodrag.addEventListener('drop', fileSelectHandler, false);
		//show drag area
		logodrag.style.display = "block";
		//hide submit button
		submitbutton.style.display = "none";
	}
}

function fileDragHover(ev) {
	ev.stopPropagation();
	ev.preventDefault();
	if(ev.type == "dragover") {
		ev.target.classList.add('hover');
	} else {
		ev.target.classList.remove('hover');
	}
}

function fileSelectHandler(ev) {
	var i = 0, l;
	fileDragHover(ev);

	var files = ev.target.files || ev.dataTransfer.files;
	l = files.length;
	for(i;i<l;i++) {
		parseFile(files[i]);
	}

}

function parseFile(file) {
	var logodrag = document.querySelector('#logodrag');
	if(file.type.indexOf('image') == 0) {
		var reader = new FileReader();
		reader.onload = function(ev) {
			var img = new Image();
			img.src = ev.target.result;
			logodrag.appendChild(img);
		}
		reader.readAsDataURL(file);
	} else {
		alert('That is not an accepted image file');
	}
	uploadFile(file);
}

function uploadFile(file) {
	var req = new XMLHttpRequest();
	if(req.upload) {
		//progress bar
		var box = document.querySelector('#logo_upload_progress_box');
		var bar = document.createElement('div');
		var innerbar = document.createElement('div');
		bar.setAttribute('class', 'progress_bar');
		var fname = (file.name.length > 25 ? "..."+file.name.substring((file.name.length - 25)) : file.name);
		bar.innerHTML += fname;
		bar.appendChild(innerbar);
		box.appendChild(bar);
		


		var progressHandler = function(pc) {
			innerbar.style.width = pc+"%";
		}

		var data = new FormData();
		data.append('logo', file);
		req.open('POST', '/logoautoupload', true);
		req.upload.addEventListener('progress', function(ev) {
			var pc = parseInt((ev.loaded / ev.total * 100));
			progressHandler(pc);
		}, false);
		req.send(data);
		req.onreadystatechange = function(ev) {
			if(req.readyState == 4) {
				innerbar.style.backgroundColor = (req.status == 200 ? "green" : "red");
			}
		};
	}
}