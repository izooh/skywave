<html>
<head>
  <title>
  </title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
  <form class="form-horizontal" role="form" method="post" action="{{route('series.store')}}" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="form-group">
<input class="form-control form-control-lg" type="text" name="title" placeholder="your series title">
</div>
<div class="form-group">
<input class="form-control form-control-lg" type="file" name="image">
</div>
<div class="form-group">
<input class="form-control form-control-lg" type="text" name="description" placeholder="your series description here">
</div>
<div class="col-md-6">
    <button type="submit"  class="btn btn-success"><i class="fa fa-sign-in"></i> upload</button>

</div>
    </form>
</body>
</html>
