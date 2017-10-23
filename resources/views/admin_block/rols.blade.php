
        <div class="col-sm-9">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif

                        <!-- start: Post -->
                <a href="{{ route('admin_rols_create')}}">Додати</a>
            <!-- start: Post -->

            <table>
                <tr class="table_info">
                    <td>№</td>
                    <td>Обовязки</td>
                    <td>Можливості</td>
                    <td>Дії</td>
                </tr>
                @foreach ($contents as $content)
                    <tr class="table_info">
                        <td>{{ $content->id }}</td>
                        <td>{{ $content->title }}</td>
                        <td>{{ $content->description }}</td>
                        <td class="can"><a href="{{ route('admin_rols_show_id',['content' => $content->id])}}">Переглянути</a></td>
                        <td class="can"><a href="{{ route('admin_rols_edit',['id' => $content->id])}}">Редагувати</a></td>
                        <td class="can"><a href="{{ route('admin_rols_delete',['id' => $content->id])}}">Видалити</a></td>


                    </tr>
                    @endforeach
                            <!-- end: Post -->
            </table>




            {{ $contents->links() }}
                    <!--$posts->render()-->



        </div>