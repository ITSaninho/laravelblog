
        <div class="col-sm-9">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif


            @foreach ($contents as $content)
                    <!-- Form -->
                <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST">
                    {{csrf_field()}}

                    <div class="field">
                        <label>Назва:</label>
                        <input type="text" value="{{$content->title}}" name="title" class="form-control" />
                    </div>

                    <div class="field">
                        <label>Текст: <span>*</span></label>
                        <textarea name="text" class="form-control" >{{$content->text}}</textarea>
                    </div>


                    <div class="form-group{{ $errors->has('img') ? ' has-error' : '' }}">
                        <label for="img" class="control-label">Avatar</label>

                        <div>
                            <img src="/data/post/images/{{$content->img}}" style="width:120px; height:auto;">
                            <input type="file" name="img">
                        </div>
                    </div>


                    <div class="field">
                        <label>Статус: <span>*</span></label>
                        @if($content->public == 1)
                            <input type="checkbox" name="public" class="form-control" checked>
                        @else
                            <input type="checkbox" name="public" class="form-control" >
                        @endif
                    </div>


                    <div class="field">
                        <label>Ключові слова: <span>*</span></label>
                        <textarea name="keywords" class="form-control" >{{$content->keywords}}</textarea>
                    </div>

                    <div class="field">
                        <label>Опис: <span>*</span></label>
                        <textarea name="description" class="form-control" >{{$content->description}}</textarea>
                    </div>

                    <div class="field">
                        <input type="submit" value="Додати"/>
                    </div>

                </form>
            @endforeach

                <a href="{{ URL::previous() }}">Назад</a>



                <!--$posts->render()-->



        </div>


