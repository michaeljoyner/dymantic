;(function(w){
	var d = w.document;

	

	function UploadView(templateId, img, container, fname, hiddenName) {
		this.template = d.getElementById(templateId);
		this.el = d.createElement('div');
		this.el.setAttribute('class', 'fum_file-upload-box');
		this.container = container;
		this.fileName = fname;
		this.hiddenName = hiddenName + '[]';
		this.img = img;
	}

	UploadView.prototype = {
		init: function() {
			this.el.innerHTML = this.template.innerHTML;
			this.progressbar = this.el.querySelector('.fum_progressbar_inner');
			this.progressbarOuter = this.el.querySelector('.fum_progressbar_outer');
			this.cancelbtn = this.el.querySelector('.fum_cancelbtn');
			this.statusline = this.el.querySelector('.fum_status');
			this.fileNameSpan = this.el.querySelector('.fum_filename');
			this.attachEvents();
			this.render();
		},

		attachEvents: function() {
			var self = this;
			function cancelHelper() {
				self.cancelOrRemove();
			}
			// this.cancelbtn.addEventListener('click', cancelHelper);
		},

		render: function() {
			if(this.img.src) {
				var pic = this.el.querySelector('.fum_fileimg');
				pic.src = this.img.src;
			}
			this.fileNameSpan.innerHTML = this.fileName.length > 50 ? this.fileName.substring(this.fileName.length - (this.fileName.length - 50)) : this.fileName; 
			this.container.appendChild(this.el);
		},

		cancelOrRemove: function() {
			alert('boo');
		},

		setProgress: function(percentage) {
			this.progressbar.style.width = percentage + '%';
		},

		setStatus: function(status) {
			this.statusline.innerHTML = status;
		},

		addHidden: function(path) {
			this.hidden = d.createElement('input');
			this.hidden.setAttribute('type', 'hidden');
			this.hidden.setAttribute('name', this.hiddenName);
			this.hidden.value = path;
			this.el.appendChild(this.hidden);
		},

		close: function() {
			this.el.parentNode.removeChild(this.el);
		}
	}

	function ErrorMessageView(message) {
		var self = this;
		this.message = message;
		this.el = d.createElement('div');
		this.el.setAttribute('class', 'fum_error-box');
		this.template = d.getElementById('errorTemplate');
		this.el.innerHTML = this.template.innerHTML;
		this.messSpan = this.el.querySelector('.fum_message');
		this.closebtn = this.el.querySelector('.fum_close-btn');
		this.closebtn.addEventListener('click', function() {
			self.close();
		})
		return this;
	}

	ErrorMessageView.prototype.render = function(container) {
		this.messSpan.innerHTML = this.message;
		container.insertBefore(this.el, container.firstChild);
		return this;
	}

	ErrorMessageView.prototype.close = function() {
		this.el.parentNode.removeChild(this.el);
	}

	function Upload(file, url, view) {
		this.req = new XMLHttpRequest();
		this.file = file;
		this.url = url;
		this.view = view;
	}

	Upload.prototype = {
		init: function() {
			var self = this;
			var fd = new FormData();
			fd.append('upload', this.file);
			fd.append('_token', this.getCSRFToken());

			function abortHelper() {
				self.stop();
				self.view.close();
			}

			function removeHelper() {
				self.view.close();
			}

			this.req.open('POST', this.url, true);
			this.req.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
			this.req.upload.addEventListener('progress', function(ev) {
				var pc = parseInt((ev.loaded / ev.total * 100));
				self.view.setProgress(pc);
			});
			this.req.onreadystatechange = function(ev) {
				if(self.req.readyState == 4) {
					self.view.setProgress(100);
					self.view.cancelbtn.removeEventListener('click', abortHelper, false);
					self.view.cancelbtn.addEventListener('click', removeHelper, false);
					self.view.cancelbtn.innerHTML = 'remove';
					if(self.req.status === 200) {
						self.view.setStatus('complete');
						self.view.addHidden(JSON.parse(ev.target.response));
						self.view.progressbarOuter.style.display = 'none';
					} else {
						self.view.setStatus('failed');
						console.log(ev.target);
						self.view.progressbar.style.backgroundColor = '#FF0000';
					}
				}
			};
			this.req.send(fd);
			this.view.cancelbtn.addEventListener('click', abortHelper, false);
		},

		stop: function() {
			this.req.abort();
		},

		getCSRFToken: function() {
			var metas = document.getElementsByTagName('meta');
			var i = 0, l = metas.length;
			for(i;i<l;i++) {
				if(metas[i].getAttribute("property") == 'CSRF-token') {
					return metas[i].getAttribute("content");
				}
			}
			return "";
		}
	}

	function FileUploadManager(selectEl, url, container, templateId, hiddenName, imageOnly) {
		function canHandleIt() {
			//var req = new XMLHttpRequest();
			//var autoupload = !!(req.upload);
			//var readsFiles = !!(w.File && w.FileList && w.FileReader);
			//var hasFormData = !!(w.FormData);
			//return autoupload && readsFiles && hasFormData;
			return false;
		};

		if(!canHandleIt()) {
			this.supported = false;
			return false;
		}
		this.supported = true;
		this.select = selectEl;
		this.container = container;
		this.url = url;
		this.templateId = templateId;
		this.hiddenName = hiddenName;
		this.imageOnly = imageOnly || false;
		this.uploads = new Array();
		this.init();
	}

	FileUploadManager.prototype = {
		init: function() {
			var self = this;
			function selectHelper(ev) {
				self.selectHandler(ev);
			}
			this.select.addEventListener('change', selectHelper);
		},

		selectHandler: function(ev) {
			var list = ev.target.files;
			var i = 0, l = list.length;
			for(i;i<l;i++) {
				this.parseFile(list[i]);
			}
		},

		parseFile: function(file) {
			if(file.size > 5242880) {
				var size_error = new ErrorMessageView(file.name + ' is just too large. The limit is 5MB.').render(this.container);
				return;
			}
			var self = this;
			var img = new Image();
			if(file.type.indexOf('image') == 0) {
				var reader = new FileReader();
				reader.onload = function(ev) {
					img.src = ev.target.result;
					// console.log(img);
					var upload = new FileUploader(file, img, self.templateId, self.url, self.container, self.hiddenName);
					self.uploads.push(upload);
				}
				reader.readAsDataURL(file);
				// console.log(img);
			} else if (!this.imageOnly){
				if(this.checkFile(file)) {
					var docci = new FileUploader(file, {}, self.templateId, self.url, self.container, self.hiddenName);
					this.uploads.push(docci);
				} else {
					var msg = new ErrorMessageView(file.name + ' is not a valid file.').render(this.container);
				}
			} else {
				var imageOnlyMsg = new ErrorMessageView(file.name + ' is not an image file.').render(this.container);
			}
		},

		checkFile: function(file) {
			var hash = {
				'doc': 1,
				'docx': 1,
				'pdf': 1,
				'odt': 1,
				'txt': 1
			};
			var ext = file.name.split('.')[file.name.split('.').length - 1];
			if(hash[ext]) {
				return true;
			} else {
				return false;
			}

		}
	}

	function FileUploader(file, img, templateId, url, container, hiddenName) {
		// console.log(img);
		this.uploadView = new UploadView(templateId, img, container, file.name, hiddenName);
		this.upload = new Upload(file, url, this.uploadView);
		this.init();
	}

	FileUploader.prototype = {
		init: function() {
			this.uploadView.init();
			this.upload.init();
		}
	}

	w.FileUploadManager = FileUploadManager;
	return true;
}(window));