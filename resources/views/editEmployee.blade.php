<?php
	
	$checkbox = $data->hobby;
	$arr = explode(',', $checkbox);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Employee</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container p-5">
		<h3 class="mt-5">Update Employee</h3>
		<form method="POST" action="{{url('UpdateRequest')}}" enctype = "multipart/form-data" style="width: 50%;">
        	@csrf
        		<input type="hidden" name="id" value="{{$data->id}}">
			  	<div class="form-group">
			    	<label for="email">First Name:</label>
			    	<input type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{$data->fname}}" placeholder="Enter First Name" id="fname">
			    	@error('fname')
					    <div class="alert alert-danger">{{ $message }}</div>
					@enderror
			  	</div>

			  	<div class="form-group">
			    	<label for="">Last Name:</label>
			    	<input type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{$data->lname}}" placeholder="Enter Last Name" id="lname">
			    	@error('lname')
					    <div class="alert alert-danger">{{ $message }}</div>
					@enderror
			  	</div>

			  	<div class="form-group">
			    	<label for="">Date Of Birth:</label>
			    	<input type="text" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{$data->dob}}" placeholder="Enter Date Of Birth" id="my_date_picker">
			    	@error('dob')
					    <div class="alert alert-danger">{{ $message }}</div>
					@enderror
			  	</div>

			  	<div class="form-group">
			    	<label for="">Email Id:</label>
			    	<input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$data->email}}" placeholder="Enter email" id="email">
			    	@error('email')
					    <div class="alert alert-danger">{{ $message }}</div>
					@enderror
			  	</div>

			  	<label for="">Gender:</label>
			  	<div class="form-check">
				  	<input class="form-check-input" type="radio" name="gender"<?php if($data->gender=="Male") {echo "checked";}?> id="gender1" value="Male" >
				  	<label class="form-check-label" for="gender1">
				    Male
				  	</label>
				</div>

				<div class="form-check">
				  	<input class="form-check-input" type="radio" name="gender" <?php if($data->gender=="Female") {echo "checked";}?> id="gender2" value="Female">
				  	<label class="form-check-label" for="gender2">
				    Female
				  	</label>
				</div>

				<label for="">Hobby:</label>
				<div class="form-check">
				  	<label class="form-check-label">
				    <input type="checkbox" class="form-check-input @error('hobby') is-invalid @enderror" name="hobby[]" <?php if(in_array("Cricket", $arr)){echo "checked";}?> value="Cricket">Cricket
				  	</label>
				  	@error('hobby')
					    <div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>

				<div class="form-check">
				  	<label class="form-check-label">
				    <input type="checkbox" class="form-check-input" name="hobby[]" <?php if(in_array('FootBall',$arr)){echo "checked";}?> value="FootBall">FootBall
				  	</label>
				</div>

				<div class="form-check">
				  	<label class="form-check-label">
				    <input type="checkbox" class="form-check-input" name="hobby[]" <?php if(in_array('Careme', $arr)) {echo "checked";}?> value="Careme" >Careme
				  	</label>
				</div>

				<div class="form-group">
			    	<label for="">Profile:</label>
			    	<input type="file" class="" name="image" placeholder="Enter password" id="">
			  	</div>

			  	<button id="btn" class="btn btn-primary">Submit</button>

		</form>
	</div>
	<script src="{{asset('assets/custome.js')}}"></script>
</body>
</html>