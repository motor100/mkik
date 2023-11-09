@extends('layouts.main')

@section('content')
<div class="feedback-page page form-page">
  <div class="container">
    <div class="page-title">Форма для обращения</div>
    <div class="required-text">Все поля обязательны для заполнения*</div>

    @if($errors->any())
      <div class="message-text">{{$errors->first()}}</div>
    @endif

    @if(session()->get('status'))
      <div class="message-text">
        {{ session()->get('status') }}
      </div>
    @endif
     
    <div class="form-wrapper">
      <div class="row">
        <div class="col-xl-8 col-md-12 mx-auto">
          <form action="/feedback-store" class="form feedback-form" method="post">
            <div class="form-group">
              <label for="name" class="input-label">Имя</label>
              <input type="text" name="name" id="name" class="input-field letters-only" minlength="3" maxlength="100" required>
            </div>
            <div class="form-group">
              <label for="phone" class="input-label">Телефон</label>
              <input type="text" name="phone" id="phone" class="input-field js-input-phone-mask" required>
            </div>
            <div class="form-group">
              <label for="email" class="input-label">Email</label>
              <input type="email" name="email" class="input-field" minlength="8" maxlength="40" required>
            </div>
            <div class="form-group">
              <label for="message" class="input-label">Сообщение</label>
              <textarea name="message" id="message" class="input-field textarea" minlength="3" maxlength="1000"></textarea>
            </div>

            <div class="form-group">
              <input type="checkbox" name="processing" class="custom-checkbox" id="processing">
              <label for="processing" class="custom-checkbox-label">
                <span class="span-text">Я согласен(на) с <a href="/politika-konfidencialnosti" target="_blank">политикой</a> конфиденциальности</span>
              </label>
              <input type="checkbox" name="privacy" class="custom-checkbox" id="privacy">
              <label for="privacy" class="custom-checkbox-label">
                <span class="span-text">Я согласен(на) с <a href="/politika-konfidencialnosti" target="_blank">правилами</a> на обработку персональных данных</span>
              </label>
            </div>

            @csrf
            <div class="g-recaptcha mb50" data-sitekey="{{ config('google.client_key') }}"></div>

            <button type="submit" class="submit-btn">Отправить</button>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection

@section('script')
  <script src="{{ asset('/admin/js/imask.js') }}"></script>
  <script src="https://www.google.com/recaptcha/api.js"></script>
@endsection