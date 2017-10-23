        <div class="col-sm-9">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif

            <!-- start: Post -->
            <a href="{{ route('admin_category_create')}}">Додати</a>

            <table>
                <tr class="table_info">
                    <td>№</td>
                    <td>Назва</td>
                    <td>Дата створення</td>
                    <td>Дії</td>
                </tr>
            @foreach ($contents as $content)
                    <tr class="table_info">
                        <td>{{ $content->id }}</td>
                        <td>{{ $content->name }}</td>
                        <td>{{ $content->created_at }}</td>
                        <td class="can"><a href="{{ route('admin_category_show_id',['content' => $content->id])}}">Переглянути</a></td>
                        <td class="can"><a href="{{ route('admin_category_edit',['id' => $content->id])}}">Редагувати</a></td>
                        <td class="can"><a href="{{ route('admin_category_delete',['id' => $content->id])}}">Видалити</a></td>

                    </tr>
                @endforeach
                        <!-- end: Post -->
            </table>




                {{ $contents->links() }}
                        <!--$posts->render()-->



        </div>