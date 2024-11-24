<section class="bg-gray section-padding">
    <div class="container">
        <div class="section-intro pb-85px text-center">
            <h2>دوره های آموزشی</h2>
            <div class="section-style"></div>
        </div>

        <div class="owl-carousel owl-theme testimonial">
            @foreach($courses as $course)
                <div class="testimonial-item">
                    <div class="media">
                        <img
                            class="testimonial-img w-25 h-25 rounded-circle" src="{{ asset('pics/banner/dent_3.jpg') }}" alt="">
                        <div class="media-body">
                            <p>
                                {{\Illuminate\Support\Str::limit($course->description, 50)}}
                            </p>
                            <h4> {{$course->title}}</h4>
                            <p class="testi-intro">
                                {{$course->price}}
                                </p>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>

    </div>
</section>
