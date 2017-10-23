
        <div class="col-sm-9">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif


            @foreach ($contents as $content)
                    <!-- Form -->
                <form method="post">
                    {{csrf_field()}}
                    <div class="field">
                        <label>Назва:</label>
                        <input type="text" name="login" value="{{$content->login}}" class="form-control" />
                    </div>

                    <div class="field">
                        <label>Зареєстрований користувач: <span>*</span></label><br>
                        <select name="user_id">
                            <option value="{{$content->user_id}}">{{$content->user->name}}</option>
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="field">
                        <label>Публікація: <span>*</span></label><br>
                        <select name="post_id">
                            <option value="{{$content->post_id}}">{{$content->post->title}}</option>
                            @foreach ($posts as $post)
                                <option value="{{$post->id}}">{{$post->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="field">
                        <label>Батьківській коментар: <span>*</span></label><br>
                        <select name="parent_id" style="width: 100%">
                            @foreach ($parents_comment as $parent_comment)
                                <option value="{{$content->parent_id}}">{{substr($parent_comment->text, 0, 50)}}...</option>

                                @foreach ($comments as $comment)
                                    <option value="{{$comment->id}}">{{substr($comment->text, 0, 50)}}...</option>
                                @endforeach
                            @endforeach
                        </select>
                    </div>

                    <div class="field">
                        <label>Текст: <span>*</span></label>
                        <textarea name="text" class="form-control" >{{$content->text}}</textarea>
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
                        <input type="submit" value="Додати"/>
                    </div>

                </form>
            @endforeach

                <a href="{{ URL::previous() }}">Назад</a>



                <!--$posts->render()-->



        </div>
