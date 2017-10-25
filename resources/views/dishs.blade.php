<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dishes</title>
</head>
<body>
	<h1>List Dishes</h1>
	<table>
		<thead>
			<tr>
				<td>Name</td>
				<td>Email</td>
				<td>Address</td>
			</tr>
		</thead>
		<tbody>
			@foreach($dishs as $c)
			<tr>
				<td>{{$c->name}}</td>
				<td>{{$c->email}}</td>
				<td>{{$c->address}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>