
        <div class="col-sm-9">

            <!-- start: Post -->
                @foreach ($contents as $content)
                    <div class="table_info">
                        <p style="float: right;">
                            <a href="{{ route('admin_users_edit',['id' => $content->id])}}"><span class="halflings pencil"></span></a>
                            <a href="{{ route('admin_users_delete',['id' => $content->id])}}"><span class="halflings remove"></span></a>
                        </p>
                        <p><strong>№id:</strong> {{ $content->id }}</p>
                        <p><strong>Назва:</strong> {{ $content->name }}</p>
                        <p><strong>Email:</strong> {{ $content->email }}</p>
                        <p><strong>Дата створення:</strong> {{ $content->created_at }}</p>
                        <p><strong>Статус:</strong> {{ $content->status }}</p>
                        <p><strong>Доступ:</strong> {{ $content->public }}</p>
                        <p><strong>Роль:</strong> {{ $content->rols_id }}</p>
                        <p id="avatar_td">
                            @if($content->avatar !== 'default.jpg')
                                <img src="/data/user/{{$content->email}}/images/{{ $content->avatar }}" style="width:120px; height:auto;">
                            @else
                                <img src="/data/user/default.jpg" style="width:120px; height:auto;">
                            @endif
                        </p>
                        <p><strong>Пароль:</strong> {{ $content->password }}</p>
                    </div>
                    @endforeach


            <a href="{{ URL::previous() }}">Назад</a>


        </div>


