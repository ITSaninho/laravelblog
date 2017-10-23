
        <div class="col-sm-9">

            <!-- start: Post -->
                @foreach ($contents as $content)
                    <div class="table_info">
                        <p style="float: right;">
                            <a href="{{ route('admin_portfolio_edit',['id' => $content->id])}}"><span class="halflings pencil"></span></a>
                            <a href="{{ route('admin_portfolio_delete',['id' => $content->id])}}"><span class="halflings remove"></span></a>
                        </p>
                        <p><strong>№id:</strong> {{ $content->id }}</p>
                        <p><strong>Назва:</strong> {{ $content->title }}</p>
                        <p><strong>Текст:</strong> {{ $content->text }}</p>
                        <p id="avatar_td"><img src="/data/post/images/{{ $content->img }}" style="width:120px; height:auto;">
                        <p><strong>Статус:</strong> {{ $content->public }}</p>
                        <p><strong>Дата створення:</strong> {{ $content->created_at }}</p>
                        <p><strong>Ключові слова:</strong> {{ $content->keywords }}</p>
                        <p><strong>Опис:</strong> {{ $content->description }}</p>
                    </div>
                    @endforeach


            <a href="{{ URL::previous() }}">Назад</a>


        </div>