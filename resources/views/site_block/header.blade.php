<header class="head-section">
    <div class="navbar navbar-default navbar-static-top container">
        <div class="navbar-header">
            <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse"
                    type="button"><span class="icon-bar"></span> <span class="icon-bar"></span>
                <span class="icon-bar"></span></button> <a class="navbar-brand" href="{{url('/')}}">United
                <span>IT Blog</span></a>
        </div>

        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a class="dropdown-toggle" href="{{url('/')}}">Головна</a>
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" href="{{ route('portfolio')}}">Портфоліо</a>
                </li>

                <li>
                    <a href="{{ route('contacts')}}">Контакти</a>
                </li>
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Вхід</a></li>
                    <li><a href="{{ route('register') }}">Реєстрація</a></li>
                @else
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-close-others="false" data-delay="0" data-hover=
                        "dropdown" data-toggle="dropdown" href="#">
                            @if(!Auth::user()->avatar == 'default.jpg')
                                <img src="/data/user/{{Auth::user()->email}}/images/{{ Auth::user()->avatar }}" style="width:25px; height:25px;  border-radius:50%;">
                            @else
                                <img src="/data/user/default.jpg" style="width:25px; height:25px;  border-radius:50%;">
                            @endif
                            {{ Auth::user()->name }} <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('profile',['id' => Auth::user()->id]) }}">Профіль</a>
                            </li>
                            <li>
                                <a href="{{route('message_list')}}">Повідомлення</a>
                            </li>
                            <li>
                                <a href="{{ route('users') }}">Користувачі</a>
                            </li>

                            @if(Auth::user()->rols_id == 2)
                                <li>
                                    <a href="{{ url('/admin') }}">Панель адміністратора</a>
                                </li>
                            @endif
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    Вихід
                                </a>
                            </li>

                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif



                <li><input class="form-control search" placeholder=" Пошук" type="text"></li>
            </ul>
        </div>
    </div>
</header>