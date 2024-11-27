<!--================Blog Area =================-->
<section class="section-padding priceTable-bg d-flex justify-content-center">
{{--    <section class="blog-area single-post-area section-margin">--}}
    <div class="container" style="background-color: seashell">
        <div class="row">
            <div class="col-lg-12 posts-list rounded">
                <div class="single-post">
                    <div class="feature-img d-flex justify-content-center mt-1">
                        <img class="img-fluid rounded-circle" src="{{asset('pics/banner/dent_1.jpg')}}" alt="">
                    </div>
                    <div class="blog-details">
                        <h2>{{ $course->title }}</h2>
                        <p class="excert">
                        {{$course->description}}
                        </p>
                    </div>
                </div>


                <livewire:comment
                    :course=" $course "
                    ></livewire:comment>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->
