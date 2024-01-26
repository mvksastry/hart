@extends('faq.faq')
@section('content') 


        <section class="module bg-dark-30 about-page-header" data-background="{{asset('lassets/images/about_bg.jpg')}}">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h1 class="module-title font-alt mb-0">Customization</h1>
              </div>
            </div>
          </div>
        </section>
        <section class="module">
          <div class="container">
            <div class="row">
              <div class="col-sm-8 col-sm-offset-2">
                <h4 class="font-alt mb-0">Features Item</h4>
                <hr class="divider-w mt-10 mb-20">
                <div class="row multi-columns-row">
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="features-item">
                      <div class="features-icon"><span class="icon-lightbulb"></span></div>
                      <h3 class="features-title font-alt">
                      Ideas and concepts
                      </h3>
                      Careful attention to detail and clean, 
                      well structured code ensures a smooth user experience for all your users.
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="features-item">
                      <div class="features-icon"><span class="icon-bike"></span></div>
                      <h3 class="features-title font-alt">
                      Must be Optimised for speed
                      </h3>
                      Every feature request may not add value. Careful attention 
                      must be paid in order to implement features that not only add value but also
                      easy to implement by ensuring smooth execution. 
                    </div>
                  </div>
                </div>
                <h4 class="font-alt mt-40 mb-0">The Four 'D' for success</h4>
                <hr class="divider-w mt-10 mb-20">
                <div class="row multi-columns-row mb-70">

                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="alt-features-item">
                      <div class="alt-features-icon"><span class="icon-tools"></span></div>
                      <h3 class="alt-features-title font-alt">Discuss</h3>
                      A simple across the table discussion, tabulating the pro and cons of changes
is the best way to begin otherwise "haste makes waste".
                    </div>
                  </div>
                  
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="alt-features-item">
                      <div class="alt-features-icon"><span class="icon-tools"></span></div>
                      <h3 class="alt-features-title font-alt">Design</h3>
                      Simulate the thought process of discussion to ensure exceptions 
                      are kept at a minimum. More the exceptions, the worse the implementation.
                      
                    </div>
                  </div>
                  
                  
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="alt-features-item">
                      <div class="alt-features-icon"><span class="icon-tools-2"></span></div>
                      <h3 class="alt-features-title font-alt">Develop</h3>
                      Best of development comes only when best of discussions and designs are on the table.
                      Every exception must be captured to avoid taking uncorrectable path.
                    </div>
                  </div>                 
                  
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="alt-features-item">
                      <div class="alt-features-icon"><span class="icon-tools-2"></span></div>
                      <h3 class="alt-features-title font-alt">Deploy</h3>
                      When the first three 'D's are in place, this is the easiest of all where
                     users can be on boarded to remove any exceptions that were not caught. 
                    </div>
                  </div>
                  
                </div>
                <h4 class="font-alt mt-40 mb-0">Contact us ...</h4>
                <hr class="divider-w mt-10 mb-20">
                <div class="row multi-columns-row mb-70">
                  <!--
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
                  -->
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection('content')