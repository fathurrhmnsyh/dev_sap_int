<li class="nav-item {{ request()->is('mdt*') ? 'active' : '' }}">
    <a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
        <i class="fa fa-shopping-basket"></i>
        <p>Master Data</p>
        <span class="caret"></span>
    </a>

    <div class="collapse {{ request()->is('mdt*') ? 'show' : '' }}" id="dashboard">
        <ul class="nav nav-collapse">
            <li class="{{ request()->is('mdt/index') ? 'active' : '' }}">
                <a href="{{ url('mdt/index') }}">
                    <span class="sub-item">Dashboard</span>
                </a>
            </li>
            <li class="{{ request()->is('mdt/mc_builder') ? 'active' : '' }}">
                <a href="{{ url('mdt/mc_builder') }}">
                    <span class="sub-item">Item Code Builder</span>
                </a>
            </li>
            <li class="{{ request()->is('mdt/request') ? 'active' : '' }}">
                <a href="{{ url('mdt/request') }}">
                    <span class="sub-item">Request</span>
                </a>
            </li>

        </ul>
    </div>

</li>
