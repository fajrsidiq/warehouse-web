<style>
    .wrapper-img-banner {
        max-width: 100%;
        max-height: 600px;
    }

    .img-banner {
        width: 100%;

    }
    /* Animasi fadeIn */
    .fade-in {
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
</style>

<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
            aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner fade-in">
        <div class="carousel-item active">
            <div class="wrapper-img-banner">
                <img src="/img/banner8.png" class="img-banner" alt="">
            </div>
            <div class="container">
                <div class="carousel-caption text-start">
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="wrapper-img-banner">
                <img src="/img/banner1.jpg" class="img-banner" alt="">
            </div>
            <div class="container">
                <div class="carousel-caption">
                    <h1>Laut Biru Perkasa</h1>
                    <h3>Reliable and Trustworthy</h3>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="wrapper-img-banner">
                <img src="/img/banner2.jpg" class="img-banner" alt="">
            </div>
            <div class="container">
                <div class="carousel-caption text-end">
                    <h1>Laut Biru Perkasa</h1>
                    <h3>We are ready to serve you</h3>
                </div>
            </div>
        </div>

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


<style>
    .justified-text {
        text-align: justify;
    }
</style>

<div class="container mt-5 fade-in">
    <div class="text-center">
        <h2 class="">About Us</h2>
        <p>____________________________</p>
    </div>

    <div class="row">
        <div class="col-md-6">
            <img src="/img/lautbiruperkasa2.jpg" width="100%" alt="" class="fade-in">
        </div>
        <div class="col-md-6">
            <h4 class="justified-text"> Welcome to Laut Biru Perkasa, where we are committed to preserving the freshness of Indonesia's ocean treasures. 
                Under the leadership of Mr. Sajono, we provide high-quality sea fish trading services in Cilacap. With our storage facilities and local 
                fishermen's expertise, our products remain fresh until they reach you. We offer reliable delivery services with controlled temperatures. 
                In addition to trading, we also offer Coldstorage (CS) and Air Blast Freezing (ABF) storage services. Our expertise ensures the quality 
                of our products. Our dedication to freshness and quality plays a vital role in preserving the deliciousness of sea products. 
                Join Laut Biru Perkasa in safeguarding the wealth of the oceans together.</h4>
        </div>
        <div class="text-center py-3 fade-in">
            <a href="/aboutus" class="btn btn-primary px-5">Next <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
</div>


<div class="bg-primary fade-in">
    <div class="container py-3">
        <div class="text-white">
            <div class="text-center">
                <h2 class="">We also provide</h2>
                <h4 class="mb-4">COLD STORAGE (CS) & AIR BLAST FREEZING (ABF)</h4>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="text-center">
                        <img src="/img/coldstorage1.jpg" width="100%" alt="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <img src="/img/abf3.jpg" width="100%" alt="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <img src="/img/abf1.jpg" width="100%" alt="">
                    </div>
                </div>
                <h5 class="justified-text">Coldstorage services are essential solutions for maintaining the freshness and quality of products 
                    that require controlled temperatures. Laut Biru Perkasa offers dedicated Coldstorage services, providing an ideal environment 
                    for sea products to remain fresh and of optimal quality.</h5>
                <h5 class="justified-text">Air Blast Freezing service is an advanced solution that we offer to ensure your sea catch remains perfectly 
                    fresh. The Air Blast Freezing process involves using super cold air blown at high pressure onto the product, rapidly and evenly 
                    freezing the product.</h5>
            </div>
            <div class="text-center mt-3 fade-in">
                <a href="/services" class="btn btn-primary px-5"> <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>

<!-- Air Blast Freezing
<div class="bg-info fade-in">
    <div class="container py-5">
        <div class="text-white">
            <div class="text-center">
                <h4>AIR BLAST FREZIING (ABF)</h4>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="text-center">
                        <img src="/img/coldstorage2.jpg" width="100%" alt="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <img src="/img/coldstorage1.jpg" width="100%" alt="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <img src="/img/coldstorage3.jpg" width="100%" alt="">
                    </div>
                </div>
                <h5 class="justified-text">Jasa Air Blast Freezing adalah solusi canggih yang kami tawarkan untuk
                    memastikan tangkapan laut Anda tetap segar dengan sempurna. Proses Air Blast Freezing melibatkan
                    penggunaan udara super dingin yang ditiupkan dengan tekanan tinggi pada produk, membekukan produk
                    dengan cepat dan merata.</h5>
                <div class="text-center mt-3 fade-in">
                    <a href="/coldstorage" class="btn btn-info px-5"> <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
-->

<div class="bg-light fade-in">
    <div class="container py-3">
        <div class="text-dark">
            <div class="text-center">
                <h2 class="">Fresh Fish</h2>
                <h4 class="mb-4">Delivery Services</h4>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="text-center">
                        <img src="/img/mobil.jpg" width="100%" alt="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <img src="/img/truk1.png" width="100%" alt="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <img src="/img/truk2.jpg" width="100%" alt="">
                    </div>
                </div>
                <h5 class="justified-text">Laut Biru Perkasa also provides fresh fish delivery services with various options tailored to your needs. We offer Refrigerator Trucks for long-distance deliveries and Pick Up Trucks for short-distance deliveries. Additional facilities include styrofoam packing and the provision of ice to maintain the freshness and quality of sea products. We are committed to providing a satisfying buying experience by delivering fresh fish directly from the sea to your door.</h5>
                <div class="text-center mt-3 fade-in">
                    <a href="/delivery" class="btn btn-light px-5"> <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container py-3 fade-in">
    <div class="text-center">
        <h4>Types of Fish We Provide</h4>
        <p>____________________________________________________________</p>
    </div>
    <div class="row">
        <div class="row mt-5">
            <div class="col-md-3 my-3">
                <div class="text-center">
                    <img src="/img/cakalang.png" width="100%" alt="">
                    <h5><b>Skipjack Tuna</b></h5>
                    <h5><i>(Katsuwonus pelamis)</i></h5>
                </div>
            </div>

            <div class="col-md-3 my-3">
                <div class="text-center">
                    <img src="/img/tunabluefin.png" width="100%" alt="">
                    <h5><b>Blue Fin Tuna</b></h5>
                    <h5><i>(Thunnus thynnus)</i></h5>
                </div>
            </div>

            <div class="col-md-3 my-3">
                <div class="text-center">
                    <img src="/img/tunayellowfin.png" width="100%" alt="">
                    <h5><b>Yellow Fin Tuna</b></h5>
                    <h5><i>(Thunnus albacares)</i></h5>
                </div>
            </div>

            <div class="col-md-3 my-3">
                <div class="text-center">
                    <img src="/img/gindara.png" width="100%" alt="">
                    <h5><b>Gindara Fish</b></h5>
                    <h5><i>(Lepidocybium flavobrunneum)</i></h5>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mt-3 fade-in">
        <a href="/fish" class="btn btn-primary px-5">Read more <i class="fas fa-arrow-right"></i></a>
    </div>
</div>


<div class="bg-primary my-5 fade-in">
    <div class="container py-5">
        <div class="text-white">
            <h4 class="mb-3">Learn About Us</h4>
            <p class="justified-text">We invite and welcome you to explore deeper into our essence as a trusted partner in maintaining the freshness of sea products. Starting from our business description, services offered, trading activities, Coldstorage services, organizational structure, to how to contact us directly. Everything is available here to provide comprehensive insights into what makes Laut Biru Perkasa the right choice for you. </p>
        </div>
        <div class="text-center mt-3 fade-in">
            <a href="/about" class="btn btn-primary px-5"> <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
</div>

<div class="container my-2 mb-5 fade-in">
    <div class="text-center">
        <h3>Contact Us</h3>
        <p>You can ask us directly</p>
        <a href="https://wa.me/+6281394060849" class="btn btn-success px-5 fade-in" target="blank"><i
                class="fas fa-phone"></i> Contact Us on WhatsApp</a>
        <h5>Or</h5>
        <div class="email-text fade-in">udlautbiruperkasa@gmail.com</div>
    </div>
</div>
