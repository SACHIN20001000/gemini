<html lang="en">

<head>
  @include('frontend.common', ['metaInfo' => $metaInfo]);
</head>

<body>
    <div id="app">
     <checkout-component></checkout-component>
    </div>

    <!-- <script src="{{ mix('js/app.js') }}"></script> -->
     <script src="{{asset('js/app.js')}}" ></script>

</body>

</html>
