
        <div class="col-sm-9">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif

                        <!-- start: Post -->
                <a href="{{ route('admin_portfolio_create')}}">Додати</a>

            <!-- start: Post -->

            <table>
                <tr class="table_info">
                    <td>№</td>
                    <td>Назва</td>
                    <td>Дата створення</td>
                    <td>Опубліковано</td>
                    <td>Дії</td>
                </tr>
                @foreach ($contents as $content)
                    <tr class="table_info">
                        <td>{{ $content->id }}</td>
                        <td>{{ $content->title }}</td>
                        <td>{{ $content->created_at }}</td>
                        <td>{{ $content->public }}</td>
                        <td class="can"><a href="{{ route('admin_portfolio_show_id',['content' => $content->id])}}">Переглянути</a></td>
                        <td class="can"><a href="{{ route('admin_portfolio_edit',['id' => $content->id])}}">Редагувати</a></td>
                        <td class="can"><a href="{{ route('admin_portfolio_delete',['id' => $content->id])}}">Видалити</a></td>


                    </tr>
                    @endforeach
                            <!-- end: Post -->
            </table>




            {{ $contents->links() }}
                    <!--$posts->render()-->



        </div>


