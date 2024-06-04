@extends('layouts/layoutMaster')

@section('title', 'Home')
@section('vendor-style')
    @vite(['resources/assets/vendor/libs/select2/select2.scss', 'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.scss', 'resources/assets/vendor/libs/typeahead-js/typeahead.scss'])
@endsection

<!-- Vendor Scripts -->
@section('vendor-script')
    @vite(['resources/assets/vendor/libs/select2/select2.js', 'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.js', 'resources/assets/vendor/libs/typeahead-js/typeahead.js', 'resources/assets/vendor/libs/bloodhound/bloodhound.js'])
@endsection

<!-- Page Scripts -->
@section('page-script')
    @vite(['resources/assets/js/forms-selects.js', 'resources/assets/js/forms-typeahead.js'])
@endsection

@section('content')
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-tile mb-0"><b>{{ $title }}</b></h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="kontak">Users</label>
                                <select id="selectpickerSelectDeselect" class="selectpicker w-100" data-style="btn-default"
                                    multiple data-actions-box="true" data-live-search="true" name="kontak"
                                    onchange="disabledButton()">
                                    @foreach ($users as $s)
                                        <option value="{{ $s->kontak }}">{{ $s->name }} - {{ $s->rs_name }} -
                                            {{ $s->ra_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <label class="form-label" for="message">Message</label>
                        <div class="col-md-12">
                            <textarea name="message" id="message" cols="60" rows="10" onkeyup="disabledButton()"></textarea>
                        </div>
                        <div class="col-md-3">
                            <div class="demo-inline-spacing">
                                <div class="hideButtonSend">
                                    <button type="button" class="btn btn-primary" id="sendBroadcast"
                                        onclick="broadcastSend()" disabled>
                                        </span><i class="fa-regular fa-paper-plane me-1"></i>
                                        Send</button>
                                    <button type="button" class="btn btn-danger" onclick="refreshAll()"><span
                                            class="fa-solid fa-arrows-rotate me-1"></span>Refresh</button>
                                </div>

                                <div class="showButtonSend" hidden><button class="btn btn-primary" type="button" disabled>
                                        <span class="spinner-border me-1" role="status" aria-hidden="true"></span>
                                        Loading...
                                    </button>
                                    &nbsp;<button type="button" class="btn btn-danger" onclick="refreshAll()"><span
                                            class="fa-solid fa-arrows-rotate me-1"></span>Refresh</button></div>



                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        // $("#loading").hide();
        // document.getElementById('loading').style.display = 'block';

        function disabledButton() {
            var selectpicker = $('.selectpicker').val();
            var message = $("#message").val();
            if (selectpicker.length !== 0 && message !== '') {
                $('#sendBroadcast').attr('disabled', false)
            } else {
                $('#sendBroadcast').attr('disabled', true)

            }
        }

        function refreshAll() {
            $('#selectpickerSelectDeselect').selectpicker('deselectAll');
            var message = $("#message").val('');
        }

        function broadcastSend() {
            $('#sendBroadcast').attr('hidden', true)
            $('.showButtonSend').attr('hidden', false)

            var selectpicker = $('.selectpicker').val();
            console.log($("#message").val());
            $.ajax({
                type: 'GET',
                url: '{{ route('broadcast.sendMessage') }}',
                async: true,
                data: {
                    kontak: selectpicker,
                    message: $("#message").val(),
                },
                dataType: 'json',
                beforeSend: function() {

                    $('#loading').removeAttr('hidden');
                    $('.hideButtonSend').attr('hidden', true)
                },
                success: function(data) {
                    // console.log(data);
                    if (data.success == true) {
                        $("#message").val('');
                        $('#sendBroadcast').removeAttr('disabled');
                        $('#selectpickerSelectDeselect').selectpicker('deselectAll');
                        $('#loading').attr('hidden', true)
                        $('.showButtonSend').attr('hidden', true)
                        $('.hideButtonSend').attr('hidden', false)
                    }
                }
            });
        }
    </script>
@endsection
