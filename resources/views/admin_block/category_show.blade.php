

        <div class="col-sm-9">

            <!-- start: Post -->
                @foreach ($contents as $content)
                    <div class="table_info">

                        <p style="float: right;">
                            <a href="{{ route('admin_category_edit',['id' => $content->id])}}"><span class="halflings pencil"></span></a>
                            <a href="{{ route('admin_category_delete',['id' => $content->id])}}"><span class="halflings remove"></span></a>
                        </p>
                        <p>
                            <strong>№id:</strong> {{ $content->id }}
                        </p>

                        <p><strong>Назва:</strong> {{ $content->name }}</p>
                        <p><strong>Аліас:</strong> {{ $content->alias }}</p>
                        <p><strong>Дата створення:</strong> {{ $content->created_at }}</p>
                        <p><strong>Ключові слова:</strong> {{ $content->keywords }}</p>
                        <p><strong>Опис:</strong> {{ $content->description }}</p>
                    </div>
                    @endforeach


            <a href="{{ URL::previous() }}">Назад</a>


        </div>