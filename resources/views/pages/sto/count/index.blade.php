@extends('layouts.admin')
@section('title', 'SIS | STO')
@section('sub-title', 'Count Stock')
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
        <a href="#">Stock Opname</a>
    </li>
@endsection
@section('top-button-content')
    <button type="button" class="btn btn-primary mb-3" id="addMod"><i class="fa fa-plus"></i> Add Data</button>

@endsection


@section('content')
    <div class="table-responsive">
        <table id="stock_index" class="display table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Material Id</th>
                    <th>Description</th>
                    <th>Part Number</th>
                    <th>SLOC</th>
                    <th>QTY</th>
                    <th>Counted By</th>
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
            var table = $('#stock_index').DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                ajax: {
                    url: "{{ route('sto.get_stock_datatables') }}",
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
                        data: 'qty_count',
                        name: 'qty_count'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    }
                ],
                order: [
                    [0, 'dsc']
                ]
            });
        });
    </script>
@endpush
