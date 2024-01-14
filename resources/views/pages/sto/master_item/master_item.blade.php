@extends('layouts.admin')
@section('title', 'SIS | STO')
@section('sub-title', 'Master Item')
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
        <a href="{{ url('/') }}">Home</a>
    </li>
    <li class="separator">
        <i class="flaticon-right-arrow"></i>
    </li>
    <li class="nav-item">
        <a href="#">Stock Opname</a>
    </li>
    <li class="separator">
        <i class="flaticon-right-arrow"></i>
    </li>
    <li class="nav-item">
        <a href="{{ url('/sto/master_item') }}">Master Item</a>
    </li>
@endsection

@section('top-button-content')
    <button type="button" class="btn btn-primary mb-3" id="addMod"><i class="fa fa-plus"></i> Add Data</button>
    <button type="button" class="btn btn-warning mb-3" id="addMod"><i class="fa fa-upload"></i> Upload Data</button>

@endsection
@section('content')
    <div class="table-responsive">
        <table id="master_data" class="display table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>PID Number</th>
                    <th>Material</th>
                    <th>Description</th>
                    <th>Part Number</th>
                    <th>Storage Location</th>
                    <th>Quantity On SAP</th>
                </tr>
            </thead>
            <tbody id="body">



            </tbody>
        </table>
    </div>

@endsection
@push('page-script')
    <script>
        $(document).ready(function() {
            //get data from datatables
            var table = $('#master_data').DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                ajax: {
                    url: "{{ route('sto.get_datatables') }}",
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
                        data: 'pid_no',
                        name: 'pid_no'
                    },
                    {
                        data: 'material_id',
                        name: 'material_id'
                    },
                    {
                        data: 'material_desc',
                        name: 'material_desc'
                    },
                    {
                        data: 'part_number',
                        name: 'part_number'
                    },
                    {
                        data: 'storage_location',
                        name: 'storage_location'
                    },
                    {
                        data: 'quantity_sap',
                        name: 'quantity_sap'
                    }
                ],
                order: [
                    [0, 'dsc']
                ]
            });
        });
    </script>
@endpush
