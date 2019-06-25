@extends('layout::backend.master')

@section('breadcrumb')
    <a class="breadcrumb-item" href="{{ route('thecaoapi.index') }}">{{ $display_name }}</a>
    <a class="breadcrumb-item active" href="{{ route('thecaoapi.create') }}">@lang('global.edit')</a>
@endsection

@section('content')
    <div class="br-section-wrapper">
        {{-- Bg header --}}
        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-18 mg-b-10">
            <i class="fa fa-edit" aria-hidden="true"></i> &nbsp;
            @lang('global.edit') {{ $display_name }}
        </h6>
        <hr> <br>

        {{-- Bg content --}}
        <form action="{{ route('thecaoapi.update', $thecaoapi->id) }}" method="post" enctype="multipart/form-data" id="frm_edit_thecaoapi">
            @csrf
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="thecaoapi_id" id="thecaoapi_id" value="{{ $thecaoapi->id }}">


            <div class="form-group">
                <label for="" class="tx-bold">Api Setting</label>
                <select class="form-control" name="api" id="api">
                    @foreach($apiwebs as $apiweb)
                        @if($thecaoapi->api == $apiweb->id)
                        <option value="{{$apiweb->id}}" selected >{{$apiweb->name}}</option>
                        @else
                        <option value="{{$apiweb->id}}">{{$apiweb->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>


            <div class="col-sm-1 col-md-1 pd-0">
                <button type="submit" class="btn btn-info btn-block mg-b-20" id="btn-create"><i class="fa fa-floppy-o" aria-hidden="true"></i> &nbsp;@lang('global.save')</button>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        $('#frm_edit_thecaoapi').on('submit', function (event) {
            event.preventDefault();

            var form = $('#frm_edit_thecaoapi');

            $('span[class=error]').remove();

            if (!form.valid()) {
                return false;
            }

            updateThecaoapi(form.serialize());
        });

        $('#frm_edit_thecaoapi').validate({
            errorElement: "span",
            rules: {
                name: {
                    required: true
                },
                content: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: Lang.get('user.please_enter_name')
                },
                content: {
                    required: Lang.get('global.please_enter_content')
                }
            },
        });

        function updateThecaoapi(data) {
            $.ajax({
                url: app_url + 'admin/thecaoapi/' + $('#thecaoapi_id').val(),
                type: 'PATCH', // GET, POST, PUT, PATCH, DELETE,
                data: {
                    data: data
                },
                success: function (res)
                {
                    if (!res.err) {
                        toastr.success(res.msg);

                        setTimeout(function () {
                            window.location.href = app_url + 'admin/thecaoapi';
                        }, 2000);

                        $('#btn-update').attr("disabled", "disabled");
                    } else {
                        toastr.error(res.msg);
                    }
                }
            });
        }
    </script>
@endsection
