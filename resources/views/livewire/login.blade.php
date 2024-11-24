
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
@endpush

<section class="section-padding priceTable-bg d-flex justify-content-center">

    <div class="otp-container">
        <div>
            <h1>ورود / ثبت نام </h1>
            <p> برای ورود یا ثبت نام شماره تلفن همراه خود را وارد کنید.</p>

        </div>
        <form wire:submit.prevent="otpRequest" class="form-contact contact-form" id="contactForm" novalidate="novalidate">
            <div class="row">
                <div class="col-12">
                    <div class="form-group mobile-otp">
                        <input
                            wire:model.live="form.mobile" class="form-control text-white text-center text-2xl mobile-otp-input" name="mobile" id="mobile" type="text"
                               placeholder="*******0911">
                    </div>
                    @error('form.mobile')
                    <div>
                        <span class="text-danger">{{$message}}</span>
                    </div>

                    @enderror
                </div>
            </div>
            <div class="form-group mt-lg-3 d-flex justify-content-center">
                <button wire:loading.remove type="submit" class="button button-contactForm ">تایید</button>
                <span wire:loading>
                   صبر کنید
                </span>
            </div>
        </form>
    </div>


</section>
