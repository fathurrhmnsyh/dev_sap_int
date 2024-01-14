<li class="nav-item {{ request()->is('sto*') ? 'active' : '' }}">
    <a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
        <i class="fa fa-shopping-basket"></i>
        <p>Stok Opname</p>
        <span class="caret"></span>
    </a>

    <div class="collapse {{ request()->is('sto*') ? 'show' : '' }}" id="dashboard">
        <ul class="nav nav-collapse">
            <li class="{{ request()->is('sto/index') ? 'active' : '' }}">
                <a href="{{ url('sto/index') }}">
                    <span class="sub-item">Dashboard STO</span>
                </a>
            </li>
            <li class="{{ request()->is('sto/master_item') ? 'active' : '' }}">
                <a href="{{ url('sto/master_item') }}">
                    <span class="sub-item">Master Item STO</span>
                </a>
            </li>


            <li>
                <a data-toggle="collapse" href="#subnav1">
                    <span class="sub-item">Configuration</span>
                    <span class="caret"></span>
                </a>
                <div class="collapse {{ request()->is('sto/cust_sloc', 'sto/assign_user_sto') ? 'show' : '' }}"
                    id="subnav1">
                    <ul class="nav nav-collapse subnav">
                        <li class="{{ request()->is('sto/cust_sloc') ? 'active' : '' }}">
                            <a href="{{ url('sto/cust_sloc') }}">
                                <span class="sub-item">Cust Sloc </span>
                            </a>
                        </li>
                        <li class="{{ request()->is('sto/assign_user_sto') ? 'active' : '' }}">
                            <a href="{{ url('sto/assign_user_sto') }}">
                                <span class="sub-item">Assign User STO</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="{{ request()->is('sto/count_index') ? 'active' : '' }}">
                <a href="{{ url('sto/count_index') }}">
                    <span class="sub-item">Stock Opname</span>
                </a>
            </li>
        </ul>
    </div>

</li>
