<li class="nav-item {{ request()->is('wtf*') ? 'active' : '' }}">
    <a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
        <i class="fa fa-shopping-basket"></i>
        <p>Warehouse Transfer</p>
        <span class="caret"></span>
    </a>

    <div class="collapse {{ request()->is('wtf*') ? 'show' : '' }}" id="dashboard">
        <ul class="nav nav-collapse">
            <li class="{{ request()->is('wtf/index') ? 'active' : '' }}">
                <a href="{{ url('wtf/index') }}">
                    <span class="sub-item">Dashboard</span>
                </a>
            </li>
            <li class="{{ request()->is('wtf/tp_index') ? 'active' : '' }}">
                <a href="{{ url('wtf/tp_index') }}">
                    <span class="sub-item">Transfer Posting</span>
                </a>
            </li>
            <li class="{{ request()->is('wtf/tp_rm') ? 'active' : '' }}">
                <a href="{{ url('wtf/tp_rm') }}">
                    <span class="sub-item">RM - Transfer Posting</span>
                </a>
            </li>




            {{-- <li>
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
            </li> --}}
        </ul>
    </div>

</li>
