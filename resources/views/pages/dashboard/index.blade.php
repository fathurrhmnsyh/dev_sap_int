@extends('layouts.admin_home')
@section('title', 'Dashboard | SIS (SAP Integration System)')
@section('sub-title', 'DataTables.Net')


@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="panel-header bg-primary-gradient">
                <div class="page-inner py-5">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                        <div>
                            <h2 class="text-white pb-2 fw-bold">Welcome Back,</h2>
                            <h5 class="text-white op-7 mb-2">{{ auth()->user()->name }}</h5>
                        </div>
                        {{-- <div class="ml-md-auto py-2 py-md-0">
                            <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
                            <a href="#" class="btn btn-secondary btn-round">Add Customer</a>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="page-inner mt--5">
                <div class="row">
                    @foreach ($module as $m)
                        <div class="col-sm-6 col-lg-3">
                            <div class="card p-3">
                                <div class="d-flex align-items-center">
                                    <span class="stamp stamp-md {{ $m->bg_icon }} mr-3">
                                        <i class="{{ $m->icon }}"></i>
                                    </span>
                                    <div>
                                        <h5 class="mb-1"><b><a href="{{ $m->url }}">{{ $m->name }}
                                                    <small></small></a></b>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- <div class="row row-card-no-pd mt--2">
                    <div class="col-sm-6 col-md-6">
                        <div class="card card-stats card-round">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="icon-big text-center">
                                            <i class="flaticon-user-5 text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 col-stats">
                                        <div class="numbers">
                                            <p class="card-category"></p>
                                            <h4 class="card-title">Admin</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="card card-stats card-round">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="icon-big text-center">
                                            <i class="flaticon-box-2 text-success"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 col-stats">
                                        <div class="numbers">
                                            <p class="card-category"></p>
                                            <h4 class="card-title">STO</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
            {{-- <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="icon-big text-center">
                                            <i class="flaticon-error text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 col-stats">
                                        <div class="numbers">
                                            <p class="card-category">Errors</p>
                                            <h4 class="card-title">23</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
            {{-- <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="icon-big text-center">
                                            <i class="flaticon-twitter text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 col-stats">
                                        <div class="numbers">
                                            <p class="card-category">Followers</p>
                                            <h4 class="card-title">+45K</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
        </div>
    </div>


@endsection
