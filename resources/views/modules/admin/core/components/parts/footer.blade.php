<footer class="u-footer d-md-flex align-items-md-center text-center text-md-left text-muted">
    <ul class="list-inline mb-3 mb-md-0">

        @foreach($navList as $navItem)
            <li class="list-inline-item mr-4">
                <a class="text-muted" href="{{$navItem['url']}}" target="_blank">{{$navItem['title']}}</a>
            </li>
        @endforeach
    </ul>
    <span class="text-muted ml-auto">&copy; {{date('Y')}} <a class="text-muted" href="https://htmlstream.com/"
                                                             target="_blank">Akadem.kz</a>. Все права защищены.</span>
</footer>
