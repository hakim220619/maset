@extends('layouts/layoutMaster')

@section('title', 'Home')
@section('vendor-style')
    @vite(['resources/assets/vendor/libs/select2/select2.scss', 'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.scss', 'resources/assets/vendor/libs/typeahead-js/typeahead.scss', 'resources/assets/vendor/libs/quill/katex.scss', 'resources/assets/vendor/libs/quill/editor.scss'])
@endsection

<!-- Vendor Scripts -->
@section('vendor-script')
    @vite(['resources/assets/vendor/libs/select2/select2.js', 'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.js', 'resources/assets/vendor/libs/typeahead-js/typeahead.js', 'resources/assets/vendor/libs/bloodhound/bloodhound.js', 'resources/assets/vendor/libs/quill/katex.js', 'resources/assets/vendor/libs/quill/quill.js'])
@endsection

<!-- Page Scripts -->
@section('page-script')
    @vite(['resources/assets/js/forms-editors.js'])
@endsection
@section('content')
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-tile mb-0"><b>{{ $title }}</b></h5>
                </div>
                <form id="aplikasi" class="mb-3 row" action="{{ url('/broadcast/aplikasiProsess') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-12 col-md-6">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="Enter your Title" autofocus>
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label for="title" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan"
                                    placeholder="Enter your Keterangan" autofocus>
                            </div>
                            <div class="mb-3 col-12 col-md-12">
                                <div class="card">
                                    <textarea id="body" cols="30" rows="10" placeholder="Enter the Description" name="body"></textarea>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="demo-inline-spacing">
                                    <div class="hideButtonSend">
                                        <button type="submit" class="btn btn-primary">
                                            </span><i class="fa-regular fa-paper-plane me-1"></i>
                                            Send</button>
                                        <button type="button" class="btn btn-dark" onclick="refreshAll()"><span
                                                class="fa-solid fa-arrows-rotate me-1"></span>Kembali</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Script -->
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    <script type="text/javascript">
        ClassicEditor
            .create(document.querySelector('#body'), {
                ckfinder: {
                    uploadUrl: "{{ route('broadcast.uploadFile') . '?_token=' . csrf_token() }}",
                }
            })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        function refreshAll() {
            window.location.href = '/broadcast/aplikasiView';
        }
    </script>
@endsection
