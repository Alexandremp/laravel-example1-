<html>
<head>
    <meta charset="utf-8">
    <title>updater</title>
</head>
<body>
<form class="" action="{{ URL::to('/store') }}" enctype="multipart/form-data" method="post">
    <input type="file" name="image" value="">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <br>
    <button type="submit" name="button">Upload Image</button>
</form>
</body>
</html>
