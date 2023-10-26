@section('title', 'Контакты')

@extends('layouts.main')

@section('content')
  <div class="page o-kolledzhe-kontakty-page">
    <div class="container">
      <div class="page-title">Контакты</div>
      <div class="contacts-wrapper">
        <div class="row">
          <div class="col-md-7 col-lg-4">
            <div class="contacts">
              <div class="item">
                <div class="icon">
                  <img src="/img/geolocation-icon.svg" alt="">
                </div>
                <div class="text">Учебный корпус №1<br>г. Миасс, ул.Орловская, 11</div>
              </div>
              <div class="item">
                <div class="icon">
                  <img src="/img/letter-icon.svg" alt="">
                </div>
                <div class="text">Почта<br>mkik@yandex.ru</div>
              </div>
              <div class="item">
                <div class="icon">
                  <img src="/img/phone-icon-light.svg" alt="">
                </div>
                <div class="text">Зам.директора<br>8 (3513) 55-10-29</div>
              </div>
              <div class="item">
                <div class="icon">
                  <img src="/img/phone-icon-light.svg" alt="">
                </div>
                <div class="text">Учебная часть<br>8 (3513) 55-29-34</div>
              </div>
              <div class="item">
                <div class="icon">
                  <img src="/img/phone-icon-light.svg" alt="">
                </div>
                <div class="text">Секретарь<br>8 (3513) 55-50-33</div>
              </div>
              <div class="item">
                <div class="icon">
                  <img src="/img/phone-icon-light.svg" alt="">
                </div>
                <div class="text">Бухгалтерия<br>8 (3513) 55-10-49</div>
              </div>
              <div class="item">
                <div class="icon">
                  <img src="/img/phone-icon-light.svg" alt="">
                </div>
                <div class="text">Вахта<br>8 (3513) 55-29-17</div>
              </div>
              <div class="item mb45">
                <div class="icon">
                  <img src="/img/phone-icon-light.svg" alt="">
                </div>
                <div class="text">Приемная комиссия<br>8 (3513) 55-29-34</div>
              </div>
              <div class="item">
                <div class="icon">
                  <img src="/img/geolocation-icon.svg" alt="">
                </div>
                <div class="text">Учебный корпус №2<br> пр.Автозаводцев, 10Б</div>
              </div>
              <div class="item">
                <div class="icon">
                  <img src="/img/phone-icon-light.svg" alt="">
                </div>
                <div class="text">Вахта 8 (3513) 26-65-09</div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-5 order-lg-2">
            <div class="aside">
              <div class="director">
                <div class="item">
                  <div class="icon"></div>
                  <div class="text text-bold">Директор</div>
                </div>
                <div class="item">
                  <div class="photo">
                    <img src="/img/director.jpg" alt="">
                  </div>
                  <div class="text">
                    <div class="name text-bold">Сквирская<br>Мария Владимировна</div>
                  </div>
                </div>
                <div class="item phone">
                  <div class="icon">
                    <img src="/img/phone-icon-strong.svg" alt="">
                  </div>
                  <div class="text text-bold">8 (3513) 55-50-33</div>
                </div>
                <div class="vertikal-line hidden-mobile"></div>
                <div class="horizontal-line"></div>
              </div>
              <div class="social">
                <div class="item">
                  <div class="icon"></div>
                  <div class="text">Напишите нам</div>
                </div>
                <div class="social-wrapper">
                  <div class="social-icon">
                    <div class="img vk">
                      <a href="https://vk.com/mgkik" target="_blank">
                        <img src="/img/vk-icon.svg" alt="">
                      </a>                    
                    </div>
                    <div class="img sferum">
                      <a href="#" target="_blank">
                        <img src="/img/sferum-icon.svg" alt="">
                      </a>
                    </div>
                  </div>
                  <div class="qr-code hidden-mobile">
                    <img src="/img/qr-code.svg" alt="">
                  </div>
                </div>
                <div class="vertikal-line hidden-mobile"></div>
              </div>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="map">
              <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A74d047d568217d26797c5199a8f578b02a701cfe107783198c8802532fc16088&amp;width=100%25&amp;height=550&amp;lang=ru_RU&amp;scroll=true"></script>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection