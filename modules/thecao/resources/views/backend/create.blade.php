@extends('layout::backend.master')

@section('breadcrumb')
    <a class="breadcrumb-item" href="{{ route('thecao.index') }}">{{ $display_name }}</a>
    <a class="breadcrumb-item active" href="{{ route('thecao.create') }}">@lang('global.add')</a>
@endsection

@section('content')
    <div class="br-section-wrapper">
        {{-- Bg header --}}
        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-18 mg-b-10">
            <i class="fa fa-plus" aria-hidden="true"></i> &nbsp;
            @lang('global.add') {{ $display_name }}
        </h6>
        <hr> <br>

        {{-- Bg content --}}
        <form action="{{ route('thecao.store') }}" method="post" enctype="multipart/form-data" id="frm_create_thecao">
            @csrf
            <div class="form-group">
                <label for="" class="tx-bold">@lang('global.name')</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="@lang('global.please_enter_content')">
            </div>

            <div class="form-group">
                <label for="" class="tx-bold">@lang('global.content')</label>
                <textarea name="content" id="content" rows="5" class="form-control" placeholder="@lang('global.please_enter_content')"></textarea>
            </div>

            <div class="form-group">
                <label for="" class="tx-bold">@lang('global.status')</label>
                <select class="form-control" name="status" id="status">
                    <option value="1">@lang('global.show')</option>
                    <option value="0">@lang('global.hide')</option>
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
        $('#frm_create_thecao').on('submit', function (event) {
            event.preventDefault();

            var form = $('#frm_create_thecao');

            $('span[class=error]').remove();

            if (!form.valid()) {
                return false;
            }

            createThecao(form.serialize());
        });

        $('#frm_create_thecao').validate({
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

        function createThecao(data) {
            $.ajax({
                url: app_url + 'admin/thecao',
                type: 'POST', // GET, POST, PUT, PATCH, DELETE,
                data: {
                    data: data
                },
                success: function (res)
                {
                    if (!res.err) {
                        toastr.success(res.msg);

                        setTimeout(function () {
                            window.location.href = app_url + 'admin/thecao';
                        }, 2000);

                        $('#btn-create').attr("disabled", "disabled");
                    } else {
                        toastr.error(res.msg);
                    }
                }
            });
        }
    </script>
@endsection
