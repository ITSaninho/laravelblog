
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
                        <label>Переглядів: <span>*</span></label>
                        <input type="text" name="views" value="{{$content->views}}" class="form-control" >
                    </div>

                    <div class="field">
                        <label>Лайків: <span>*</span></label>
                        <input type="text" name="likes" class="form-control" value="{{$content->likes}}" >
                    </div>

                    <div class="field">
                        <label>Дизлайків: <span>*</span></label>
                        <input type="text" name="deslikes" class="form-control" value="{{$content->deslikes}}" >
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
                        <label>Автор: <span>*</span></label><br>
                        <select name="user_id">
                            <option value="{{$content->user_id}}">{{$content->user->name}}</option>
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="field">
                        <label>Категорія: <span>*</span></label><br>
                        <select name="category_id">
                            <option value="{{$content->category_id}}">{{$content->category->name}}</option>
                            @foreach ($categoryes as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="field">
                        <label>Відео: <span>*</span></label>
                        @if($content->news == 1)
                            <input type="checkbox" name="video" class="form-control" checked>
                        @else
                            <input type="checkbox" name="video" class="form-control" >
                        @endif
                    </div>


                    <div class="field">
                        <label>Скрипт: <span>*</span></label>
                        @if($content->news == 1)
                            <input type="checkbox" name="script" class="form-control" checked>
                        @else
                            <input type="checkbox" name="script" class="form-control" >
                        @endif
                    </div>

                    <div class="field">
                        <label>Сніпет: <span>*</span></label>
                        @if($content->news == 1)
                            <input type="checkbox" name="snipet" class="form-control" checked>
                        @else
                            <input type="checkbox" name="snipet" class="form-control" >
                        @endif
                    </div>

                    <div class="field">
                        <label>Новина: <span>*</span></label>
                        @if($content->news == 1)
                            <input type="checkbox" name="news" class="form-control" checked>
                        @else
                            <input type="checkbox" name="news" class="form-control" >
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


