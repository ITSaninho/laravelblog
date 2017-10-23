
        <div class="col-sm-9">

            <!-- start: Post -->
                @foreach ($contents as $content)
                    <div class="table_info">
                        <p style="float: right;">
                            <a href="{{ route('admin_messages_edit',['id' => $content->id])}}"><span class="halflings pencil"></span></a>
                            <a href="{{ route('admin_messages_delete',['id' => $content->id])}}"><span class="halflings remove"></span></a>
                        </p>
                        <p><strong>№id:</strong> {{ $content->id }}</p>
                        <p><strong>Хто:</strong> {{ $content->user->name }}</p>
                        <p><strong>Кому:</strong> {{ $content->whom_id }}</p>
                        <p><strong>Текс:</strong> {{ $content->text }}</p>
                        <p><strong>Дата створення:</strong> {{ $content->created_at }}</p>
                        <p><strong>Статус:</strong> {{ $content->read_it }}</p>
                    </div>
                    @endforeach


            <a href="{{ URL::previous() }}">Назад</a>


        </div>