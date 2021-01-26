<aside id='sidebar' class='u-sidebar'>
    <div class='u-sidebar-inner'>
        <header class='u-sidebar-header'>
            <a class='u-sidebar-logo' href='{{route('admin.index')}}'>
                <img class='u-sidebar-logo__icon' alt='Awesome Icon'
                     src='{{asset('modules/admin/assets/svg/logo-mini.svg')}}'>
                <img class='u-sidebar-logo__text' alt='Awesome'
                     src='{{asset('modules/admin/assets/svg/logo-text-light.svg')}}'>
            </a>
        </header>
        <nav class='u-sidebar-nav'>
            <ul class='u-sidebar-nav-menu u-sidebar-nav-menu--top-level'>
                @foreach($navList as $index => $navItem)
                    @if(isset($navItem['divider']))
                        <li class='u-sidebar-nav-menu__divider'></li>
                    @elseif(empty($navItem['items']))
                        <li class='u-sidebar-nav-menu__item'>
                            <a class='u-sidebar-nav-menu__link
                                        {{request()->fullUrl()==($navItem['url'])? 'active' : ''}}'
                               href='{{$navItem['url']}}'>
                                <span class='{{$navItem['icon']}} u-sidebar-nav-menu__item-icon'></span>
                                <span class='u-sidebar-nav-menu__item-title'>{{$navItem['title']}}</span>
                            </a>
                        </li>
                    @else
                        <li class='u-sidebar-nav-menu__item'>
                            <a class='u-sidebar-nav-menu__link' href='#'
                               data-target='#menuItemUI{{$index}}'>
                                <span class='{{$navItem['icon']}} u-sidebar-nav-menu__item-icon'></span>
                                <span class='u-sidebar-nav-menu__item-title'>{{$navItem['title']}}</span>
                                <span class='ti-angle-down u-sidebar-nav-menu__item-arrow'></span>
                            </a>
                            <ul id='menuItemUI{{$index}}'
                                class='u-sidebar-nav-menu u-sidebar-nav-menu--second-level'
                                style='display: none;'>
                                @foreach($navItem['items'] as $innerItem)
                                    <li class='u-sidebar-nav-menu__item'>
                                        <a class='u-sidebar-nav-menu__link' href='{{$innerItem['url']}}'>
                                            <span class='{{$navItem['icon']}} u-sidebar-nav-menu__item-icon'></span>
                                            <span class='u-sidebar-nav-menu__item-title'>{{$innerItem['title']}}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach
            </ul>
        </nav>
    </div>
</aside>
