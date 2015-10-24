 <style>
    .help-block{
        color:red;
    }
 </style>
 {!! Form::model($user, array('url' => URL::to('cabinet/edit_user') . '/' . $user->id.'/edit', 'method' => 'patch','id'=>'fupload', 'class' => 'bf')) !!}

        <div class="form-group">
            {!! Form::label('name', 'Ім\'я', array('class' => 'control-label')) !!}
            <div class="controls">
                 {!! Form::text('name',null, array('class' => 'form-control')) !!}
                 <span class="help-block">{{ $errors->first('name', ':message') }}</span>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('fio', 'Прізвище', array('class' => 'control-label')) !!}
            <div class="controls">
                 {!! Form::text('fio',null, array('class' => 'form-control')) !!}
                 <span class="help-block">{{ $errors->first('fio', ':message') }}</span>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('username', 'Нікнейм', array('class' => 'control-label')) !!}
            <div class="controls">
                 {!! Form::text('username',null, array('class' => 'form-control')) !!}
                 <span class="help-block">{{ $errors->first('username', ':message') }}</span>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Поштова адреса', array('class' => 'control-label')) !!}
            <div class="controls">
                 {!! Form::text('email',null, array('class' => 'form-control')) !!}
                 <span class="help-block">{{ $errors->first('email', ':message') }}</span>
            </div>
        </div>

         <div class="form-group">
            {!! Form::label('phone', 'Телефон', array('class' => 'control-label')) !!}
            <div class="controls">
                 {!! Form::text('phone',null, array('class' => 'form-control','placeholder'=>'+380951227975')) !!}
                 <span class="help-block">{{ $errors->first('phone', ':message') }}</span>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('password', 'Новий Пароль', array('class' => 'control-label')) !!}
            <div class="controls">
                 {!! Form::password('password',array('class' => 'form-control')) !!}
            </div>
        </div>

         <div class="form-group">
            <div class="controls">
                 {!! Form::submit('Зберегти',array('class' => 'btn btn-success')) !!}
            </div>
        </div>

        {!! Form::close() !!}