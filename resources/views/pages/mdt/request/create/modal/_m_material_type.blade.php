<div class="modal fade bd-example-modal-lg matTypeModal shadow" style="z-index: 1041" tabindex="-1" id="matTypeModal"
    role="dialog">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title2 title-detail"></h4>
                {{-- <b>
                    <font color="red">Double click to select data</font>
                </b> --}}
                <button type="button" class="close" data-dismiss="modal" onclick=""><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <b>
                    <font color="red">Double click to select data</font>
                </b>
                <div class="datatable datatable-primary"><br>
                    <input type="text" id="row-clicked" value="" readonly hidden>
                    <table id="lookUpMatType" class="table table-striped table-bordered table-hover" width="100%">
                        <thead>
                            {{-- style="background-color: #D3D3D3" --}}
                            <tr role="row">
                                <th tabindex="0" rowspan="1" colspan="1" style="width: 403px;">Material Type
                                </th>
                                <th tabindex="0" rowspan="1" colspan="1" style="width: 403px;">Valuation Class
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>