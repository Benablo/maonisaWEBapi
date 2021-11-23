
<li class="nav-item">
    <a href="{{ route('shoes.index') }}"
       class="nav-link {{ Request::is('shoes*') ? 'active' : '' }}">
        <p>Shoes</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('logs.index') }}"
       class="nav-link {{ Request::is('logs*') ? 'active' : '' }}">
        <p>Logs</p>
    </a>
</li>


