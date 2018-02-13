<li class="nav-item 
    {{ $idMenuItem == 0 ? 'mT-30' : '' }}
    {{ isset($dataMenuItem['isActive']) ? 'active' : '' }}
    {{ isset($dataMenuItem['submenu']) ? 'dropdown' : '' }}">
    @if(!isset($dataMenuItem['submenu']))
    <a class="sidebar-link" href="{{ $dataMenuItem['url'] }}">
        <span class="icon-holder">
            <i class="c-{{ $dataMenuItem['color'] }}-500 ti-{{ $dataMenuItem['icon'] }}"></i>
        </span>
        <span class="title">{{ $dataMenuItem['name'] }}</span>
        @if(isset($dataMenuItem['badge']))
            <span class="badge badge-pill bgc-{{ $dataMenuItem['badge']['color'] }}-50 c-{{ $dataMenuItem['badge']['color'] }}-700">
                {{ $dataMenuItem['badge']['value'] }}
            </span>
        @endif
    </a>
    @else
    <a class="dropdown-toggle" href="javascript:void(0);">
        <span class="icon-holder">
            <i class="c-{{ $dataMenuItem['color'] }}-500 ti-{{ $dataMenuItem['icon'] }}"></i>
        </span>
        <span class="title">{{ $dataMenuItem['name'] }}</span>
        <span class="arrow">
            <i class="ti-angle-right"></i>
        </span>
    </a>
    <ul class="dropdown-menu">
        @foreach($dataMenuItem['submenu'] as $submenulevel_1)
            <li {!! isset($submenulevel_1['submenu']) ? 'class="nav-item dropdown"' : '' !!}>
                <a class="sidebar-link" href="{{ !isset($submenulevel_1['submenu']) ? $submenulevel_1['url'] : 'javascript:void(0);' }}">
                    @if(!isset($submenulevel_1['submenu']))
                        {{ $submenulevel_1['name'] }}
                    @else
                        <span>{{ $submenulevel_1['name'] }}</span>
                        <span class="arrow">
                            <i class="ti-angle-right"></i>
                        </span>
                    @endif
                </a>
                @if(isset($submenulevel_1['submenu']))
                <ul class="dropdown-menu">
                    @foreach($submenulevel_1['submenu'] as $submenulevel_2)
                    <li>
                        <a href="{{ $submenulevel_2['url'] }}">{{ $submenulevel_2['name'] }}</a>
                    </li>
                    @endforeach
                </ul>
                @endif
            </li>
        @endforeach
    </ul>
    @endif
</li>