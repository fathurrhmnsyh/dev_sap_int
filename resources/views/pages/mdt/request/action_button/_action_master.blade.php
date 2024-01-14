<div style="text-align: center; ">
    <div class="btn-group">
        <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fa fa-search"></i>
        </button>
        <div class="dropdown-menu">
            <a href="#" style="color: black;" data-toggle="tooltip" row-id="" data-placement="top"
                title="View" class="dropdown-item view"> <i class="fa fa-eye"></i> View</a>
            <a href="#" style="color:black ;" data-toggle="tooltip" row-id="" data-id="" data-target=""
                data-period="" data-placement="top" title="Edit" class="dropdown-item edit"> <i
                    class="fa fa-pencil-alt"></i> Edit</a>
            <a href="#" data-toggle="tooltip" style="color: black;" row-id="" data-id=""
                data-placement="top" title="Log" class="dropdown-item log"> <i class="fa fa-share"></i> Log</a>
            <a href="#" style="color: black;" data-toggle="tooltip" row-id="" data-id="" data-target=""
                data-placement="top" title="Void" class="dropdown-item void"> <i class="fa fa-trash"></i> Void</a>

        </div>
    </div>
</div>
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
