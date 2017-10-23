        <div class="col-sm-9">

            <!-- start: Post -->
                @foreach ($contents as $content)
                    <div class="table_info">
                        <p style="float: right;">
                            <a href="{{ route('admin_comments_edit',['id' => $content->id])}}"><span class="halflings pencil"></span></a>
                            <a href="{{ route('admin_comments_delete',['id' => $content->id])}}"><span class="halflings remove"></span></a>
                        </p>
                        <p><strong>№id:</strong> {{ $content->id }}</p>
                        <p><strong>Login:</strong> {{ $content->login }}</p>
                        <p><strong>Публікація:</strong> {{ $content->post->title }}</p>
                        <p><strong>Зареєстрований під імям:</strong> {{ $content->user->name }}</p>
                        <p><strong>Батьківській комент:</strong> {{ $content->parent_id }}</p>
                        <p><strong>Дата створення:</strong> {{ $content->created_at }}</p>
                    </div>
                    @endforeach


            <a href="{{ URL::previous() }}">Назад</a>


        </div>