<section class="section-margin mb-5 services">
    <div class="container">
        <div class="section-intro pb-85px text-center">
            <h2>خدمات</h2>
            <div class="section-style"></div>
        </div>

        <div class="row">
            @foreach($courses as $course)

            <div class="col-lg-4 col-sm-6">
                <div class="card-service text-center">
                    <div class="service-icon">
                        <img class=" w-25 h-25" src="{{ asset('pics/banner/dent_4.jpg') }}" alt="">
                    </div>
                    <h3>{{$course->title}}</h3>
                    <p>{{$course->description}} </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
