@extends('auth.layout')

@section('title')
Восстановление пароля
@endsection

@section('content')
<div id="layoutAuthentication_content" class="mt-3">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5">
        <div class="card shadow border-0 rounded-lg mt-5">
          <div class="card-header"><h3 class="text-center font-weight-light my-4">Восстановление пароля</h3></div>
          <div class="card-body">
            <div class="small mb-3 text-muted">Enter your email address and we will send you a link to reset your password.</div>
            <form>
              <div class="form-floating mb-3">
                <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" />
                <label for="inputEmail">Email address</label>
              </div>
              <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                <a class="small" href="{{ url('/login') }}">Войти</a>
                <a class="btn btn-primary" href="#">Reset Password</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection            