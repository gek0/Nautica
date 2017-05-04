<section class="about-us-intro">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 nopadding about-us-intro-img">
                <div class="about-us-bg">
                    <div class="texture-overlay"></div>
                    <div class="about-us-img wp1"  style="background: url('{{ url('css/assets/images/nautica_testemonials.jpg') }}') no-repeat center center fixed; background-size: cover;">
                    </div>
                </div>
            </div>
            <div class="col-md-6 nopadding">
                <div class="about-us-slider">
                    <ul class="slides" id="about-usSlider">
                        @foreach($testemonials_data as $testemonial)
                            <li>
                                <h1>{{ $testemonial->testemonial_author }}</h1>
                                <p>{{ mb_strimwidth($testemonial->testemonial_text, 0, 500, "...") }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="about-us-list" id="about-us">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-4 feature-1 wp2">
                    <div class="about-us-icon">
                        <i class="fa fa-ship" aria-hidden="true"></i>
                    </div>
                    <div class="about-us-content">
                        <h4><strong>BLKUE CAVE, GREEN CAVE AND ISLAND OF VIS</strong></h4>
                        <blockquote>ALL DAY EXCURSION<br>
                            <ul>
                                <li>swimming in the Green Cave</li>
                                <li>small or private groups</li>
                                <li>lunch and entrance to the Blue Cave <strong>not</strong> included in price</li>
                            </ul>
                        </blockquote>
                    </div>
                </div>
                <div class="col-md-4 feature-2 wp2 delay-05s">
                    <div class="about-us-icon">
                        <i class="fa fa-life-ring" aria-hidden="true"></i>
                    </div>
                    <div class="about-us-content">
                        <h4><strong>EXCURSION ON PAKLENI ISLANDS &nbsp; &nbsp; &nbsp; &nbsp; </strong></h4>
                        <blockquote>HALF DAY EXCURSION<br>
                            <ul>
                                <li>swimming in Palmižana, Mlina, ...</li>
                                <li>small or private groups</li>
                            </ul>
                        </blockquote>
                    </div>
                </div>
                <div class="col-md-4 feature-3 wp2 delay-1s">
                    <div class="about-us-icon">
                        <i class="fa fa-glass" aria-hidden="true"></i>
                    </div>
                    <div class="about-us-content">
                        <h4><strong>CRVENE STIJENE I DEGUSTACIJE VINA</strong></h4>
                        <blockquote>HALF DAY EXCURSION<br>
                            <ul>
                                <li>small or private groups</li>
                                <li>lunch and wine tasting <strong>not</strong> included in price</li>
                            </ul>
                        </blockquote>
                    </div>
                </div>
                <div class="col-md-12 wp2 delay-1s text-center">
                    <h3>All excursions include:</h3>
                    <p>drinks on board (water, beer, juice, ...)<br>
                        diving equipment<br>
                        fuel surcharge<br>
                        discount in <a href="https://nautica-bar.com/" target="_blank">Nautica Bar</a></p>
                </div>
            </div>
        </div>
        <div class="text-center space wp2 delay-1s">
            <br>
            <h3><strong>For reservations please send inquiry. It is necessary to follow the instructions received and to pay the deposit.</strong></h3>
            <br>
            <a href="#contact" class="learn-btn-inverse animated fadeInUp">Contact us <i class="fa fa-envelope-o fa-big"></i></a>
        </div>
    </div>
</section>