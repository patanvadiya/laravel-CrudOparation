<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<title>Bootstrap Example</title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  	 <link href=
			'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'
			          rel='stylesheet'>
			      
			    <script src=
			"https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" >
			    </script>
			      
			    <script src=
			"https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" >
			    </script>

</head>
<body>
	<div class="container p-5">
		<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
	  		Add Employee
		</button>
	</div>
	<div class="container">
		<table class="table table-borderless">
		    <thead>
		      <tr>
		        <th>Firstname</th>
		        <th>Lastname</th>
		        <th>Date Of Birth</th>
		        <th>Email</th>
		        <th>Gender</th>
		        <th>Hobbies</th>
		        <th>Profile</th>
		        <th>Action</th>
		      </tr>
		    </thead>
		    <tbody>
		    	@foreach($data as $data)
			      	<tr>
			        	<td>{{$data->fname}}</td>
			        	<td>{{$data->lname}}</td>
			        	<td>{{$data->dob}}</td>
			        	<td>{{$data->email}}</td>
			        	<td>{{$data->gender}}</td>
			        	<td>{{$data->hobby}}</td>
			        	<td><img src="{{asset('storage/'.$data->image)}}"style="height:50px; width: 50px;"></td>
			        	<td><a href="{{url('editEmployee/'.$data->id)}}" class="btn btn-success">Edit</a><a href="{{url('deleteEmployee/'.$data->id)}}" class="btn btn-danger">Delete</a></td>
			      	</tr>
			    @endforeach  	
		    </tbody>
		</table>

	</div>
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		    <div class="modal-content">
			    <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			    </div>
		      	<div class="modal-body">
			        <form method="POST" action="{{url('RegistrationsRequest')}}" enctype = "multipart/form-data">
			        	@csrf
						  	<div class="form-group">
						    	<label for="email">First Name:</label>
						    	<input type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" placeholder="Enter First Name" id="fname">
						    	<span id="fname_err"></span>				    	
								@error('fname')
								    <div class="alert alert-danger">{{ $message }}</div>
								@enderror
						  	</div>

						  	<div class="form-group">
						    	<label for="">Last Name:</label>
						    	<input type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" placeholder="Enter Last Name" id="lname">
						    	@error('lname')
								    <div class="alert alert-danger">{{ $message }}</div>
								@enderror
						    	<span id="lname_err"></span>
						  	</div>

						  	<div class="form-group">
						    	<label for="">Date Of Birth:</label>
						    	<input type="text" class="form-control @error('dob') is-invalid @enderror" autocomplete="off" name="dob" placeholder="Enter Date Of Birth" id ="my_date_picker">
						    	@error('dob')
								    <div class="alert alert-danger">{{ $message }}</div>
								@enderror
						    	<span id="date_err"></span>
						  	</div>

						  	<div class="form-group">
						    	<label for="">Email Id:</label>
						    	<input type="text" class="form-control @error('email') is-invalid @enderror"  name="email" placeholder="Enter email" id="email">

						    	@error('email')
								    <div class="alert alert-danger">{{ $message }}</div>
								@enderror
						    	<span id="email_err"></span>
						  	</div>

						  	<label for="">Gender:</label><br>
						  	<span id="radio_err"></span>
						  	<div class="form-check">
							  	<input class="form-check-input" type="radio" name="gender" class="genders" id="gender1" value="Male" >
							  	<label class="form-check-label" for="gender1">
							    Male
							  	</label>
							</div>

							<div class="form-check">
							  	<input class="form-check-input" calss="genders" type="radio" name="gender" id="gender2" value="Female">
							  	<label class="form-check-label" for="gender2">
							    Female
							  	</label>
							</div>

							<label for="">Hobby:</label><br>
							<label id="hobby_err"></label>

							<div class="form-check">
							  	<label class="form-check-label">
							    <input type="checkbox" class="form-check-input @error('hobby') is-invalid @enderror"  name="hobby[]" value="Cricket">Cricket
							  	</label>

						    	@error('hobby')
								    <div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>

							<div class="form-check">
							  	<label class="form-check-label">
							    <input type="checkbox" class="form-check-input" name="hobby[]" value="FootBall">FootBall
							  	</label>
							</div>

							<div class="form-check">
							  	<label class="form-check-label">
							    <input type="checkbox" class="form-check-input" name="hobby[]" value="Careme" >Careme
							  	</label>
							</div>

							<div class="form-group">
						    	<label for="">Profile:</label>
						    	<input type="file" class="form-control @error('image') is-invalid @enderror" name="image" placeholder="Enter password" id="image">
						    	@error('image')
								    <div class="alert alert-danger">{{ $message }}</div>
								@enderror
						    	<span id="image_err"></span>
						  	</div>
						  	
						  	<button class="btn btn-primary" id="btn">Submit</button>
					</form>
		      	</div>
		  
		    </div>
		</div>
	</div>
	<script src="{{asset('assets/custome.js')}}"></script>
</body>
</html>