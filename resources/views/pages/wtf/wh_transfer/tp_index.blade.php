@extends('layouts.admin')
@section('title', 'SIS | STO')
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
        <a href="#">Transfer Posting</a>
    </li>
@endsection


@section('content')
    <style>
        .container {
            display: none;
        }
        .loader-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
        z-index: 9999; /* Mengatur z-index agar lebih tinggi dari kontennya */
        }

        .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 2s linear infinite; /* Safari */
        animation: spin 2s linear infinite;
        }

    /* Safari */
    @-webkit-keyframes spin {
    0% { -webkit-transform: rotate(0deg); }
    100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
    }
    </style>
    <form id="form" method="post">
        @csrf
        @method('POST')
        <div class="form-outline mb-4 ">
            {{-- <textarea class="form-control" id="input1" rows="3"></textarea> --}}
            <label class="form-label" for="textAreaExample6"></label>
            <input type="text" class="form-control" id="input" name="input" placeholder="" value=""
                required="">
        </div>
        {{-- <div class="container">
            <div class="row">
                <div class="col">
                    <img id="gambar" class="img-fluid" src="" alt="img" style="height: 150px;">
                </div>
            </div>
        </div> --}}
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <img id="gambar" class="card-img-top attractive-image" src="" alt="img"
                                style="height: 250px; widht:100px;">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div id="loading" class="loading-overlay">
            <div class="loading-alert">
              <p>Loading...</p>
            </div>
          </div> --}}
          <div id="loading-overlay" class="loader-overlay">
            <div class="loader"></div>
          </div>
        {{-- <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <img id="gambar" class="card-img-top" src="" alt="img"
                                style="height: 50%; opacity: 0; transition: opacity 0.5s;">

                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="row">
            <div class="col-12">
                <div class="datatable datatable-primary">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped  table-hover">
                            <thead class="text-center"
                                style="text-transform: uppercase; font-size: 14px; background-color:#20598f">
                                <tr class="text-center">
                                    <th style="width: 1%; font-size: 10px; " class="text-white text-center">
                                        KANBAN NO</th>
                                    <th style="width: 1%; font-size: 10px;" class="text-white text-center">
                                        SQUENCE</th>
                                    <th style="width: 3%; font-size: 10px;" class="text-white text-center">
                                        PART NO</th>
                                    <th style="width: 2%; font-size: 10px;" class="text-white text-center">
                                        ITEM CODE</th>
                                    <th style="width: 1%; font-size: 10px;" class="text-white text-center">
                                        QTY</th>
                                    <th style="width: 1%; font-size: 10px;" class="text-white text-center">
                                        UNIT</th>
                                    <th style="width: 0%; font-size: 10px;" class="text-white text-center">
                                        CUSTOMER</th>
                                    <th style="width: 0%; font-size: 10px;" class="text-white text-center">
                                        FROM</th>
                                    <th style="width: 0%; font-size: 10px;" class="text-white text-center">
                                        TO</th>
                                    {{-- <th style="width: 1%; font-size: 10px;" class="text-white text-center">
                                    </th> --}}
                                </tr>
                            </thead>
                            <tbody id="body">
                            </tbody>
                        </table>
                        <input type="hidden" id="jml_row" name="jml_row" value="">
                    </div>
                </div>
            </div>
        </div>
        <br>
        {{-- <div class="text-right">
            <button type="button" class="btn btn-secondary btn-lg addScanIn"><i class="ti-check"></i> Save</button>
        </div> --}}
        <audio id="Audiosucces" src="{{ asset('audio\succes.mp3') }}"></audio>
        <audio id="Audioerror" src="{{ asset('audio\error.mp3') }}"></audio>
    </form>
    <!-- General JS Scripts -->
    </body>

    </html>
    @include('pages.wtf.wh_transfer.ajax')
@endsection('content')
