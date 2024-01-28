@extends('faq.faq')
@section('content') 


        <section class="module bg-dark-30 about-page-header" data-background="{{asset('lassets/images/about_bg.jpg')}}">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h1 class="module-title font-alt mb-0">Data Security</h1>
              </div>
            </div>
          </div>
        </section>
        <section class="module">
          <div class="container">
            <div class="row">
              <div class="col-sm-8 col-sm-offset-2">
              
                <div class="post">
                  <div class="post-thumbnail">
                  <!-- <img src="assets/images/post-4.jpg" alt="Blog Featured Image"/> -->
                  </div>
                  <div class="post-header font-alt">
                    <h1 class="post-title">Data Security</h1>
                    <div class="post-meta">By&nbsp;<a href="#">Krishna Teja</a>| 23 November | 
                    </div>
                  </div>
                  <div class="post-entry">
                    <p>Every data that has to go to the DB is forced to go through stringent validations 
                    that are for type and nature. For ex, the number "1" is an integer and it can be 
                    alphabet if written as "one". The nature of storage is validated i.e, the data to be stored 
                    as an integer it will be stored as integer and vice-versa.</p>
                    <p>HART employs world's most trusted database MySQL. The MySql is the most trusted 
                    database for all types industrial practices for security. 
                    HART coding involves protection against SQL injections (query for some but get data 
                    that is not asked for) and all requested information is checked against whether or 
                    not required permissions for seeing the data are present. If it is not present, it will 
                    not be shown at all. Going beyond this page is not possible. </p>

                    <p>Anyway, any security is as good as the people who use it. Securing passwords 
                    not sharing with others is the most important aspect of all needs. Once again all 
                    login-logout activity is recorded automatically. HART tracks malicious and supecious activities.</p>
                    <!--
                    <blockquote>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    </blockquote>
                    -->
                    <!--
                    <p>If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The new common language will be more simple and regular than the existing European languages. It will be as simple as Occidental; in fact, it will be Occidental.</p>
                    <ul>
                      <li>The European languages are members of the same family.</li>
                      <li>Their separate existence is a myth.</li>
                      <li>For science, music, sport, etc, Europe uses the same vocabulary.</li>
                    </ul>
                    -->
                    <!--<p>The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words.</p>-->
                  </div>
                </div>
              <!--
                <h4 class="font-alt mb-0">Features Item</h4>
                <hr class="divider-w mt-10 mb-20">
                <div class="row multi-columns-row">
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="features-item">
                      <div class="features-icon"><span class="icon-lightbulb"></span></div>
                      <h3 class="features-title font-alt">Ideas and concepts</h3>Careful attention to detail and clean, well structured code ensures a smooth user experience for all your visitors.
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="features-item">
                      <div class="features-icon"><span class="icon-bike"></span></div>
                      <h3 class="features-title font-alt">Optimised for speed</h3>Careful attention to detail and clean, well structured code ensures a smooth user experience for all your visitors.
                    </div>
                  </div>
                </div>
                <h4 class="font-alt mt-40 mb-0">All Features Item</h4>
                <hr class="divider-w mt-10 mb-20">
                <div class="row multi-columns-row mb-70">
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="alt-features-item">
                      <div class="alt-features-icon"><span class="icon-tools-2"></span></div>
                      <h3 class="alt-features-title font-alt">Development</h3>A wonderful serenity has taken possession of my entire soul like these sweet mornings.
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="alt-features-item">
                      <div class="alt-features-icon"><span class="icon-tools"></span></div>
                      <h3 class="alt-features-title font-alt">Design</h3>A wonderful serenity has taken possession of my entire soul like these sweet mornings.
                    </div>
                  </div>
                </div>
                <h4 class="font-alt mt-40 mb-0">Content Box</h4>
                <hr class="divider-w mt-10 mb-20">
                <div class="row multi-columns-row mb-70">
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="content-box">
                      <div class="content-box-image"><img src="{{asset('lassets/images/post-2.jpg')}}" alt="Title 1"/></div>
                      <h3 class="content-box-title font-serif">Title 1</h3>Careful attention to detail and clean, well structured code ensures a smooth user experience for all your visitors.
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="content-box">
                      <div class="content-box-image"><img src="{{asset('lassets/images/post-4.jpg')}}" alt="Title 2"/></div>
                      <h3 class="content-box-title font-serif">Title 2</h3>Careful attention to detail and clean, well structured code ensures a smooth user experience for all your visitors.
                    </div>
                  </div>
                </div>
                -->
              </div>
            </div>
          </div>
        </section>
@endsection('content')