@push('styles')
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
@endpush
<section wire:loading class="section-padding priceTable-bg d-flex justify-content-center">
    <div class="otp-container">
        <div>
            <h1>ورود </h1>
            <p>کد 4 رقمی به شماره <span>{{ $mobile}}</span> پیامک شد</p>
            <a href="{{ route('login') }}" wire:navigate>
                <span>
                    تغییر شماره همراه
                </span>
            </a>
        </div>

        <form wire:submit.prevent="authenticate">
            <div class="otp-input">
                <input
                    wire:model="num_1"
                    class="otp" type="text"
                    onkeyup='tabChange(1)'
                    maxlength=1
                required
                >


                <input
                    wire:model="num_2"
                    class="otp" type="text"
                    onkeyup='tabChange(2)'
                    oninput='digitValidate(this)'
                    maxlength=1
                    required

                >


                <input
                    wire:model="num_3"

                    class="otp"
                    type="text"
                    oninput='digitValidate(this)'
                    onkeyup='tabChange(3)' maxlength=1
                    required

                >


                <input
                    wire:model="num_4"
                    class="otp"
                    type="text"
                    oninput='digitValidate(this)'
                    onkeyup='tabChange(4)' maxlength=1
                    required

                >

            </div>


            <button
                wire:loading.attr="disabled"
                type="submit"

            >تایید
            </button>
        </form>

        @error('code')
        <div>
            <span class="text-danger">{{$message}}</span>
        </div>

        @enderror


        <form wire:submit.prevent="resendOtp">
            <div class="resend-text">
                <button
                    id="resendButton"
                    wire:loading.attr="disabled"
                    class="btn btn-sm"
                    {{$otp->otp_expire_at > date('Y-m-d H:i:s', strtotime("now")) ? 'disabled' : ''}}
                >
                    {{--                  <span class="resend-link text-info-dark">ارسال مجدد</span>--}}
                    ارسال مجدد
                </button>
            </div>
        </form>

        {{--        @if($otp->otp_expire_at > date('Y-m-d H:i:s', strtotime("now")))--}}
        <span id="timer"></span>
        {{--        @endif--}}

    </div>
</section>

<script>

    let digitValidate = function (ele) {
        ele.value = ele.value.replace(/[^0-9]/g, '');
    }

    let tabChange = function (val) {
        let ele = document.querySelectorAll('input');
        if (ele[val - 1].value != '') {
            ele[val - 2].focus()

        } else if (ele[val - 1].value == '') {
            ele[val].focus()

        }
    }

</script>
<script src="{{ asset('js/moment.js') }}"></script>


<script>
    // Set the date we're counting down to
    var countDownDate = moment("{{ $otp->otp_expire_at }}");

    // Update the count down every 1 second
    var x = setInterval(function () {

        // Get todays date and time
        var now = moment();

        // Find the distance between now and the count down date
        var distance = countDownDate.diff(now);

        // Time calculations for days, hours, minutes and seconds
        // var days = moment.duration(distance).days();
        // var hours = moment.duration(distance).hours();
        var minutes = moment.duration(distance).minutes();
        var seconds = moment.duration(distance).seconds();


        {{--let is_ex = "{{$otp->otp_expire_at > date('Y-m-d H:i:s', strtotime("now"))}}";--}}

        if (distance > 0) {
           let timer_element = document.getElementById("timer");
            // Display the result in the element with id="countdown"
            if (timer_element) {
                document.getElementById("timer").innerHTML = minutes + " دقیقه  " +
                    seconds + " ثانیه  ";
            }
        }

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("timer").innerHTML = "درخواست جدید دهید";
            document.getElementById("resendButton").removeAttribute('disabled');
            // document.getElementById("timer").style.display = 'none';
        }
    }, 1000);
</script>
