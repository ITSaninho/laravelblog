
        <div class="col-sm-9">

            <!-- start: Post -->
                @foreach ($contents as $content)
                    <div class="table_info">
                        <p style="float: right;">
                            <a href="{{ route('admin_rols_edit',['id' => $content->id])}}"><span class="halflings pencil"></span></a>
                            <a href="{{ route('admin_rols_delete',['id' => $content->id])}}"><span class="halflings remove"></span></a>
                        </p>
                        <p><strong>№id:</strong> {{ $content->id }}</p>
                        <p><strong>№:</strong> {{ $content->rols }}</p>
                        <p><strong>Назва:</strong> {{ $content->title }}</p>
                        <p><strong>Дата створення:</strong> {{ $content->created_at }}</p>
                        <p><strong>Опис:</strong> {{ $content->description }}</p>
                    </div>
                    @endforeach


            <a href="{{ URL::previous() }}">Назад</a>


        </div>


