@extends('layouts.admin')
@section('title', 'SISAP | Request Master Data')
@section('sub-title', 'Dashboard')
@section('breadcrumb')
    <li class="nav-home">
        <a href="#">
            <i class="flaticon-home"></i>
        </a>
    </li>
    <li class="separator">
        <i class="flaticon-right-arrow"></i>
    </li>
    <li class="nav-item">
        <a href="#">Home</a>
    </li>
    <li class="separator">
        <i class="flaticon-right-arrow"></i>
    </li>
    <li class="nav-item">
        <a href="#">Master Data Request</a>
    </li>
@endsection

@section('top-button-content')
    <button type="button" class="btn btn-primary mb-3" id="addRequest"><i class="fa fa-plus"></i> New Request</button>

@endsection
@section('content')
    <div class="table-responsive">
        <table id="req_datatable_index" class="display table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Request Number</th>
                    <th>Material Id</th>
                    <th>Description</th>
                    <th>Written date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody id="body">

            </tbody>
        </table>
    </div>
    @include('pages.mdt.request.create._create_req')
    @include('pages.mdt.request.create.modal._m_material_type')
    @include('pages.mdt.request.create.modal._m_division')
    @include('pages.mdt.request.create.modal._m_base_unit')
    @include('pages.mdt.request.create.modal._m_order_unit')
    @include('pages.mdt.request.create.modal._m_material_group')
    @include('pages.mdt.request.create.modal._m_purchasing_group')
    @include('pages.mdt.request.create.modal._m_sloc')

@endsection
@push('page-script')
    <script>
        // CLICK REQUEST MASTER DATA
        $(document).on('click', '#addRequest', function(e) {
            // alert('ok');
            e.preventDefault();
            $('#createReqModal').modal('show');
            $('.modal-title').text('Request Master Data Material Entry');
        });
        $(document).ready(function() {
            //GET DATA FROM DATATABLE
            var table = $('#req_datatable_index').DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                ajax: {
                    url: "{{ route('mdt.get_request_index_datatables') }}",
                    type: "POST",
                    'headers': {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },

                order: [
                    [0, 'asc']
                ],
                responsive: true,
                columns: [{
                        data: 'no',
                        name: 'id',
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'no_transaction',
                        name: 'no_transaction'
                    },
                    {
                        data: 'id_material',
                        name: 'id_material'
                    },
                    {
                        data: 'desc',
                        name: 'desc'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },

                ],
                order: [
                    [0, 'dsc']
                ]
            });
        });
    </script>
@endpush
