
        <div class="col-sm-9">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif

                        <!-- start: Post -->
                <a href="{{ route('admin_users_create')}}">Додати</a>

            <!-- start: Post -->

            <table>
                <tr class="table_info">
                    <td>№</td>
                    <td>Email</td>
                    <td>Аватар</td>
                    <td>Статус</td>
                    <td>Роль</td>
                    <td>Дата реєстрації</td>
                    <td>Дії</td>
                </tr>
                @foreach ($contents as $content)
                    <tr class="table_info">
                        <td>{{ $content->id }}</td>
                        <td>{{ $content->email }}</td>
                        <td id="avatar_td">
                            @if($content->avatar !== 'default.jpg')
                                <img src="/data/user/{{$content->email}}/images/{{ $content->avatar }}" style="width:25px; height:25px;  border-radius:50%;">
                            @else
                                <img src="/data/user/default.jpg" style="width:25px; height:25px;  border-radius:50%;">
                            @endif
                        </td>
                        <td>{{ $content->status }}</td>
                        <td>{{ $content->rols_id }}</td>
                        <td>{{ $content->created_at }}</td>
                        <td class="can"><a href="{{ route('admin_users_show_id',['content' => $content->id])}}">Переглянути</a></td>
                        <td class="can"><a href="{{ route('admin_users_edit',['id' => $content->id])}}">Редагувати</a></td>
                        <td class="can"><a href="{{ route('admin_users_delete',['id' => $content->id])}}">Видалити</a></td>
                    </tr>
                    @endforeach
                            <!-- end: Post -->
            </table>




            {{ $contents->links() }}
                    <!--$posts->render()-->



        </div>


