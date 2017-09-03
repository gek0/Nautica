  <footer>
  <hr class="foot">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <h1 class="footer-logo pulseAnim">
            {{ HTML::image('css/assets/images/logo_main_nav.png', 'Nautica Adventure logo footer') }}
          </h1>
          <p>&copy; <b>Nautica Adventure</b>, {{ date('Y') }} | Made with <i class="fa fa-heart" title="love"></i>  by <a href="{{ url('https://github.com/gek0') }}" target="_blank">Matija</a></p>
        </div>
        <div class="col-md-7">
          <ul class="footer-nav">
            <li><a href="#info">Tours - Info</a></li>
            <li><a href="#about-us">About us</a></li>
            <li><a href="#gallery">Gallery</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>

          <div class="row text-center">
            <div class="col-md-12 marginated-center-lot">
                <!-- facebook SDK container -->
              <div class="fb-page" data-href="https://www.facebook.com/NauticaAdventureHvar/" data-tabs="timeline" data-width="500" data-height="70" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true"><blockquote cite="https://www.facebook.com/NauticaAdventureHvar/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/NauticaAdventureHvar/">Nautica Adventure Hvar</a></blockquote></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <div class="overlay overlay-boxify">
    <nav>
      <ul>
        <li><a href="#info"><i class="fa fa-ship"></i>Tours - Info</a></li>
        <li><a href="#about-us"><i class="fa fa-info"></i>About us</a></li>
      </ul>
      <ul>
        <li><a href="#gallery"><i class="fa fa-picture-o"></i>Gallery</a></li>
        <li><a href="#contact"><i class="fa fa-envelope-o"></i>Contact</a></li>
      </ul>
      <ul>
        <li><a href="{{ url('https://www.facebook.com/NauticaAdventureHvar') }}" target="_blank"><i class="fa fa-facebook"></i>Facebook</a></li>
      </ul>
    </nav>
  </div>

  <!-- scripts -->
  {{ HTML::script('js/toucheffects-min.js', ['charset' => 'utf-8']) }}
  {{ HTML::script('js/flickity.pkgd.min.js', ['charset' => 'utf-8']) }}
  {{ HTML::script('js/jquery.fancybox.pack.js', ['charset' => 'utf-8']) }}
  {{ HTML::script('js/retina.js', ['charset' => 'utf-8']) }}
  {{ HTML::script('js/waypoints.min.js', ['charset' => 'utf-8']) }}
  {{ HTML::script('js/bootstrap.min.js', ['charset' => 'utf-8']) }}
  {{ HTML::script('https://maps.googleapis.com/maps/api/js?key=AIzaSyAq_DC0fNjXxqN-dTvo6PhN_ifxBvBcCWI', ['charset' => 'utf-8']) }}
  {{ HTML::script('js/gmaps.js', ['charset' => 'utf-8']) }}
  {{ HTML::script('js/main.js', ['charset' => 'utf-8']) }}

</body>
</html>