<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>پارس دنت</title>
{{--    <link rel="icon" href="{{asset('test/pics/Fevicon.png')}}" type="image/png">--}}
    <!-- start style and css -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    {{--    @livewireStyles--}}

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/moment.js') }}"></script>
    @stack('styles')

</head>

<body>
@include('partials.header')

{{--@yield('content')--}}
{{$slot}}

@include('partials.footer')







@stack('scripts')
{{--@livewireScripts--}}

...
{{--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>--}}
{{--<script>--}}
{{--    document.addEventListener('livewire:init', () => {--}}
{{--        Livewire.on('swal:modal', (event) => {--}}
{{--            alert('good success')--}}
{{--            SwalAlert('success', 'success', 'good success')--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
</body>

</html>


