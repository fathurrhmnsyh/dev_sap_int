<div class="modal fade bd-example-modal-lg builderModal shadow" style="z-index: 1041" tabindex="-1" id="builderModal"
    role="dialog">
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
                                                    <label class="auto-middle" for="mc_for">Material For<span
                                                            style="color: red">**</span></label>
                                                </div>
                                                <div class="col-7">
                                                    <select name="type" id="mc_for"
                                                        class="form-control form-control-sm" onchange="check()">
                                                        <option value="" disabled @readonly(true) selected>
                                                        </option>
                                                        <option value="prod">Production</option>
                                                        <option value="non_prod">Non Prod</option>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="form-row align-items-center">
                                                <div class="col-5">
                                                    <label class="auto-middle" for="mc_type_consume">Type Consume<span
                                                            style="color: red">**</span></label>
                                                </div>
                                                <div class="col-7">
                                                    <select name="type" id="mc_type_consume"
                                                        class="form-control form-control-sm">
                                                        
                                                    </select>

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
            addOptions(pilih2, ["finish Good", "Semi Finish", "OHP"]);
        } else if (selectedValue === "non_prod") {
            addOptions(pilih2, ["Consumable", "Maintenance"]);
        }
    
        console.log("Options in Select 2:", pilih2.innerHTML);
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
