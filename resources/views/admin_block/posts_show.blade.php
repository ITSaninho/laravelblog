
        <div class="col-sm-9">

            <!-- start: Post -->
                @foreach ($contents as $content)
                    <div class="table_info">
                        <p style="float: right;">
                            <a href="{{ route('admin_posts_edit',['id' => $content->id])}}"><span class="halflings pencil"></span></a>
                            <a href="{{ route('admin_posts_delete',['id' => $content->id])}}"><span class="halflings remove"></span></a>
                        </p>
                        <p><strong>№id:</strong> {{ $content->id }}</p>
                        <p><strong>Назва:</strong> {{ $content->title }}</p>
                        <p><strong>Текст:</strong> {{ $content->text }}</p>
                        <p id="avatar_td"><img src="/data/post/images/{{ $content->img }}" style="width:120px; height:auto;">
                        <p><strong>Переглядів:</strong> {{ $content->views }}</p>
                        <p><strong>Лайків:</strong> {{ $content->likes }}</p>
                        <p><strong>Дизлайків:</strong> {{ $content->deslikes }}</p>
                        <p><strong>Статус:</strong> {{ $content->public }}</p>
                        <p><strong>Дата створення:</strong> {{ $content->created_at }}</p>
                        <p><strong>Автор:</strong> {{ $content->user->name }}</p>
                        <p><strong>Категорія:</strong> {{ $content->category_id }}</p>
                        <p><strong>Новина:</strong> {{ $content->news }}</p>
                        <p><strong>Відеоурок:</strong> {{ $content->video }}</p>
                        <p><strong>Скрипт:</strong> {{ $content->script }}</p>
                        <p><strong>Сніпет:</strong> {{ $content->snipet }}</p>
                        <p><strong>Ключові слова:</strong> {{ $content->keywords }}</p>
                        <p><strong>Опис:</strong> {{ $content->description }}</p>
                    </div>
                    @endforeach


            <a href="{{ URL::previous() }}">Назад</a>


        </div>