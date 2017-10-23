        <div class="col-sm-9">

            <!-- start: Post -->
                @foreach ($contents as $content)
                    <div class="table_info">
                        <p style="float: right;">
                            <a href="{{ route('admin_feedback_edit',['id' => $content->id])}}"><span class="halflings pencil"></span></a>
                            <a href="{{ route('admin_feedback_delete',['id' => $content->id])}}"><span class="halflings remove"></span></a>
                        </p>
                        <p><strong>№id:</strong> {{ $content->id }}</p>
                        <p><strong>Назва:</strong> {{ $content->name }}</p>
                        <p><strong>Email:</strong> {{ $content->email }}</p>
                        <p><strong>Тема:</strong> {{ $content->subject }}</p>
                        <p><strong>Текс:</strong> {{ $content->text }}</p>
                        <p><strong>Дата створення:</strong> {{ $content->created_at }}</p>
                    </div>
                    @endforeach


            <a href="{{ URL::previous() }}">Назад</a>


        </div>