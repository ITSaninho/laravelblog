
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
                        <label>Імя:</label>
                        <input type="text" name="name" value="{{$content->name}}" class="form-control" />
                    </div>

                    <div class="field">
                        <label>Email:</label>
                        <input type="email" name="email" value="{{$content->email}}" class="form-control" />
                    </div>

                    <div class="field">
                        <label>Тема: <span>*</span></label>
                        <input type="text" name="subject" value="{{$content->subject}}" class="form-control" >
                    </div>

                    <div class="field">
                        <label>Текст: <span>*</span></label>
                        <textarea name="text" class="form-control" >{{$content->text}}</textarea>
                    </div>

                    <div class="field">
                        <input type="submit" value="Додати"/>
                    </div>

                </form>
            @endforeach

                <a href="{{ URL::previous() }}">Назад</a>



                <!--$posts->render()-->



        </div>