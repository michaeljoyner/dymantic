@extends('admin.base')

@section('head')
    <meta property="CSRF-token" content="{{ Session::token() }}"/>
@stop

@section('content')
    @include('admin.partials.navbar')
    <div class="container">
        <h1 class="content-header">New Client</h1>
        <hr class="content-divider"/>
        @include('admin.partials.forms.client', ['url' => 'admin/clients/create'])
    </div>
@endsection

@section('bodyscripts')
    @parent
    <script src="{{ asset('js/vendor/dropzone.js') }}"></script>
    <script>
        Dropzone.options.clientPicDropzone = {

            init: function() {
                var self = this;
                this.on('sending', function(file, xhr, formData) {
                   formData.append('_token', helper.getCSRFToken());
                });
                this.on('success', function(file, response) {
                   helper.appendHiddenFieldToForm('client-form', 'client-image', 'image_path', response);
                });
                this.on('addedFile', function(file) {
                    self.removeAllFiles();
                });
            },

            headers: {'X-Requested-With': 'XMLHttpRequest'}

        }

        var helper = {
            getCSRFToken: function() {
                var metas = document.getElementsByTagName('meta');
                var i = 0, l = metas.length;
                for(i;i<l;i++) {
                    if(metas[i].getAttribute("property") == 'CSRF-token') {
                        return metas[i].getAttribute("content");
                    }
                }
                return "";
            },

            appendHiddenFieldToForm: function(formID, inputId, inputName, inputValue) {
                var form = document.getElementById(formID);
                var hiddenInput;
                if(form.querySelector('#'+ inputId)) {
                    hiddenInput = form.querySelector('#'+ inputId);
                    hiddenInput.setAttribute('value', inputValue);
                    return;
                }
                hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');

                hiddenInput.setAttribute('id', inputId);
                hiddenInput.setAttribute('name', inputName);
                hiddenInput.setAttribute('value', inputValue);
                form.appendChild(hiddenInput);
                return;
            }
        }
    </script>
@endsection