;(function(w) {
	var d = w.document;
	var id_counter = 1;

	function attachListener(obj, event, callback, context) {
		if(obj.addEventListener) {
			obj.addEventListener(event, callback.bind(context), false);	
		} else if(obj.attachEvent) {
			obj.attachEvent('on'+event, callback.bind(context));
		} else {
			obj['on'+event] = callback.bind(context);
		}
		
	}

	function DragAndDrop(select, droparea, progress, hidden, callback) {
		this.fileSelect = select;
		this.dropzone = droparea;
		this.progressbox = progress;
		this.callback = callback;
		this.hiddens = hidden;
		this.firstImage = true;
		this.init();
	}

	DragAndDrop.prototype = {
		init: function(){
			if(!(w.File && w.FileList && w.FileReader)) {
				return;
			}
			attachListener(this.fileSelect, 'change', this.fileSelectHandler, this);
			var xhr = new XMLHttpRequest();
			if(xhr.upload) {
				attachListener(this.dropzone, 'dragover', this.fileDragHover, this);
				attachListener(this.dropzone, 'dragleave', this.fileDragHover, this);
				attachListener(this.dropzone, 'drop', this.fileSelectHandler, this);
				//show drag area
				this.dropzone.style.display = "block";
			}
		},

		fileDragHover: function(ev) {
			ev.stopPropagation();
			ev.preventDefault();
			if(ev.type == "dragover") {
				ev.target.classList.add('hover');
			} else {
				ev.target.classList.remove('hover');
			}
		},

		fileSelectHandler: function(ev) {
			var i = 0, l;
			this.fileDragHover(ev);

			var files = ev.target.files || ev.dataTransfer.files;
			l = files.length;
			for(i;i<l;i++) {
				this.parseFile(files[i]);
			}
		},

		parseFile: function(file) {
			var self = this;
			if(file.type.indexOf('image') == 0) {
				var reader = new FileReader();
				reader.onload = function(ev) {
					if(self.firstImage) {
						self.dropzone.innerHTML = '';
						self.firstImage = false;
					}
					var img = new Image();
					img.src = ev.target.result;
					self.addImage(img, id_counter);
					self.uploadFile(file, id_counter);
					id_counter++;
				}
				reader.readAsDataURL(file);
			} else {
				alert('That is not an accepted image file');
			}
		},

		addImage: function(img, id) {
			var box = d.createElement('div');
			box.setAttribute('id', 'imgbox_'+id);
			box.setAttribute('class', 'imgbox');
			var closebtn = d.createElement('div');
			closebtn.setAttribute('class', 'discard_img_btn');
			closebtn.setAttribute('id', 'img_'+id);
			closebtn.innerHTML = "x";
			closebtn.addEventListener('click', this.discardUpload.bind(this), false);
			box.appendChild(closebtn);
			box.appendChild(img);
			this.dropzone.appendChild(box);
		},

		uploadFile: function(file, id) {
			var self = this;
			var req = new XMLHttpRequest();
			if(req.upload) {
				//progress bar
				var bar = document.createElement('div');
				bar.setAttribute('id', 'prog_'+id);
				var innerbar = document.createElement('div');
				bar.setAttribute('class', 'progress_bar');
				var fname = (file.name.length > 25 ? "..."+file.name.substring((file.name.length - 25)) : file.name);
				bar.innerHTML += fname;
				bar.appendChild(innerbar);
				this.progressbox.appendChild(bar);
				


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
						innerbar.style.width = "100%";
						innerbar.style.backgroundColor = (req.status == 200 ? "green" : "red");
						if(req.status == 200) {
							self.addHidden(JSON.parse(req.response), id);
						}
					}
				};
			}
		},

		addHidden: function(value, id) {
			var h = d.createElement('input');
			h.setAttribute('type', 'hidden');
			h.setAttribute('id', 'hid_'+id);
			h.setAttribute('name', 'uploadedlogos[]');
			h.setAttribute('value', value);
			this.hiddens.appendChild(h);
		},

		discardUpload: function(ev) {
			var id = ev.target.id.substring(ev.target.id.indexOf('_')+1);
			// var hiddenbox = d.querySelector('#uploaded_logos');
			var hidden = this.hiddens.querySelector('#hid_'+id);
			if(hidden) {
				hidden.setAttribute('name', 'discardedLogos[]');
			}
			// var progbox = d.querySelector('#logo_upload_progress_box');
			var prog = this.progressbox.querySelector('#prog_'+id);
			if(prog) {
				prog.parentNode.removeChild(prog);
			}
			var imgbox = d.querySelector('#imgbox_'+id);
			if(imgbox) {
				imgbox.parentNode.removeChild(imgbox);
			} 
		}
	}
	w.DragAndDrop = DragAndDrop;
}(window));