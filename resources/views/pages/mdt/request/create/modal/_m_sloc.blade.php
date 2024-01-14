<div class="modal fade bd-example-modal-lg slocModal shadow" style="z-index: 1041" tabindex="-1" id="slocModal"
    role="dialog">
    <div class="modal-dialog modal-lg ">
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
                    <table id="lookUpSloc" class="table table-striped table-bordered table-hover" width="100%">
                        <thead>
                            {{-- style="background-color: #D3D3D3" --}}
                            <tr role="row">
                                <th tabindex="0" rowspan="1" colspan="1" style="width: 403px;">SLOC
                                </th>
                                <th tabindex="0" rowspan="1" colspan="1" style="width: 403px;">Description
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
