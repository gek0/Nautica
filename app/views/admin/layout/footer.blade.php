
    </div>
        <div class="row text-center">
            <hr>
            <div class="col-md-12">
                <p>&copy; <b>Nautica Adventure</b>, {{ date('Y') }} | Made with <i class="fa fa-heart pulseAnim" title="love"></i>  by <a href="{{ url('https://github.com/gek0') }}" target="_blank">Matija</a></p>
            </div>
        </div>
        </section>

    @include('admin.notification')
        <!-- scripts -->
    {{ HTML::script('wysibb/jquery.wysibb.min.js', ['charset' => 'utf-8']) }}
    {{ HTML::script('wysibb/lang/hr.js', ['charset' => 'utf-8']) }}
    {{ HTML::script('js/jquery.lazyload.min.js', ['charset' => 'utf-8']) }}
    {{ HTML::script('js/imagelightbox.min.js', ['charset' => 'utf-8']) }}
    {{ HTML::script('js/main_admin.js', ['charset' => 'utf-8']) }}
</body>
</html>