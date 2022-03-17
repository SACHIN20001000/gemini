<html lang="en">

<head>
    @include('frontend.common', ['metaInfo' => $metaInfo]);
	  <script src="https://js.stripe.com/v3/"></script>
</head>

<body>
    <div id="app">
     <header-component></header-component>
     <home-component></home-component>
     <footer-component></footer-component>
    </div>

    <!-- <script src="{{ mix('js/app.js') }}"></script> -->
     <script src="{{asset('js/app.js')}}" ></script>

</body>

</html>
