{{--<section class="section-margin services">--}}
{{--    <div class="container">--}}
        <section class="dark">
            <div class="container py-4">
                <div class="section-intro pb-85px text-center">
                    <h2 class="text-white-50">خدمات ما</h2>
                    <div class="section-style text-white-50"></div>
                </div>

                @foreach($services as $service)
                    <article class="postcard dark blue">
                        <a class="postcard__img_link" >
                            <img class="postcard__img" src="{{asset('pics/banner/dent_5.jpg')}}" alt="Image Title" />
                        </a>
                        <div class="postcard__text">
                            <h2 class="text-white-50">
                                {{$service->title}}
                            </h2>
                            <div class="postcard__bar"></div>
                            <div>
                                <span>
                                    {{$service->description}}
                                </span>
                            </div>
                        </div>
                    </article>

                @endforeach
            </div>
        </section>
{{--    </div>--}}
{{--</section>--}}
