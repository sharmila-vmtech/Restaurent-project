<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Upload</title>
</head>
<body>
	<form action="ImportDish" method="post" enctype="multipart/form-data">
		<label for="Upload">Upload file</label>
		<input type="file" name="file" />
		<input type="hidden" value="{{csrf_token() }}" name="_token" />
		<input type="submit" value="Upload">
	</form>
</body>
</html>