@extends('admin.base')

@section('head')
    <meta property="CSRF-token" content="{{ Session::token() }}"/>
@stop

@section('content')
    @include('admin.partials.navbar')
    <h1>New Client</h1>
    @include('admin.partials.forms.client')
    <form action="/admin/clients/imageupload" class="dropzone" id="client-pic-dropzone">

    </form>
@endsection

@section('bodyscripts')
    @parent
    <script src="{{ asset('js/vendor/dropzone.js') }}"></script>
    <script>
        Dropzone.options.clientPicDropzone = {
            init: function() {
                this.on('sending', function(file, xhr, formData) {
                    console.log(formData);
                   formData.append('_token', helper.getCSRFToken());
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
            }
        }
    </script>
@endsection