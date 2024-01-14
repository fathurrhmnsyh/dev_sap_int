<div class="modal fade bd-example-modal-lg modalcreate" data-backdrop="static" data-keyboard="false" style="z-index: 1041"
    tabindex="-1" id="createReqModal" role="dialog">
    <div class="modal-dialog" style="max-width: 1350px!important;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" onclick=""><span>&times;</span></button>
            </div>
            <div class="row">
                <div class="col">
                    <div class="modal-body">
                        <form id="form_asset_entry" method="post" action="javascript:void(0)">
                            @csrf
                            <div class="form-row" style="font-size: 11px;">
                                <div class="col-xl-6 border-left">


                                    <div class="form-row align-items-center mb-1">
                                        <div class="col-5">
                                            <div class="form-row align-items-center">
                                                <div class="col-5">
                                                    <label class="auto-middle" for="mdt_create_plant">Plant<span
                                                            style="color: red">**</span></label>
                                                </div>
                                                <div class="col-7">
                                                    <select name="plant" id="mdt_create_plant"
                                                        class="form-control form-control-sm selectpicker border">
                                                        <option value="" disabled @readonly(true) selected>
                                                        </option>
                                                        <option value="1701">1701 - TCH Cikarang</option>
                                                        <option value="1702">1702 - TCH Cirebon</option>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="form-row align-items-center">
                                                <div class="col-5">
                                                    <label class="auto-middle" for="mdt_create_mat_type">Material
                                                        Type<span style="color: red">**</span></label>
                                                </div>
                                                <div class="col-7">
                                                    <div class="input-group">
                                                        <input class="form-control form-control-sm" name="ip_no"
                                                            type="text" autocomplete="off" id="mdt_create_mat_type"
                                                            readonly placeholder="Search Material Type">
                                                        <span class="input-group-btn">
                                                            <button type="button" id="btnPopUp"
                                                                onclick="matTypeSearch()" class="btn btn-info btn-xs"><i
                                                                    class="fa fa-search"></i></button>
                                                        </span><br>
                                                        {{-- <i style="color: red; font-size: 11px;">(*) Press Enter/Search Button</i> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-row align-items-center mb-1">
                                        <div class="col-5">
                                            <div class="form-row align-items-center">
                                                <div class="col-5">
                                                    <label class="auto-middle" for="mdt_create_mat_id">ID
                                                        Material<span style="color: red">**</span></label>
                                                </div>
                                                <div class="col-7">
                                                    <input type="text" name="mdt_create_mat_id"
                                                        id="mdt_create_mat_id"
                                                        oninput="convertToUppercaseItemcode(this)"
                                                        class="form-control form-control-sm">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="form-row align-items-center">
                                                <div class="col-5">
                                                    <label class="auto-middle" for="mdt_create_mat_desc">Material
                                                        Description<span style="color: red">**</span></label>
                                                </div>
                                                <div class="col-7">
                                                    <input type="text" name="mdt_create_mat_desc"
                                                        id="mdt_create_mat_desc" oninput="convertToUppercaseDesc(this)"
                                                        class="form-control form-control-sm">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row align-items-center mb-1">
                                        <div class="col-5">
                                            <div class="form-row align-items-center">
                                                <div class="col-5">
                                                    <label class="auto-middle" for="mdt_create_old_mat">Old
                                                        Material<span style="color: red">**</span></label>
                                                </div>
                                                <div class="col-7">
                                                    <input type="text" name="mdt_create_old_mat"
                                                        id="mdt_create_old_mat" oninput="convertToUppercaseOld(this)"
                                                        class="form-control form-control-sm">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="form-row align-items-center">
                                                <div class="col-5">
                                                    <label class="auto-middle" for="mdt_create_division">Division<span
                                                            style="color: red">**</span></label>
                                                </div>
                                                <div class="col-7">
                                                    <div class="input-group">
                                                        <input class="form-control form-control-sm" name="ip_no"
                                                            type="text" autocomplete="off"
                                                            id="mdt_create_division" readonly placeholder="Division">
                                                        <span class="input-group-btn">
                                                            <button type="button" id="btnPopUp"
                                                                onclick="divisionSearch()"
                                                                class="btn btn-info btn-xs"><i
                                                                    class="fa fa-search"></i></button>
                                                        </span><br>
                                                        {{-- <i style="color: red; font-size: 11px;">(*) Press Enter/Search Button</i> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row align-items-center mb-1">
                                        <div class="col-5">
                                            <div class="form-row align-items-center">
                                                <div class="col-5">
                                                    <label class="auto-middle" for="mdt_create_base_unit">Base
                                                        Unit<span style="color: red">**</span></label>
                                                </div>
                                                <div class="col-7">
                                                    <div class="input-group">
                                                        <input class="form-control form-control-sm" name="ip_no"
                                                            type="text" autocomplete="off"
                                                            id="mdt_create_base_unit" readonly
                                                            placeholder="Base Unit">
                                                        <span class="input-group-btn">
                                                            <button type="button" id="btnPopUp"
                                                                onclick="baseUnitSearch()"
                                                                class="btn btn-info btn-xs"><i
                                                                    class="fa fa-search"></i></button>
                                                        </span><br>
                                                        {{-- <i style="color: red; font-size: 11px;">(*) Press Enter/Search Button</i> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="form-row align-items-center">
                                                <div class="col-5">
                                                    <label class="auto-middle" for="mdt_create_order_unit">Order
                                                        Unit<span style="color: red">**</span></label>
                                                </div>
                                                <div class="col-7">
                                                    <div class="input-group">
                                                        <input class="form-control form-control-sm" name="ip_no"
                                                            type="text" autocomplete="off"
                                                            id="mdt_create_order_unit" readonly
                                                            placeholder="Order Unit">
                                                        <span class="input-group-btn">
                                                            <button type="button" id="btnPopUp"
                                                                onclick="orderUnitSearch()"
                                                                class="btn btn-info btn-xs"><i
                                                                    class="fa fa-search"></i></button>
                                                        </span><br>
                                                        {{-- <i style="color: red; font-size: 11px;">(*) Press Enter/Search Button</i> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row align-items-center mb-1">
                                        <div class="col-5">
                                            <div class="form-row align-items-center">
                                                <div class="col-5">
                                                    <label class="auto-middle"
                                                        for="mdt_create_material_group">Material
                                                        Group<span style="color: red">**</span></label>
                                                </div>
                                                <div class="col-7">
                                                    <div class="input-group">
                                                        <input class="form-control form-control-sm" name="ip_no"
                                                            type="text" autocomplete="off"
                                                            id="mdt_create_material_group" readonly
                                                            placeholder="Material Group">
                                                        <span class="input-group-btn">
                                                            <button type="button" id="btnPopUp"
                                                                onclick="materialGroupSearch()"
                                                                class="btn btn-info btn-xs"><i
                                                                    class="fa fa-search"></i></button>
                                                        </span><br>
                                                        {{-- <i style="color: red; font-size: 11px;">(*) Press Enter/Search Button</i> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="form-row align-items-center">
                                                <div class="col-5">
                                                    <label class="auto-middle"
                                                        for="mdt_create_purchsing_group">Purchasing
                                                        Group<span style="color: red">**</span></label>
                                                </div>
                                                <div class="col-7">
                                                    <div class="input-group">
                                                        <input class="form-control form-control-sm" name="ip_no"
                                                            type="text" autocomplete="off"
                                                            id="mdt_create_purchsing_group" readonly
                                                            placeholder="Purchasing Group">
                                                        <span class="input-group-btn">
                                                            <button type="button" id="btnPopUp"
                                                                onclick="purchasingGroupSearch()"
                                                                class="btn btn-info btn-xs"><i
                                                                    class="fa fa-search"></i></button>
                                                        </span><br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row align-items-center mb-1">
                                        <div class="col-4">
                                            <div class="form-row align-items-center">
                                                <div class="col-6">
                                                    <label class="auto-middle" for="mdt_create_sloc">SLOC</label>
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-group">
                                                        <input class="form-control form-control-sm" name="sloc"
                                                            type="text" autocomplete="off" id="mdt_create_sloc"
                                                            readonly placeholder="SLOC">
                                                        <span class="input-group-btn">
                                                            <button type="button" id="btnPopUp"
                                                                onclick="slocSearch()" class="btn btn-info btn-xs"><i
                                                                    class="fa fa-search"></i></button>
                                                        </span><br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-row align-items-center">
                                                <div class="col-4">
                                                    <label class="auto-middle" for="ma_create_ssd_type">Issue
                                                        SLOC</label>
                                                </div>
                                                <div class="col-8">
                                                    <input type="number" name="ma_create_ssd_type"
                                                        id="ma_create_ssd_type" class="form-control form-control-sm"
                                                        autocomplete="off" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-row align-items-center">
                                                <div class="col-4">
                                                    <label class="auto-middle" for="ma_create_ssd_size">Ext Proc
                                                        SLOC</label>
                                                </div>
                                                <div class="col-8">
                                                    <input type="number" name="ma_create_ssd_size"
                                                        id="ma_create_ssd_size" class="form-control form-control-sm"
                                                        autocomplete="off" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-row align-items-center">
                                        <div class="col-2">
                                            <label class="auto-middle" for="mdt_create_prod_hierarchy">Product
                                                Hierarchy<span style="color: red">**</span></label>
                                        </div>
                                        <div class="col-10">
                                            <input type="text" style="text-transform: uppercase"
                                                name="mdt_create_prod_hierarchy" id="mdt_create_prod_hierarchy"
                                                class="form-control form-control-sm" autocomplete="off"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="form-row align-items-center mt-1">
                                        <div class="col-2">
                                            <label class="auto-middle" for="mdt_create_prof_center">Profiit
                                                Center<span style="color: red">**</span></label>
                                        </div>
                                        <div class="col-10">
                                            <input type="text" style="text-transform: uppercase"
                                                name="mdt_create_prof_center" id="mdt_create_prof_center"
                                                class="form-control form-control-sm" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-row align-items-center">
                                        <div class="col-2">
                                            <label class="auto-middle" for="ma_create_serial_number">Serial
                                                Number<span style="color: red">**</span></label>
                                        </div>
                                        <div class="col-10">
                                            <input type="text" style="text-transform: uppercase"
                                                name="ma_create_serial_number" id="ma_create_serial_number"
                                                class="form-control form-control-sm" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 border-left border-right">
                                    <div class="form-row align-items-center mb-1">
                                        <div class="col-6">
                                            <div class="form-row align-items-center">
                                                <div class="col-4">
                                                    <label class="auto-middle" for="ma_create_p_merk">Processor
                                                        Merk<span style="color: red">*</span></label>
                                                </div>
                                                <div class="col-8">
                                                    <select name="ma_create_p_merk" id="ma_create_p_merk"
                                                        class="form-control form-control-sm">
                                                        <option value=""></option>
                                                        <option value="Intel">Intel</option>
                                                        <option value="AMD">AMD</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-row align-items-center">
                                                <div class="col-4">
                                                    <label class="auto-middle" for="ma_create_p_jenis">Processor
                                                        Jenis<span style="color: red">*</span></label>
                                                </div>
                                                <div class="col-8">
                                                    <input type="text" name="ma_create_p_jenis"
                                                        id="ma_create_p_jenis" class="form-control form-control-sm"
                                                        autocomplete="off" required="" placeholder="ex : Core i7">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row align-items-center mb-1">
                                        <div class="col-6">
                                            <div class="form-row align-items-center">
                                                <div class="col-4">
                                                    <label class="auto-middle" for="ma_create_p_type">Processor
                                                        Type<span style="color: red">*</span></label>
                                                </div>
                                                <div class="col-8">
                                                    <input type="text" name="ma_create_p_type"
                                                        id="ma_create_p_type" class="form-control form-control-sm"
                                                        autocomplete="off" required="" placeholder="ex : 11300">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-row align-items-center">
                                                <div class="col-4">
                                                    <label class="auto-middle" for="ma_create_p_speed">Processor
                                                        Speed<span style="color: red">*</span></label>
                                                </div>
                                                <div class="col-8">
                                                    <input type="number" name="ma_create_p_speed"
                                                        id="ma_create_p_speed" class="form-control form-control-sm"
                                                        autocomplete="off" required="" placeholder="ex : 3.9">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row align-items-center mb-1">
                                        <div class="col-6">
                                            <div class="form-row align-items-center">
                                                <div class="col-4">
                                                    <label class="auto-middle" for="ma_create_m_merk">Mainboard
                                                        Merk<span style="color: red">*</span></label>
                                                </div>
                                                <div class="col-8">
                                                    <input type="text" name="ma_create_m_merk"
                                                        id="ma_create_m_merk" class="form-control form-control-sm"
                                                        autocomplete="off" required=""
                                                        placeholder="ex : Gigabyte">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-row align-items-center">
                                                <div class="col-4">
                                                    <label class="auto-middle" for="ma_create_m_type">Mainboard
                                                        Type<span style="color: red">*</span></label>
                                                </div>
                                                <div class="col-8">
                                                    <input type="text" name="ma_create_m_type"
                                                        id="ma_create_m_type" class="form-control form-control-sm"
                                                        autocomplete="off" required="" placeholder="ex : x441u">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row align-items-center mb-1">
                                        <div class="col-4">
                                            <div class="form-row align-items-center">
                                                <div class="col-6">
                                                    <label class="auto-middle" for="ma_create_r_size">RAM Size<span
                                                            style="color: red">*</span></label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="number" name="ma_create_r_size"
                                                        id="ma_create_r_size" class="form-control form-control-sm"
                                                        autocomplete="off" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-row align-items-center">
                                                <div class="col-4">
                                                    <label class="auto-middle" for="ma_create_r_type">RAM Type<span
                                                            style="color: red">*</span></label>
                                                </div>
                                                <div class="col-8">
                                                    <select name="ma_create_r_type" id="ma_create_r_type"
                                                        class="form-control form-control-sm" autocomplete="off">
                                                        <option value=""></option>
                                                        <option value="DDR 2">DDR 2</option>
                                                        <option value="DDR 3">DDR 3</option>
                                                        <option value="DDR 4">DDR 4</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-row align-items-center">
                                                <div class="col-4">
                                                    <label class="auto-middle" for="ma_create_r_slot">RAM Slot<span
                                                            style="color: red">*</span></label>
                                                </div>
                                                <div class="col-8">
                                                    <select name="ma_create_r_slot" id="ma_create_r_slot"
                                                        class="form-control form-control-sm" autocomplete="off">
                                                        <option value=""></option>
                                                        <option value="Single">Single</option>
                                                        <option value="Dual">Dual</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row align-items-center mb-1">
                                        <div class="col-4">
                                            <div class="form-row align-items-center">
                                                <div class="col-6">
                                                    <label class="auto-middle" for="ma_create_hd1_merk">HDD Merk<span
                                                            style="color: red">*</span></label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="text" name="ma_create_hd1_merk"
                                                        id="ma_create_hd1_merk" class="form-control form-control-sm"
                                                        autocomplete="off" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-row align-items-center">
                                                <div class="col-4">
                                                    <label class="auto-middle" for="ma_create_hd1_type">HDD Type<span
                                                            style="color: red">*</span></label>
                                                </div>
                                                <div class="col-8">
                                                    <input type="text" name="ma_create_hd1_type"
                                                        id="ma_create_hd1_type" class="form-control form-control-sm"
                                                        autocomplete="off" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-row align-items-center">
                                                <div class="col-4">
                                                    <label class="auto-middle" for="ma_create_hd1_size">HDD Size<span
                                                            style="color: red">*</span>(GB)</label>
                                                </div>
                                                <div class="col-8">
                                                    <input type="number" name="ma_create_hd1_size"
                                                        id="ma_create_hd1_size" class="form-control form-control-sm"
                                                        autocomplete="off" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row align-items-center mb-1">
                                        <div class="col-4">
                                            <div class="form-row align-items-center">
                                                <div class="col-6">
                                                    <label class="auto-middle" for="ma_create_hd2_merk">HDD2
                                                        Merk</label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="text" name="ma_create_hd2_merk"
                                                        id="ma_create_hd2_merk" class="form-control form-control-sm"
                                                        autocomplete="off" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-row align-items-center">
                                                <div class="col-4">
                                                    <label class="auto-middle" for="ma_create_hd2_type">HDD2
                                                        Type</label>
                                                </div>
                                                <div class="col-8">
                                                    <input type="number" name="ma_create_hd2_type"
                                                        id="ma_create_hd2_type" class="form-control form-control-sm"
                                                        autocomplete="off" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-row align-items-center">
                                                <div class="col-4">
                                                    <label class="auto-middle" for="ma_create_hd2_size">HDD2
                                                        Size (GB)</label>
                                                </div>
                                                <div class="col-8">
                                                    <input type="number" name="ma_create_hd2_size"
                                                        id="ma_create_hd2_size" class="form-control form-control-sm"
                                                        autocomplete="off" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row align-items-center mb-1">
                                        <div class="col-4">
                                            <div class="form-row align-items-center">
                                                <div class="col-6">
                                                    <label class="auto-middle" for="ma_create_ssd_merk">SSD
                                                        Merk</label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="text" name="ma_create_ssd_merk"
                                                        id="ma_create_ssd_merk" class="form-control form-control-sm"
                                                        autocomplete="off" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-row align-items-center">
                                                <div class="col-4">
                                                    <label class="auto-middle" for="ma_create_ssd_type">SSD
                                                        Type</label>
                                                </div>
                                                <div class="col-8">
                                                    <input type="number" name="ma_create_ssd_type"
                                                        id="ma_create_ssd_type" class="form-control form-control-sm"
                                                        autocomplete="off" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-row align-items-center">
                                                <div class="col-4">
                                                    <label class="auto-middle" for="ma_create_ssd_size">SSD Size
                                                        (GB)</label>
                                                </div>
                                                <div class="col-8">
                                                    <input type="number" name="ma_create_ssd_size"
                                                        id="ma_create_ssd_size" class="form-control form-control-sm"
                                                        autocomplete="off" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row align-items-center">
                                        <div class="col-2">
                                            <label class="auto-middle" for="ma_create_vga_external">VGA
                                                External</label>
                                        </div>
                                        <div class="col-10">
                                            <input type="text" name="ma_create_vga_external"
                                                id="ma_create_vga_external" class="form-control form-control-sm"
                                                autocomplete="off" required="">
                                        </div>
                                    </div>
                                    <div class="form-row align-items-center mb-1 mt-1">
                                        <div class="col-6">
                                            <div class="form-row align-items-center">
                                                <div class="col-4">
                                                    <label class="auto-middle" for="ma_create_lan_name">LAN Name<span
                                                            style="color: red">*</span></label>
                                                </div>
                                                <div class="col-8">
                                                    <input type="text" name="ma_create_lan_name"
                                                        id="ma_create_lan_name" class="form-control form-control-sm"
                                                        autocomplete="off" required="" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-row align-items-center">
                                                <div class="col-4">
                                                    <label class="auto-middle" for="ma_create_lan_mac">LAN MAC<span
                                                            style="color: red">*</span></label>
                                                </div>
                                                <div class="col-8">
                                                    <input type="text" style="text-transform: uppercase"
                                                        name="ma_create_lan_mac" id="ma_create_lan_mac"
                                                        class="form-control form-control-sm" autocomplete="off"
                                                        required="" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row align-items-center mb-1">
                                        <div class="col-6">
                                            <div class="form-row align-items-center">
                                                <div class="col-4">
                                                    <label class="auto-middle" for="ma_create_wlan_name">Wireless
                                                        Name</label>
                                                </div>
                                                <div class="col-8">
                                                    <input type="text" name="ma_create_wlan_name"
                                                        id="ma_create_wlan_name" class="form-control form-control-sm"
                                                        autocomplete="off" required="" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-row align-items-center">
                                                <div class="col-4">
                                                    <label class="auto-middle" for="ma_create_wlan_mac">Wireless
                                                        MAC</label>
                                                </div>
                                                <div class="col-8">
                                                    <input type="text" style="text-transform: uppercase"
                                                        name="ma_create_wlan_mac" id="ma_create_wlan_mac"
                                                        class="form-control form-control-sm" autocomplete="off"
                                                        required="" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        {{-- <button type="button" data-toggle="tooltip"  data-placement="top" title="Add Item" class="btn btn-info" id="addRow"> Add Item</button> --}}
                        <button type="button" class="btn btn-info addAsset"><i class="ti-check"></i>
                            Save</button>
                        <button type="button" onclick="clearvaluecreate()" class="btn btn-secondary "
                            data-dismiss="modal">Close</button>

                        {{-- @php $counter @endphp --}}
                        {{-- <input type="hidden" id="jml_row" name="jml_row" value=""> --}}
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@push('page-script')
    <script>
        //OPEN SEARCH MATERIAL TYPE MODAL
        function matTypeSearch() {
            $('#matTypeModal').modal('show');
            $('.modal-title2').text('Material Type');

        }

        //GET MATERIAL TYPE
        var url_select_item = "{{ route('mdt.get_material_type') }}";
        var lookUpMatType = $('#lookUpMatType').DataTable({
            "pagingType": "numbers",
            "searching": true,
            processing: true,
            serverSide: true,
            ajax: url_select_item,
            responsive: true,
            paging: true,
            fixedHeader: true,
            "bFilter": false,
            "order": [
                [1, 'asc']
            ],
            columns: [{
                    data: 'mat_type',
                    name: 'mat_type'
                },
                {
                    data: 'val_class',
                    name: 'val_class'
                },
                // {
                //     data: 'unit_barang',
                //     name: 'unit_barang'
                // },
                // {
                //     data: 'jml_per_unit',
                //     name: 'jml_per_unit'
                // }

            ],
            "bDestroy": true,
            "initComplete": function(settings, json) {
                // $('div.dataTables_filter input').focus();
                $('#lookUpMatType tbody').on('dblclick', 'tr', function() {
                    var dataArr = [];
                    var rows = $(this);
                    var rowData = lookUpMatType.rows(rows).data();
                    let row_click = document.getElementById('row-clicked').value;
                    $.each($(rowData), function(key, value) {
                        // var barang_nameX = value["barang_name"];
                        // document.getElementById("barang_name" + row_click);
                        var nama_barang = document.getElementById("barang" + row_click).value =
                            value["nama_barang"];
                        var kategori_barang = document.getElementById("kategori" + row_click)
                            .value = value["kategori_barang"];
                        // var unit_barang = document.getElementById("unit" + row_click).value = value["unit_barang"];
                        // var jml_per_unit = document.getElementById("jml_per_unit" + row_click).value = value["jml_per_unit"];
                        $('#itemModal').modal('hide');

                    });
                });
            },

        });
        //GET DIVISION
        var url_select_item = "{{ route('mdt.get_division') }}";
        var lookUpDivision = $('#lookUpDivision').DataTable({
            "pagingType": "numbers",
            "searching": true,
            processing: true,
            serverSide: true,
            ajax: url_select_item,
            responsive: true,
            paging: true,
            fixedHeader: true,
            "bFilter": false,
            "order": [
                [0, 'asc']
            ],
            columns: [{
                    data: 'division',
                    name: 'division'
                },
                {
                    data: 'desc_division',
                    name: 'desc_division'
                },

            ],
            "bDestroy": true,
            "initComplete": function(settings, json) {
                // $('div.dataTables_filter input').focus();
                $('#lookUpDivision tbody').on('dblclick', 'tr', function() {
                    var dataArr = [];
                    var rows = $(this);
                    var rowData = lookUpDivision.rows(rows).data();
                    let row_click = document.getElementById('row-clicked').value;
                    $.each($(rowData), function(key, value) {
                        var division = document.getElementById("mdt_create_division" +
                                row_click)
                            .value =
                            value["division"];

                        $('#divisionModal').modal('hide');

                    });
                });
            },

        });
        //GET BASE UNIT
        var url_select_item = "{{ route('mdt.get_base_unit') }}";
        var lookUpBaseUnit = $('#lookUpBaseUnit').DataTable({
            "pagingType": "numbers",
            "searching": true,
            processing: true,
            serverSide: true,
            ajax: url_select_item,
            responsive: true,
            paging: true,
            fixedHeader: true,
            "bFilter": false,
            "order": [
                [1, 'asc']
            ],
            columns: [{
                    data: 'buom',
                    name: 'buom'
                },
                {
                    data: 'desc',
                    name: 'desc'
                },

            ],
            "bDestroy": true,
            "initComplete": function(settings, json) {
                // $('div.dataTables_filter input').focus();
                $('#lookUpBaseUnit tbody').on('dblclick', 'tr', function() {
                    var dataArr = [];
                    var rows = $(this);
                    var rowData = lookUpBaseUnit.rows(rows).data();
                    let row_click = document.getElementById('row-clicked').value;
                    $.each($(rowData), function(key, value) {
                        var buom = document.getElementById("mdt_create_base_unit" + row_click)
                            .value =
                            value["buom"];

                        $('#baseUnitModal').modal('hide');

                    });
                });
            },

        });
        //GET ORDER UNIT
        var url_select_item = "{{ route('mdt.get_order_unit') }}";
        var lookUpOrderUnit = $('#lookUpOrderUnit').DataTable({
            "pagingType": "numbers",
            "searching": true,
            processing: true,
            serverSide: true,
            ajax: url_select_item,
            responsive: true,
            paging: true,
            fixedHeader: true,
            "bFilter": false,
            "order": [
                [1, 'asc']
            ],
            columns: [{
                    data: 'buom',
                    name: 'buom'
                },
                {
                    data: 'desc',
                    name: 'desc'
                },

            ],
            "bDestroy": true,
            "initComplete": function(settings, json) {
                // $('div.dataTables_filter input').focus();
                $('#lookUpOrderUnit tbody').on('dblclick', 'tr', function() {
                    var dataArr = [];
                    var rows = $(this);
                    var rowData = lookUpOrderUnit.rows(rows).data();
                    let row_click = document.getElementById('row-clicked').value;
                    $.each($(rowData), function(key, value) {
                        var buom = document.getElementById("mdt_create_order_unit" + row_click)
                            .value =
                            value["buom"];

                        $('#orderUnitModal').modal('hide');

                    });
                });
            },

        });
        //GET MATERIAL GROUP
        var url_select_item = "{{ route('mdt.get_material_group') }}";
        var lookUpMaterialGroup = $('#lookUpMaterialGroup').DataTable({
            "pagingType": "numbers",
            "searching": true,
            processing: true,
            serverSide: true,
            ajax: url_select_item,
            responsive: true,
            paging: true,
            fixedHeader: true,
            "bFilter": false,
            "order": [
                [1, 'asc']
            ],
            columns: [{
                    data: 'mat_group',
                    name: 'mat_group'
                },
                {
                    data: 'desc',
                    name: 'desc'
                },
                {
                    data: 'desc2',
                    name: 'desc2'
                },

            ],
            "bDestroy": true,
            "initComplete": function(settings, json) {
                // $('div.dataTables_filter input').focus();
                $('#lookUpMaterialGroup tbody').on('dblclick', 'tr', function() {
                    var dataArr = [];
                    var rows = $(this);
                    var rowData = lookUpMaterialGroup.rows(rows).data();
                    let row_click = document.getElementById('row-clicked').value;
                    $.each($(rowData), function(key, value) {
                        var mat_group = document.getElementById("mdt_create_material_group" +
                                row_click)
                            .value =
                            value["mat_group"];

                        $('#materialGroupModal').modal('hide');

                    });
                });
            },

        });
        //GET PURCHASING GROUP
        var url_select_item = "{{ route('mdt.get_purchasing_group') }}";
        var lookUpPurchasingGroup = $('#lookUpPurchasingGroup').DataTable({
            "pagingType": "numbers",
            "searching": true,
            processing: true,
            serverSide: true,
            ajax: url_select_item,
            responsive: true,
            paging: true,
            fixedHeader: true,
            "bFilter": false,
            "order": [
                [1, 'asc']
            ],
            columns: [{
                    data: 'purc_group',
                    name: 'purc_group'
                },
                {
                    data: 'desc',
                    name: 'desc'
                }
            ],
            "bDestroy": true,
            "initComplete": function(settings, json) {
                // $('div.dataTables_filter input').focus();
                $('#lookUpPurchasingGroup tbody').on('dblclick', 'tr', function() {
                    var dataArr = [];
                    var rows = $(this);
                    var rowData = lookUpPurchasingGroup.rows(rows).data();
                    let row_click = document.getElementById('row-clicked').value;
                    $.each($(rowData), function(key, value) {
                        var purc_group = document.getElementById("mdt_create_purchsing_group" +
                                row_click)
                            .value =
                            value["purc_group"];

                        $('#purchasingGroupModal').modal('hide');

                    });
                });
            },

        });

        function convertToUppercaseItemcode(input) {
            input.value = input.value.toUpperCase();
            var inputValue = input.value;

            if (inputValue.length > 18) {
                // Tampilkan SweetAlert
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Input length exceeds limit (18 characters)!',
                });
                // Hapus karakter lebih dari 40
                input.value = inputValue.substring(0, 18);
            }
        }

        function convertToUppercaseDesc(input) {
            input.value = input.value.toUpperCase();
            var inputValue = input.value;

            if (inputValue.length > 40) {
                // Tampilkan SweetAlert
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Input length exceeds limit (40 characters)!',
                });
                // Hapus karakter lebih dari 40
                input.value = inputValue.substring(0, 40);
            }
        }

        function convertToUppercaseOld(input) {
            input.value = input.value.toUpperCase();
            var inputValue = input.value;

            if (inputValue.length > 16) {
                // Tampilkan SweetAlert
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Input length exceeds limit (16 characters)!',
                });
                // Hapus karakter lebih dari 40
                input.value = inputValue.substring(0, 16);
            }
        }
        //OPEN SEARCH BASE UNIT
        function divisionSearch() {
            $('#divisionModal').modal('show');
            $('.modal-title2').text('Division');

        }
        //OPEN SEARCH BASE UNIT
        function baseUnitSearch() {
            $('#baseUnitModal').modal('show');
            $('.modal-title2').text('Base Unit');

        }
        //OPEN SEARCH ORDER UNIT
        function orderUnitSearch() {
            $('#orderUnitModal').modal('show');
            $('.modal-title2').text('Order Unit');

        }
        //OPEN SEARCH MATERIAL GROUP
        function materialGroupSearch() {
            $('#materialGroupModal').modal('show');
            $('.modal-title2').text('Material Group');

        }
        //OPEN SEARCH PURCHASING GROUP
        function purchasingGroupSearch() {
            $('#purchasingGroupModal').modal('show');
            $('.modal-title2').text('Purchasing Group');

        }
        //OPEN SEARCH SLOC
        function slocSearch() {
            plant = $('#mdt_create_plant').val();
            if (plant != null) {
                $('#slocModal').modal('show');
                $('.modal-title2').text('Storage Location');
            } else {
                // Tampilkan SweetAlert
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please fill in the plant first!',
                }).then(function() {
                    $('#mdt_create_plant').focus();
                    $('#mdt_create_plant').selectpicker('toggle');
                });
            }



        }
    </script>
@endpush
