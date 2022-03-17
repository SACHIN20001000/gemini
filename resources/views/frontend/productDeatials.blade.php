<html lang="en">
<head>
  @include('frontend.common', ['metaInfo' => $metaInfo]);
  <script type="text/javascript">var prodKey="{{$metaInfo['slug']}}";var prodId={{$metaInfo['id']}};</script>
  <script type="application/ld+json">
	<?php echo json_encode($metaInfo['schemaResponse']);?>
  </script>
</head>
<body>
    <div id="app">
     <header-component></header-component>
     <product-component></product-component>
     <footer-component></footer-component>
    </div>
 <script src="{{asset('js/app.js')}}" ></script>
</body>
</html>
