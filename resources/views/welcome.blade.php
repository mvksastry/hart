<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  @include('landing.header')
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
    <main>
      <div class="page-loader">
        <div class="loader">Loading...</div>
      </div>
      @include('landing.navbar')
      @include('landing.welcomeHART')
      <div class="main">
        @include('landing.services')
        
        @include('landing.features')
        
        <hr class="divider-w">

        @include('landing.price')
        
        @include('landing.quotes')

        @include('landing.subscribe')
        
        @include('landing.contact')

        @include('landing.footer')
      </div>
      <div class="scroll-up">
        <a href="#totop">
          <i class="fa fa-angle-double-up"></i>
        </a>
      </div>
    </main>
    <!-- JavaScripts ============================================= -->
    @include('landing.lscripts')
  </body>
</html>