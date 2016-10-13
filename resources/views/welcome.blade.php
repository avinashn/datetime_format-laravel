<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
	href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
	<div class="container ">
		<form action="/" method="POST">
			{{ csrf_field() }}
			<div class="form-group row add">
				<div class="col-md-8">
					<input type="text" class="form-control" id="name" name="name"
						placeholder="Enter some name"> @if (count($errors) > 0)
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li> @endforeach
						</ul>
					</div>
					@endif
				</div>
				<div class="col-md-4">
					<button class="btn btn-primary" type="submit" id="add">
						<span class="glyphicon glyphicon-plus"></span> ADD
					</button>
				</div>
			</div>
		</form>
		<div class="table-responsive text-center">
			<table class="table" id="table">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Name</th>
						<th class="text-center">Created Date</th>
					</tr>
				</thead>
				@foreach($data as $item)
				<tr>
					<td>{{$item->id}}</td>
					<td>{{$item->name}}</td>
					<td>{{$item->date}}</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
</body>
</html>
