
        <div class="col-sm-9">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif

            <!-- Form -->
            <form method="post">
                {{csrf_field()}}
                <div class="field">
                    <label>№:</label>
                    <input type="text" name="rols" class="form-control" />
                </div>

                <div class="field">
                    <label>Назва:</label>
                    <input type="text" name="title" class="form-control" />
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


