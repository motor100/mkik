<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>@yield('title')</title>
  <link href="admin/css/styles.css" rel="stylesheet" />
</head>
<body class="login-form">
  <div id="layoutAuthentication">
    @yield('content')
    <div id="layoutAuthentication_footer" class="mb-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <a class="small" href="{{ url('/') }}">На главную</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
</body>
</html>