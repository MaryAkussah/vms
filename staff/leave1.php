<?php 
    include '../includes/StaffSession.php'; 
    include '../includes/head.php'; 
    // include 'php_action/dashboard.php';
?>
</head>
<body>
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            <div class="header">
			
				<!-- Logo -->
                <div class="header-left">
                     <a href="admin-dashboard.html" class="logo">
						<img src="assets/img/logo.png" width="40" height="40" alt="Logo">
					</a>
					<a href="admin-dashboard.html" class="logo2">
						<img src="assets/img/logo2.png" width="40" height="40" alt="Logo">
					</a>
                </div>
				<!-- /Logo -->
				
				<a id="toggle_btn" href="javascript:void(0);">
					<span class="bar-icon">
						<span></span>
						<span></span>
						<span></span>
					</span>
				</a>
				
				<!-- Header Title -->
    
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Basic Inputs</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Basic Inputs</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title mb-0">Basic Inputs</h4>
								</div>
								<div class="card-body">
									<form action="#">
										<div class="input-block mb-3 row">
											<label class="col-form-label col-md-2">Text Input</label>
											<div class="col-md-10">
												<input type="text" class="form-control">
											</div>
										</div>
										<div class="input-block mb-3 row">
											<label class="col-form-label col-md-2">Password</label>
											<div class="col-md-10">
												<input type="password" class="form-control">
											</div>
										</div>
										<div class="input-block mb-3 row">
											<label class="col-form-label col-md-2">Disabled Input</label>
											<div class="col-md-10">
												<input type="text" class="form-control" disabled="disabled">
											</div>
										</div>
										<div class="input-block mb-3 row">
											<label class="col-form-label col-md-2">Readonly Input</label>
											<div class="col-md-10">
												<input type="text" class="form-control" value="readonly" readonly="readonly">
											</div>
										</div>
										<div class="input-block mb-3 row">
											<label class="col-form-label col-md-2">Placeholder</label>
											<div class="col-md-10">
												<input type="text" class="form-control" placeholder="Placeholder">
											</div>
										</div>
										<div class="input-block mb-3 row">
											<label class="col-form-label col-md-2">File Input</label>
											<div class="col-md-10">
												<input class="form-control" type="file">
											</div>
										</div>
										<div class="input-block mb-3 row">
											<label class="col-form-label col-md-2">Default Select</label>
											<div class="col-md-10">
												<select class="form-control form-select">
													<option>-- Select --</option>
													<option>Option 1</option>
													<option>Option 2</option>
													<option>Option 3</option>
													<option>Option 4</option>
													<option>Option 5</option>
												</select>
											</div>
										</div>
										<div class="input-block mb-3 row">
											<label class="col-form-label col-md-2">Radio</label>
											<div class="col-md-10">
												<div class="radio">
													<label class="col-form-label">
														<input type="radio" name="radio"> Option 1
													</label>
												</div>
												<div class="radio">
													<label class="col-form-label">
														<input type="radio" name="radio"> Option 2
													</label>
												</div>
												<div class="radio">
													<label class="col-form-label">
														<input type="radio" name="radio"> Option 3
													</label>
												</div>
											</div>
										</div>
										<div class="input-block mb-3 row">
											<label class="col-form-label col-md-2">Checkbox</label>
											<div class="col-md-10">
												<div class="checkbox">
													<label class="col-form-label">
														<input type="checkbox" name="checkbox"> Option 1
													</label>
												</div>
												<div class="checkbox">
													<label class="col-form-label">
														<input type="checkbox" name="checkbox"> Option 2
													</label>
												</div>
												<div class="checkbox">
													<label class="col-form-label">
														<input type="checkbox" name="checkbox"> Option 3
													</label>
												</div>
											</div>
										</div>
										<div class="input-block mb-3 row">
											<label class="col-form-label col-md-2">Textarea</label>
											<div class="col-md-10">
												<textarea rows="5" cols="5" class="form-control" placeholder="Enter text here"></textarea>
											</div>
										</div>
										<div class="input-block mb-3 mb-0 row">
											<label class="col-form-label col-md-2">Input Addons</label>
											<div class="col-md-10">
												<div class="input-group">
													<span class="input-group-text">$</span>
													<input class="form-control" type="text">
													<button class="btn btn-primary" type="button">Button</button>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="card mb-0">
								<div class="card-header">
									<h4 class="card-title mb-0">Input Sizes</h4>
								</div>
								<div class="card-body">
									<form action="#">
										<div class="input-block mb-3 row">
											<label class="col-form-label col-md-2">Large Input</label>
											<div class="col-md-10">
												<input type="text" class="form-control form-control-lg" placeholder=".form-control-lg">
											</div>
										</div>
										<div class="input-block mb-3 row">
											<label class="col-form-label col-md-2">Default Input</label>
											<div class="col-md-10">
												<input type="text" class="form-control" placeholder=".form-control">
											</div>
										</div>
										<div class="input-block mb-3 mb-0 row">
											<label class="col-form-label col-md-2">Small Input</label>
											<div class="col-md-10">
												<input type="text" class="form-control form-control-sm" placeholder=".form-control-sm">
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				
				</div>			
			</div>
			<!-- /Main Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
		
		
			

		<!-- jQuery -->
       <script src="assets/js/jquery-3.7.0.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/bootstrap.bundle.min.js"></script>
		
		<!-- Slimscroll JS -->
		<script src="assets/js/jquery.slimscroll.min.js"></script>
		
		 <!-- Theme Settings JS -->
		<script src="assets/js/layout.js"></script>
		<script src="assets/js/theme-settings.js"></script>
		<script src="assets/js/greedynav.js"></script>
		<!-- Custom JS -->
		<script  src="assets/js/app.js"></script>
		
    </body>

<?php include '../includes/footer.php'?>
    

<?php 
    include '../includes/StaffSession.php'; 
    include '../includes/head.php'; 
    // include 'php_action/dashboard.php';
?>

</head>
<body>
  <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <?php 
                include '../includes/header.php';
                include '../includes/sidebar.php';
            ?>
             <!-- Main Content -->
      <div class="main-content">
        <section class="section">
         
        

        </section>
      </div>
            
        </div>
    </div>
</body>


<?php include '../includes/footer.php'?>
    