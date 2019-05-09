@extends('layout::backend.master')

@section('breadcrumb')
    <a class="breadcrumb-item active" href="{{ route('thecao.index') }}">{{ $display_name }}</a>
    {{-- use lang in file global --}}
@endsection

@section('content')
    <div class="br-section-wrapper">
        {{-- Bg header --}}
        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-18 mg-b-10">
            <i class="fa fa-flag-o" aria-hidden="true"></i> &nbsp;
            @lang('global.list') {{ $display_name }}
        </h6>
        <hr> <br>

        {{-- Bg content --}}
        <div class="col-sm-2 col-md-2 pd-0">
            <button class="btn btn-info btn-block mg-b-20" onclick="window.location='{{ route('thecao.create') }}'">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp;
                @lang('global.add')
            </button>
        </div>

        <br>

        <div class="rounded table-responsive">
            <table class="table table-bordered mg-b-0" id="thecao_table">
                <thead>
                <tr>
                    <th class="wd-5p">@lang('global.order')</th>
                    <th class="wd-10p">Serial</th>
                    <th class="wd-10p">Mã thẻ</th>
                    <th class="wd-5p">Loại thẻ</th>
                    <th class="wd-5p">Mệnh giá</th>
                    <th class="wd-5p">Api</th>
                    <th class="wd-5p">Status</th>
                    <th class="wd-10p">@lang('global.create_at')</th>
                    <th class="wd-10p">@lang('global.action')</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // after create cms, you need create file js, then move all contents to it.
        // please use laravel mix to manager you js
        // webpack.mix.js

        $(document).ready(function () {

            $('#thecao_table').DataTable({
                autoWidth: true,
                processing: true,
                serverSide: true,
                ordering: false,
                ajax: {
                    url: app_url + 'admin/thecao/get_list_thecao',
                    type: 'post'
                },
                searching: true,
                columns: [
                    {data: 'DT_RowIndex', className: 'tx-center', searchable: false},
                    {data: 'serial'},
                    {data: 'mathe'},
                    {data: 'loaithe', className: 'tx-center'},
                    {data: 'menhgia'},
                    {data: 'api'},
                    {data: 'status' ,className: 'tx-center'},
                    {data: 'created_at', className: 'tx-center'},
                    {data: 'action', className: 'tx-center'},
                ],
            });

            $('#thecao_table').on('click', '.btn-edit', function () {
                window.location.href = app_url + 'admin/thecao/' + $(this).data('id') + '/edit';
            });

            $('#thecao_table').on('click', '.btn-delete', function (event) {
                event.preventDefault();

                swal({
                    title: Lang.get('global.are_you_sure_to_delete'),
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#00b297',
                    cancelButtonColor: '#d33',
                    confirmButtonText: Lang.get('global.confirm'),
                    cancelButtonText: Lang.get('global.cancle')
                }).then((result) => {
                    if (result.value) {

                        $.ajax({
                            url: app_url + 'admin/thecao/' + $(this).data('id'),
                            type: 'DELETE',
                            dataType: "JSON",
                            data: {
                                id: $(this).data('id')
                            },
                            success: function (res)
                            {
                                if (!res.err) {
                                    toastr.success(res.msg);
                                    $('#thecao_table').DataTable().ajax.reload();
                                } else {
                                    toastr.error(res.msg);
                                }
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
