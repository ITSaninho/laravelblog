
        <div class="col-sm-9">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif

            <!-- Form -->
                <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST">
                {{csrf_field()}}

                <div class="field">
                    <label>Назва:</label>
                    <input type="text" name="title" class="form-control" />
                </div>

                <div class="field">
                    <label>Текст: <span>*</span></label>
                    <textarea name="text" class="form-control" ></textarea>
                </div>

                <div class="field">
                    <label>Зображення: </label>
                    <div>
                        <input type="file" name="img">
                    </div>
                </div>


                <div class="field">
                    <label>Статус: <span>*</span></label>
                    <input type="checkbox" name="public" class="form-control" >
                </div>


                <div class="field">
                    <label>Ключові слова: <span>*</span></label>
                    <textarea name="keywords" class="form-control" ></textarea>
                </div>

                <div class="field">
                    <label>Опис: <span>*</span></label>
                    <textarea name="description" class="form-control" ></textarea>
                </div>

                <div class="field">
                    <input type="submit" value="Додати"/>
                </div>

            </form>

                <a href="{{ URL::previous() }}">Назад</a>



                    <!--$posts->render()-->



        </div>


