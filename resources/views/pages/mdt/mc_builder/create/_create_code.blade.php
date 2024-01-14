<div class="modal fade bd-example-modal-lg builderModal shadow" style="z-index: 1041" tabindex="-1" id="builderModal"
    role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" onclick=""><span>&times;</span></button>
            </div>
            <div class="row">
                <div class="col">
                    <div class="modal-body create-modal">
                        <div class="alert alert-danger print-error-msg" role="alert" style="display: none">
                            <ul></ul>
                        </div>
                        <form id="form-barangg" method="post" action="javascript:void(0)">
                            @csrf
                            @method('POST')
                            <input type="hidden" id="id_barang" name="id_barang">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Material For</label>
                                        {{-- <input type="text" name="kategori_barang" id="kategori_barang_create" class="form-control" placeholder="Kategori Barang"> --}}
                                        <select name="type" id="mc_for" class="form-control" onchange="check()">
                                            <option value="" disabled @readonly(true) selected>
                                            </option>
                                            <option value="raw_mat">Raw Material</option>
                                            <option value="prod">Production</option>
                                            <option value="non_prod">Non Prod</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Type Consume</label>
                                        <select name="type" id="mc_type_consume" class="form-control ">

                                        </select>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        {{-- <button type="button" data-toggle="tooltip"  data-placement="top" title="Add Item" class="btn btn-info" id="addRow"> Add Item</button> --}}
                        <button type="button" class="btn btn-secondary " data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-info saveBarang"><i class="ti-check"></i>
                            Simpan</button>

                        {{-- @php $counter @endphp --}}
                        {{-- <input type="hidden" id="jml_row" name="jml_row" value=""> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('page-script')
    <script>
        function check() {
            var pilih1 = document.getElementById("mc_for");
            var pilih2 = document.getElementById("mc_type_consume");

            // Bersihkan opsi sebelum menambahkan yang baru
            pilih2.innerHTML = "";

            // Ambil nilai dari Select pertama
            var selectedValue = pilih1.value;

            console.log("Selected Value:", selectedValue);

            // Tambahkan opsi ke Select kedua berdasarkan nilai dari Select pertama
            if (selectedValue === "prod") {
                addOptions(pilih2, ["Finish Good", "Semi Finish", "OHP"]);
            } else if (selectedValue === "non_prod") {
                addOptions(pilih2, ["Consumable", "Maintenance", "General"]);
            } else if (selectedValue === "raw_mat") {
                addOptions(pilih2, ["Pipe", "Sheet", "Coil", "Bar"]);
            }

            // console.log("Options in Select 2:", pilih2.innerHTML);
        }

        function addOptions(select, values) {
            values.forEach(function(value) {
                var option = document.createElement("option");
                option.value = value;
                option.text = value;
                select.add(option);
            });
        }
    </script>
@endpush
