<div class="account p-3">
    <div class="userInformation">
        <div class="userName">
            <h5>{{Auth::user()->name. ' ' .Auth::user()->surname}}</h5>
                @if(Auth::user()->role->id==1)
                <p class="text-medium-14">Admin</p>
                @elseif(Auth::user()->role->id==2)
                <p class="text-medium-14">Оқушы</p>
                @elseif(Auth::user()->role->id==3)
                <p class="text-medium-14">МҰҒалім</p>
                @endif
        </div>
        <div class="userProfile">
            <img class="userRank" src="{{Auth::user()->avatar_path ? asset(Auth::user()->avatar_path)
                            : asset('/modules/front/assets/img/defaults/default-avatar.png')}}"  alt="User rank"/>
        </div>
    </div>
    <hr>
    <div class="accountNav">
        <ul>
            <li><a href="{{route('profile.profile')}}">Профиль</a></li>
            <li><a href="{{route('profile.quizzes')}}">Менің тесттерім</a></li>
            <li><a href="{{route('profile.certificates')}}">Менің сертификаттарым</a></li>
        </ul>
    </div>
</div>
