@extends('layouts.admin')
@section('title', 'SISAP | Master Data')
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
        <a href="#">Material Code Builder</a>
    </li>
@endsection
@section('top-button-content')
    <button type="button" class="btn btn-primary mb-3" id="build"><i class="fa fa-plus"></i> Build</button>

@endsection


@section('content')
    <div class="table-responsive">
        <table id="basic-datatables" class="display table table-striped table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </tfoot>
            <tbody>
                <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td>$320,800</td>
                </tr>

                <tr>
                    <td>Donna Snider</td>
                    <td>Customer Support</td>
                    <td>New York</td>
                    <td>27</td>
                    <td>2011/01/25</td>
                    <td>$112,000</td>
                </tr>
            </tbody>
        </table>
    </div>
    @include('pages.mdt.mc_builder.create._create_code')
@endsection
@push('page-script')
    <script>
        // CLICK REQUEST MASTER DATA
        $(document).on('click', '#build', function(e) {
            // alert('ok');
            e.preventDefault();
            $('#builderModal').modal('show');
            $('.modal-title').text('Build Material Code');
        });
        
    </script>
@endpush
