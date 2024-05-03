<base href="{{env('APP_URL')}}">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Quản Lý Jotun Nam Việt Phát | Dashboard v.2</title>

<link href="backend/css/bootstrap.min.css" rel="stylesheet">
<link href="backend/font-awesome/css/font-awesome.css" rel="stylesheet">
<link href="backend/css/animate.css" rel="stylesheet">
<link href="backend/css/style.css" rel="stylesheet">
<link href="backend/css/custom.css" rel="stylesheet">
<script src="backend/js/jquery-3.1.1.min.js"></script>
<script src="backend/library/library.js"></script>
@if(isset($config['css']) && is_array($config['css']))
    @foreach ($config['css'] as $val)
        <link rel="stylesheet" href="{{ $val }}">
    @endforeach
@endif
@if(isset($config['js']) && is_array($config['js']))
    @foreach ($config['js'] as $val)
        <script src="{{ $val }}"></script>
    @endforeach
@endif
