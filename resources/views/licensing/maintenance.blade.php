@extends('faq.faq')
@section('content') 

        <section class="module bg-dark-60 about-page-header" data-background="{{asset('lassets/images/about_bg.jpg')}}">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">Maintenance</h2>
                <div class="module-subtitle font-serif">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</div>
              </div>
            </div>
          </div>
        </section>
        <section class="module">
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <h5 class="font-alt">Data Maintenance</h5><br/>
                <p>An automated back-up of the data is performed by two entities</p>
                <p>1. The server itself. The server is programmed to keep the settings (all inclusive), the code and the database.</p>
                <p>2. The software itself keep another independent back-up of the database. Currently the database has around 60 tables of data, needed to store different aspects of the data. All 60 db tables is done every day once. We wish to choose the time depending upon the users activity, mostly in the early hours of a day. If however, additional back-up are warranted (high volume of data being entered), more back-ups can be programmed.</p>
              </div>
              <!--
              <div class="col-sm-6">
                <h6 class="font-alt"><span class="icon-tools-2"></span> Development
                </h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="60" role="progressbar" aria-valuemin="0" aria-valuemax="100"><span class="font-alt"></span></div>
                </div>
                <h6 class="font-alt"><span class="icon-strategy"></span> Branding
                </h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="80" role="progressbar" aria-valuemin="0" aria-valuemax="100"><span class="font-alt"></span></div>
                </div>
                <h6 class="font-alt"><span class="icon-target"></span> Marketing
                </h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="50" role="progressbar" aria-valuemin="0" aria-valuemax="100"><span class="font-alt"></span></div>
                </div>
                <h6 class="font-alt"><span class="icon-camera"></span> Photography
                </h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="90" role="progressbar" aria-valuemin="0" aria-valuemax="100"><span class="font-alt"></span></div>
                </div>
              </div>
              -->
            </div>
          </div>
        </section>
@endsection('content')