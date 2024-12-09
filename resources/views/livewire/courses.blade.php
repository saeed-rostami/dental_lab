<section class="bg-gray section-padding">
    <div class="container">
        <div class="section-intro pb-85px text-center">
            <h2>دوره های آموزشی</h2>
            <div class="section-style"></div>
        </div>

        <div class="owl-carousel owl-theme testimonial" >
            @foreach($courses as $course)

                    <div class="card text-dark card-has-bg click-col"
                         style="background-image:url(
                         {{$course->image_path ? asset('storage/'.$course->image_path) :'/pics/banner/dent_3.jpg'}}

                         );">

                        <img class="card-img d-none" src="{{asset('pics/banner/dent_3.jpg')}}" alt="Creative Manner Design Lorem Ipsum Sit Amet Consectetur dipisi?">
                        <div class="card-img-overlay d-flex flex-column">
                            <div class="card-body">
                                <h4 class="card-title mt-0 "><a class="text-dark" >{{$course->title}}</a></h4>
                                <small><i class="far fa-clock"></i> October 15, 2020</small>
                            </div>
                            <div class="card-footer">

                               <div class="mb-3">
                                   <button class="btn btn-dark">
                                       <a class="text-white" wire:navigate href="{{ route('course', $course->id)}}">
                                           جزییات
                                       </a>
                                   </button>
                               </div>
                                <div class="media">
                                    <img class="mr-3 rounded-circle" src="https://assets.codepen.io/460692/internal/avatars/users/default.png?format=auto&version=1688931977&width=80&height=80" alt="Generic placeholder image" style="max-width:50px">
                                    <div class="media-body">
                                        <h6 class="my-0 text-white-50 d-block">Oz Coruhlu</h6>
                                        <small class="text-white">Director of UI/UX</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


            @endforeach
        </div>

    </div>
</section>

<script>

    document.addEventListener("livewire:navigated" , () => {
        if ($('.testimonial').length) {
            $('.testimonial').owlCarousel({
                autoplay: true,
                autoplayHoverPause:true,
                autoplayTimeout:2000,
                loop: true,
                margin: 30,
                rtl:true,
                // items: 5,
                nav: false,
                dots: true,

                responsiveClass: true,
                slideSpeed: 300,
                paginationSpeed: 500,
                responsive: {
                    0: {
                        items: 1
                    },
                    800: {
                        items: 2
                    },
                    1200: {
                        items: 3
                    }
                }
            })
        }
    })
</script>
