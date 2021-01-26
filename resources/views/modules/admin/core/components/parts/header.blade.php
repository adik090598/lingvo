<header class="u-header">
    <div class="u-header-left">
        <a class="u-header-logo" href="{{route('admin.index')}}">
            <img class="u-header-logo__icon" src="{{asset('modules/admin/assets/svg/logo-mini.svg')}}"
                 alt="Awesome Icon">
            <img class="u-header-logo__text" src="{{asset('modules/admin/assets/svg/logo-text-light.svg')}}"
                 alt="Awesome">
        </a>
    </div>
    <div class="u-header-middle">
        <div class="u-header-section">
            <a class="js-sidebar-invoker u-header-invoker u-sidebar-invoker" href="#"
               data-is-close-all-except-this="true"
               data-target="#sidebar">
                <span class="ti-align-left u-header-invoker__icon u-sidebar-invoker__icon--open"></span>
                <span class="ti-align-justify u-header-invoker__icon u-sidebar-invoker__icon--close"></span>
            </a>
        </div>
        <div class="u-header-section justify-content-sm-start flex-grow-1 py-0">
            <div class="u-header-search"
                 data-search-mobile-invoker="#headerSearchMobileInvoker"
                 data-search-target="#headerSearch">
                <a id="headerSearchMobileInvoker" class="u-header-search__mobile-invoker align-items-center" href="#">
                    <span class="ti-search"></span>
                </a>
            </div>
        </div>
        <div class="u-header-section u-header-section--profile">
            <div class="u-header-dropdown dropdown">
                <a class="link-muted d-flex align-items-center" href="#" role="button" id="userProfileInvoker"
                   aria-haspopup="true" aria-expanded="false"
                   data-toggle="dropdown"
                   data-offset="0">
{{--                    <img class="u-header-avatar img-fluid rounded-circle mr-md-3" src="{{$user->profile_photo_path}}"--}}
{{--                         alt="User Profile">--}}
                    <span class="text-dark d-none d-md-inline-flex align-items-center">
								{{$user->name}}
                        <span class="ti-angle-down text-muted ml-4"></span>
							</span>
                </a>
                <div class="u-header-dropdown__menu dropdown-menu dropdown-menu-right"
                     aria-labelledby="userProfileInvoker" style="width: 260px;">
                    <div class="card p-3">
                        <div class="card-body p-0">
                            <ul class="list-unstyled mb-0">
                                @foreach($navList as $navItem)
                                    @if($user->role->id == 1 && $navItem['title'] == 'Профиль')
                                     @else
                                        <li class="mb-3">
                                            <a class="link-dark" href="{{$navItem['url']}}">
                                                {{$navItem['title']}}
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
{{--                                <li>--}}
{{--                                    @csrf--}}
{{--                                    <a href="{{route('user.edit', ['id' => $user->id])}}" class="link-dark">--}}
{{--                                        Профиль--}}
{{--                                    </a>--}}
{{--                                </li>--}}
                                <li>
                                    <form action="{{route('logout')}}" method="post" id="signOutForm">
                                        @csrf
                                        <a class="link-dark" href="#"
                                           onclick="document.getElementById('signOutForm').submit()">
                                            Выйти
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
