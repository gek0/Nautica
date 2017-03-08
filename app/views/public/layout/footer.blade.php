
            </div> <!-- end container -->
        </div> <!-- end page-content-wrapper -->

    <div class="ocean">
        <div class="wave"></div>
        <div class="wave"></div>
        &copy; <b>Nautica Adventure</b>, {{ date('Y') }} | Code & Design by <a href="{{ url('https://github.com/gek0') }}" target="_blank">Matija</a>
    </div>
    </div> <!-- end wrapper -->

        <!-- scripts -->
    {{ HTML::script('js/imagesloaded.pkgd.min.js', ['charset' => 'utf-8']) }}
    {{ HTML::script('js/masonry.pkgd.min.js', ['charset' => 'utf-8']) }}
    {{ HTML::script('js/classie.min.js', ['charset' => 'utf-8']) }}
    {{ HTML::script('js/cbpGridGallery.js', ['charset' => 'utf-8']) }}
    {{ HTML::script('js/jquery.lazyload.min.js', ['charset' => 'utf-8']) }}
    {{ HTML::script('https://maps.googleapis.com/maps/api/js?sensor=false', ['charset' => 'utf-8']) }}
    {{ HTML::script('js/gmaps.js', ['charset' => 'utf-8']) }}
    {{ HTML::script('js/main.js', ['charset' => 'utf-8']) }}
    {{ HTML::script('js/fakeLoader.min.js', ['charset' => 'utf-8']) }}
</body>
</html>