@extends('layouts.admin')
@section('title', 'SIS | STO')
@section('sub-title', 'Assign User Sloc')
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
        <a href="#">Configuration</a>
    </li>
    <li class="separator">
        <i class="flaticon-right-arrow"></i>
    </li>
    <li class="nav-item">
        <a href="#">Assign User Sloc</a>
    </li>
@endsection
@section('top-button-content')
    <button type="button" class="btn btn-primary mb-3" id="addMod"><i class="fa fa-plus"></i> Add Data</button>

@endsection


@section('content')
    <div class="table-responsive">
        <table id="assign_user_sloc" class="display table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Group</th>
                    <th>Storage Location</th>
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
            var table = $('#assign_user_sloc').DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                ajax: {
                    url: "{{ route('sto.get_user_sloc_datatables') }}",
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
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'group',
                        name: 'group'
                    },
                    {
                        data: 'storage_location',
                        name: 'storage_location'
                    },
                ],
                order: [
                    [0, 'dsc']
                ]
            });
        });
    </script>
@endpush
