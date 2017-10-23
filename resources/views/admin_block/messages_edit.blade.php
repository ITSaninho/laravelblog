
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
                        <label>Відправник: <span>*</span></label><br>
                        <select name="user_id">
                            <option value="{{$content->user->id}}">{{$content->user->name}}</option>
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="field">
                        <label>Отримувач: <span>*</span></label><br>
                        <select name="whom_id">
                            <option value="{{$content->whom_id}}">{{$content->whom_id}}</option>
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="field">
                        <label>Текст: <span>*</span></label>
                        <textarea name="text" class="form-control" >{{$content->text}}</textarea>
                    </div>

                    <div class="field">
                        <label>Прочитане: <span>*</span></label>
                        @if($content->read_it == 1)
                            <input type="checkbox" name="read_it" class="form-control" checked>
                        @else
                            <input type="checkbox" name="read_it" class="form-control" >
                        @endif
                    </div>

                    <div class="field">
                        <input type="submit" value="Додати"/>
                    </div>

                </form>
            @endforeach

                <a href="{{ URL::previous() }}">Назад</a>



                <!--$posts->render()-->



        </div>


