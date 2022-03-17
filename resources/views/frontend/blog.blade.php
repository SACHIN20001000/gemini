<html lang="en">

<head>
    @include('frontend.common', ['metaInfo' => $metaInfo]);
    <script type="text/javascript">var slugd="{{$metaInfo['slug']}}";</script>
</head>

<body>
    <div id="app">
     <header-component></header-component>
     <blog-component></blog-component>
     <footer-component></footer-component>
    </div>

    <!-- <script src="{{ mix('js/app.js') }}"></script> -->
     <script src="{{asset('js/app.js')}}" ></script>

</body>

</html>
