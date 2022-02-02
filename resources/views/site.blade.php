<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Vue SPA Demo Rending</title>
	<script src="https://js.stripe.com/v3/"></script>
    <script defer src="{{ mix('js/app-client.js') }}"></script>
    </head>
    <body>
	{!! ssr('js/app-server.js')->fallback('<div id="app"></div>')->render() !!}
    </body>
</html>
