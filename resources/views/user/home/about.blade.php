@extends('user.layouts')

@section('title', 'TukuTiket')

@section('content')
<div class="container-fluid spad">
    <div class="row">
      <div class="col-lg-2 bg-">
        <a class="d-block" href="">a</a>
        <a class="d-block" href="">b</a>
        <a class="d-block" href="">b</a>
      </div>
      <div class="col-lg-10">
        <div class="container">
          <h1 class="text-uppercase text-center mb-4">Tuku Tiket</h1>
          <!--carousel-->
          <section class="mb-5">
            <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100 carousel-img" src="{{asset('/bahanuser/img/event1.jpg')}}" alt="First slide">
                  <div class="carousel-caption d-flex h-100 align-items-center justify-content-center">
                    <h1 class="text-uppercase">Temukan berbagai event menarik yang ada di yogyakarta</h1>
                  </div>
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100 carousel-img" src="{{asset('/bahanuser/img/event2.jpg')}}" alt="Second slide">
                  <div class="carousel-caption d-flex h-100 align-items-center justify-content-center">
                    <h1 class="text-uppercase">Berbagai event dengan bermacam kategori</h1>
                  </div>
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100 carousel-img" src="{{asset('/bahanuser/img/meeting.jpg')}}" alt="Third slide">
                  <div class="carousel-caption d-flex h-100 align-items-center justify-content-center">
                    <h1 class="text-uppercase">Buat dan promosikan eventmu sendiri</h1>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!--end carousel-->

          <section id="about-tuku" class="mt-5 mb-5">
            <h2>Apa itu Tuku Tiket?</h2>
            <p>Tuku Tiket adalah sebuah website yang melayani pembelian tiket event dan promosi event yang bergerak dalam bidang digital marketing. Bermula dari banyaknya event creator yang sulit mempromosikan event nya, akhirnya kami mencoba menemukan inovasi baru dalam pemanfaatan teknologi informasi untuk menyediakan sebuah wadah agar event creator dapat mempromosikan event dan pembelian tiket lewat website kami. Dengan keberadaan TukuTiket ini diharapkan dapat mempermudah Anda untuk mendapatkan berbagai informasi mengenai event-event yang ada di Yogyakarta serta mempermudah Anda dalam pembelian tiket event. Dalam memberi layanan, kami selalu mencoba memberi persembahan terbaik kepada siapapun. Selain itu kami juga selalu menjunjung tinggi nilai-nilai etika yang baik seperti kejujuran, ketepatan, dan profesionalitas dalam berbisnis. Mudah-mudahan dengan adanya website ni kami bisa memberi banyak manfaat bagi Anda.</p>
          </section>

          <section id="what-can-do" class="mt-5 mb-5">
            <h2 class="text-right mb-5">Apa yang bisa dilakukan di Tuku Tiket?</h2>
            <div class="row text-center feature">
              <div class="col-lg-6">
                <p><span class="mr-3 mb-4 fas fa-user-tie"></span> Promosikan Event</p>
              </div>
              <div class="col-lg-6">
                <p><span class="mr-3 mb-4 fas fa-chart-line"></span> Pantauan Satu Dashboard Event Creator</p>
              </div>
              <div class="col-lg-6">
                <p><span class="mr-3 mb-4 fas fa-credit-card"></span> Membeli Tiket Event</p>
              </div>
              <div class="col-lg-6">
                <p><span class="mr-3 mb-4 fas fa-search"></span> Jelajahi Event Dari Berbagai Kategori</p>
              </div>
            </div>
          </section>

          <section id="our-team" class="mt-5 mb-5">
            <h2>Tim Kreatif Tuku Tiket</h2>
            <p>Mari berkenalan dengan Dilaqfaby, tim yang membangun Tuku Tiket.</p>
          </section>

          <section id="join-now" class="mt-5 mb-5">
            <div class="row">
              <div class="col-lg-4">
                <h2>Gabung Dengan Tuku Tiket Sekarang!</h2>
                <p>Jelajahi berbagai event di Tuku Tiket.</p>
                <a class="btn btn-logres w-100 text-uppercase" href="register.html"><span class="fas fa-feather"></span> daftar</a>
              </div>
            </div>
          </section>

        </div>
      </div>
    </div>
  </div>
  @endsection