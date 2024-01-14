<script>
    var input = document.getElementById("input");
    var table = document.getElementById("myTable")

    // var row_count = 0;

    $(document).ready(function() {
        input.focus();
        var table = $('#myTable').DataTable({
            "pagingType": "simple_numbers",
            "searching": false,
            "ordering": false,
            // "pageLength": 5,
            "lengthChange": false,
            "pageLength": 15

        });

        // input.focus();
        $('#input').on('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                showLoading();
                var inputVal = $('#input').val();
                // console.log(inputVal);
                if (inputVal.includes(",")) {

                    var arr = inputVal.split(',');
                    //console.log(arr.length);
                    var val1 = arr[0];
                    // console.log(val1);
                    var val2 = arr[1];
                    // console.log(val2);
                    csrf_token = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: "{{ route('validasi_param1') }}",
                        method: 'get',
                        dataType: 'json',
                        data: {
                            '_token': csrf_token,
                            'val1': val1,
                            'val2': val2
                        },
                        success: function(data) {
                            //console.log("1");
                            if (data != "") {
                                // alert('data ada');
                                var kanban_no = arr[0];
                                var sq = arr[1];
                                var part_no = arr[2];
                                var mtr_code = arr[3];
                                var qty = arr[4]
                                var satuan = arr[5]
                                var type_knbn = arr[6]
                                var cust = arr[7]
                                var knbn_int = arr[8]
                                var from_sloc = arr[9]
                                var to_sloc = arr[10]
                                var from_plant = arr[11]
                                var to_plant = arr[12]
                                // console.log(kanban_no);
                                // console.log(sq);
                                csrf_token = $('meta[name="csrf-token"]').attr('content');
                                $.ajax({
                                    url: "{{ route('validasi_data1') }}",
                                    method: 'get',
                                    dataType: 'json',
                                    data: {
                                        '_token': csrf_token,
                                        'kanban_no': kanban_no,
                                        'squence': sq,
                                        'part_no': part_no,
                                        'material_code': mtr_code,
                                        'qty_kanban': qty,
                                        'satuan': satuan,
                                        'type_kanban': type_knbn,
                                        'cust': cust,
                                        'kanban_int': knbn_int,
                                        'from_sloc': from_sloc,
                                        'to_sloc': to_sloc,
                                        'from_plant': from_plant,
                                        'to_plant': to_plant
                                    },
                                    success: function(data) {
                                        console.log(data);
                                        var tableData = table.rows().data();
                                        if (tableData.length >= 15) {
                                            document.getElementById('Audioerror').play();
                                            swal.fire({
                                                icon: 'error',
                                                timer: 2000,
                                                title: 'Error',
                                                text: 'Data cannot exceed 15 rows',
                                            });
                                            return;
                                        }
                                        if (data == '') {
                                            console.log("2");
                                            var kanbanElements = document.getElementsByName("kanban_no[]");
                                            // console.log(kanbanElements);
                                            var sqElements = document.getElementsByName("sq[]");

                                            var alreadyExists = false;
                                            for (var i = 0; i < kanbanElements.length; i++) {
                                                if (kanbanElements[i].value ===arr[0] && sqElements[i].value === arr[1]) {
                                                    alreadyExists = true;
                                                    break;
                                                }
                                            }
                                            // console.log(alreadyExists);
                                            if (alreadyExists) {
                                                document.getElementById('Audioerror').play();
                                                swal.fire({
                                                    icon: 'error',
                                                    timer: 2000,
                                                    title: 'Perhatian',
                                                    text: 'Data Already Scan',
                                                });
                                                hideLoading();
                                            } else {
                                                console.log("3");
                                                var t = $('#myTable').DataTable();
                                                var counter = t.rows().count();
                                                var jml_row = Number(counter) +1;
                                                var kanban_no = "kanban_no" + jml_row;
                                                var sq = "sq" + jml_row;
                                                var kode_item = "kode_item" + jml_row;
                                                var part_no = "part_no" + jml_row;
                                                var qty = "qty" + jml_row;
                                                var cust = "cust" + jml_row;
                                                var satuan = "satuan" + jml_row;
                                                var from_sl = "from_sloc" +jml_row;
                                                var to_sl = "to_sloc" + jml_row;


                                                t.row.add([
                                                    '<input type="text" class=" text-center" id="' +kanban_no +'" name="kanban_no[]" value="' +arr[0] +'" readonly>',
                                                    '<input type="text" class=" text-center" id="' +sq +'" name="sq[]" value="' +arr[1] +'" readonly>',
                                                    '<input type="text" class=" text-center" id="' +part_no +'" name="part_no[]" value="' +arr[2] +'" readonly>',
                                                    '<input type="text" class=" text-center" id="' +kode_item +'" name="kode_item[]" value="' +arr[3] +'" readonly>',
                                                    '<input type="text" class=" text-center" id="' +qty +'" name="qty[]" value="' +arr[4] +'" readonly>',
                                                    '<input type="text" class=" text-center" id="' +satuan +'" name="satuan[]" value="' +arr[5] +'" readonly>',
                                                    '<input type="text" class=" text-center" id="' +cust +'" name="cust[]" value="' +arr[7] +'" readonly>',
                                                    '<input type="text" class=" text-center" id="' +from_sl +'" name="from_sl[]" value="' +arr[9] +'" readonly>',
                                                    '<input type="text" class=" text-center" id="' +to_sl +'" name="to_sl[]" value="' +arr[10] +'" readonly>',
                                                ]).draw();
                                                hideLoading();
                                                var part_no = arr[2];
                                                var item_code = arr[3];
                                                // console.log(kode_item);
                                                csrf_token = $('meta[name="csrf-token"]').attr('content');
                                                $.ajax({
                                                    url: "{{ route('validasi_data3') }}",
                                                    method: 'get',
                                                    dataType: 'json',
                                                    data: {
                                                        '_token': csrf_token,
                                                        'part_no': part_no,
                                                        'item_code': item_code
                                                    },success: function(data) {
                                                        // console.log(data);
                                                        // alert(data);
                                                        //console.log("4");
                                                        var id = data.id;
                                                        // console.log(id);
                                                        csrf_token =$('meta[name="csrf-token"]').attr('content');
                                                        $.ajax({
                                                            url: "{{ route('get_paramblob_image1') }}",
                                                            method: 'get',
                                                            dataType: 'json',
                                                            data: {
                                                                '_token': csrf_token,
                                                                'id': id
                                                            },success: function(data) {
                                                                // console.log(
                                                                //     data
                                                                // );
                                                                console.log("5");
                                                                if (data.img_blob) {
                                                                    // Tampilkan elemen container jika data gambar tersedia
                                                                    $('.container').show();
                                                                    // Setel sumber gambar jika data gambar tersedia
                                                                    $('#gambar').attr('src',data.img_blob);
                                                                } else {
                                                                    // Sembunyikan elemen container jika data gambar tidak tersedia
                                                                    $('.container').hide();
                                                                }
                                                            }
                                                        });

                                                    }
                                                });
                                            }
                                        } else {
                                            document.getElementById('Audioerror').play();
                                            swal.fire({
                                                icon: 'error',
                                                timer: 8000,
                                                title: 'Error',
                                                text: data,

                                            });
                                     

                                        }
                                    }
                                });
                            } else if (data == "") {
                                //console.log("6");
                                // alert("tidak ada ");
                                csrf_token = $('meta[name="csrf-token"]').attr('content');
                                $.ajax({
                                    url: "{{ route('validasi_param2') }}",
                                    method: 'get',
                                    dataType: 'json',
                                    data: {
                                        '_token': csrf_token,
                                        'val1': val1,
                                        'val2': val2
                                    },
                                    success: function(data) {
                                        if (data != "") {
                                            console.log("7");
                                            // alert('data ada');
                                            var kanban_no = arr[0];
                                            var sq = arr[1];
                                            // console.log(kanban_no, sq);
                                            csrf_token = $('meta[name="csrf-token"]').attr('content');
                                            $.ajax({
                                                url: "{{ route('validasi_data2') }}",
                                                method: 'get',
                                                dataType: 'json',
                                                data: {
                                                    '_token': csrf_token,
                                                    'kanban_no': kanban_no,
                                                    'squence': sq
                                                },
                                                success: function(data) {
                                                    console.log("8");
                                                    // alert(
                                                    //     'validasi no data lanjut ke tabel'
                                                    // )
                                                    // console.log(data);
                                                    var tableData = table.rows().data();
                                                    if (tableData.length >=15) {
                                                        document.getElementById('Audioerror').play();
                                                        swal.fire({
                                                            icon: 'error',
                                                            timer: 2000,
                                                            title: 'Error',
                                                            text: 'Data cannot exceed 15 rows',
                                                        });
                                                        return;
                                                    }
                                                    if (data =='') {
                                                        console.log("9");
                                                        var kanbanElements = document.getElementsByName("kanban_no[]");
                                                        var sqElements = document.getElementsByName("sq[]");

                                                        var alreadyExists = false;
                                                        for (var i = 0; i < kanbanElements.length; i++
                                                        ) {
                                                            if (kanbanElements[i].value === arr[1] && sqElements[i].value === arr[2]
                                                            ) {
                                                                alreadyExists = true;
                                                                break;
                                                            }
                                                        }
                                                        if (alreadyExists) {
                                                            document.getElementById('Audioerror').play();
                                                            swal.fire({
                                                                icon: 'error',
                                                                timer: 2000,
                                                                title: 'Perhatian',
                                                                text: 'Data Already Scan',
                                                            });
                                                        } else {
                                                            // Add new row to datatable
                                                            console.log("10");
                                                            var t =$('#myTable').DataTable();
                                                            var counter = t.rows().count();
                                                            var jml_row = Number(counter) +1;
                                                            var kanban_no = "kanban_no" + jml_row;
                                                            var sq = "sq" + jml_row;
                                                            var part_no = "part_no" + jml_row;
                                                            var kode_item = "kode_item" + jml_row;
                                                            var qty = "qty" + jml_row;
                                                            var cust = "cust" + jml_row;
                                                            t.row
                                                                .add(
                                                                    [
                                                                        '<input type="text" class=" text-center" id="' +kanban_no +'" name="kanban_no[]" value="' +arr[1] +'" readonly>',
                                                                        '<input type="text" class=" text-center" id="' +sq +'" name="sq[]" value="' +arr[2] +'" readonly>',
                                                                        '<input type="text" class=" text-center" id="' +part_no +'" name="part_no[]" value="' +arr[3] +'" readonly>',
                                                                        '<input type="text" class=" text-center" id="' +kode_item +'" name="kode_item[]" value="' +arr[4] +'" readonly>',
                                                                        '<input type="text" class=" text-center" id="' +qty +'" name="qty[]" value="' +arr[5] +'" readonly>',
                                                                        '<input type="text" class=" text-center" id="' +cust +'" name="cust[]" value="' +arr[6] +'" readonly>',
                                                                        // '<div class="text-center"><button class="delete-row btn btn-danger btn-sm"><i class="fa fa-trash remove"></i></button></div>',
                                                                    ]
                                                                ).draw();
                                                            var part_no = arr[2];
                                                            var item_code = arr[3];
                                                            // console.log(kode_item);
                                                            csrf_token = $('meta[name="csrf-token"]').attr('content');
                                                            $.ajax({
                                                                url: "{{ route('validasi_data4') }}",
                                                                method: 'get',
                                                                dataType: 'json',
                                                                data: {
                                                                    '_token': csrf_token,
                                                                    'part_no': part_no,
                                                                    'item_code': item_code
                                                                },
                                                                success: function(data) {
                                                                    // console.log(data);
                                                                    console.log("11");
                                                                    var id = data.id;
                                                                    csrf_token = $('meta[name="csrf-token"]').attr('content');
                                                                    $.ajax({
                                                                        url: "{{ route('get_paramblob_image2') }}",
                                                                        method: 'get',
                                                                        dataType: 'json',
                                                                        data: {
                                                                            '_token': csrf_token,
                                                                            'id': id
                                                                        },
                                                                        success: function(data) {
                                                                            console.log("12");
                                                                            if (data.img_blob) {
                                                                                $('.container').show();
                                                                                $('#gambar').attr('src', data.img_blob);
                                                                            } else {
                                                                                $('.container').hide();
                                                                            }
                                                                        }
                                                                    });
                                                                }
                                                            });
                                                        }
                                                    } else {
                                                        document.getElementById('Audioerror').play();
                                                        swal.fire({
                                                            icon: 'error',
                                                            timer: 2000,
                                                            title: 'Error',
                                                            text: 'Data Already exists',
                                                        });
                                                    }
                                                }
                                            });

                                        } else if (data == "") {
                                            // alert('data tidak ada');
                                            swal.fire({
                                                icon: 'error',
                                                timer: 2000,
                                                title: 'Error',
                                                text: 'Data Not Found',
                                            });
                                            hideLoading();
                                        }
                                    }
                                })
                            }
                        }
                    });
                } else if (inputVal === "SendCode") {
                    hideLoading();
                    csrf_token = $('meta[name="csrf-token"]').attr('content');
                    // Fungsi untuk melakukan validasi Ajax
                    
                    validateItemTransfer().done(function(response) {
                        // console.log(response);
                        // Cek apakah item valid
                        if (response === "Valid") {
                            // Jika valid, lanjutkan dengan pengiriman data
                            handleSubmission();
                        } else {
                            // Jika tidak valid, tampilkan pesan kesalahan
                            var jsonString = JSON.stringify(response, null, 2);
                            var cleanString = jsonString.replace(/[\{\}\"]/g, '');
                            swal.fire({
                                icon: 'warning',
                                title: 'Some kanban have already been scanned, please remove the kanban and rescan the others.',
                                timer: 10000,
                                text: cleanString,
                            });
                            $('.container').hide();
                            $('#myTable').DataTable().clear().draw();
                        }
                    });
                    
                } else if (inputVal === "reset") {
                        $('.container').hide();
                        $('#myTable').DataTable().clear().draw();
                        hideLoading();
                    
                } else {
                    var arr = [""];
                    $('#input').val("");
                    //     $('#input').focus("");
                    //     return;
                }
                var inputArr = inputVal.split(',');

                $(document).on('click', '.delete-row', function() {
                    var table = $('#myTable').DataTable();
                    var row = $(this).closest('tr');
                    // console.log(row);
                    table.row(row).remove().draw();
                    $('#input').focus("");
                });

                // clear input
                $('#input').val('');

                // update jml_row input value
                $('#jml_row').val(table.rows().count());
                $('#input').focus("");
            }
        });
    });
    function showLoading() {
        $('#loading-overlay').css('display', 'flex');
        $('#loading-overlay').show();
    }

    function hideLoading() {
        $('#loading-overlay').hide();
        $('#loading-overlay').css('display', 'none');
    }
    function validateItemTransfer() {
        return $.ajax({
            url: "{{ route('CheckScanIn') }}",
            method: 'GET',
            dataType: 'json',
            data: $('#form').serialize(),
        });
    }
    function handleSubmission(){
        $.ajax({
            url: "{{ route('AddScanIn') }}",
            method: 'POST',
            dataType: 'json',
            data: $('#form').serialize(),
            success: function(data) {
                //console.log(data);
                if (data == "S") {
                    document.getElementById('Audiosucces').play();
                    swal.fire({
                        icon: 'success',
                        title: 'Success',
                        timer: 5000,
                        text: 'Data submit successfully',
                    }).then(() => {
                        $('.container').css('display', 'none');
                        $('#myTable').DataTable().clear().draw();
                        location.reload();
                    });
                    
                } else {
                    swal.fire({
                        icon: 'warning',
                        title: 'Perhatian',
                        timer: 5000,
                        text: data,
                    });

                }

            }
        });
    }
</script>
{{-- notes : penambahan loading ketika memasukan data ajax dan index --}}
