<!doctype html>
<html lang="en">
  <head>
  	<title>Đăng nhập Admin CKC Social Network</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{URL('admin/login/css/style.css')}}">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">CKC SOCIAL NETWROK</h2>
                    <h5 class="heading-section">ĐĂNG NHẬP ADMIN</h5>
				</div>
			</div>
            
			<div class="row justify-content-center">
           
				<div class="col-md-6 col-lg-5">
                @if ($errors->has('error'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('error') }}
                                </div>
                            @endif
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
						<form action="{{route('loginAdmin')}}" method="post" class="login-form">
                        @csrf
		      		<div class="form-group">
		      			<input name="email" type="text" class="form-control rounded-left" placeholder="Email" required>
		      		</div>
	            <div class="form-group d-flex">
	              <input name="password" type="password" class="form-control rounded-left" placeholder="Mật khẩu" required>
	            </div>
	            
	            <div class="form-group">
	            	<button type="submit" class="btn btn-primary rounded submit p-3 px-5">Đăng nhập</button>
	            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{URL('admin/login/js/jquery.min.js')}}"></script>
  <script src="{{URL('admin/login/js/popper.js')}}"></script>
  <script src="{{URL('admin/login/js/bootstrap.min.js')}}"></script>
  <script src="{{URL('admin/login/js/main.js')}}"></script>

	</body>
</html>

