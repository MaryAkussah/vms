<?php 
    include '../includes/AdminSession.php'; 
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
          <div class="row">
              <div class="col-12 col-md-6 col-lg-8">
                  <div class="card">
                    <div class="card-header">Check In Criteria</div>
                    <div class="card-body">
                      <form action="php_action/searchForm.php" method="POST">
                        <div class="form-group col-lg-6">
                          <label for="check in">Check In Criteria</label>
                          <select name="searchForm" id="" class="form-control">
                            <option value="" selected disabled>--SELECT CHECK IN FORM--</option>
                            <option value="1">Individual Check In</option>
                            <option value="2">Team Check In</option>
                            <option value="3">Returning Visitor</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-md btn-primary" name="checkinForm"><i class="fas fa-search mx-2"></i>Retrieve Form</button>
                        </div>
                      </form>
                    </div>
                  </div>
              </div>
          </div>

        </section>
      </div>
            
        </div>
    </div>
</body>


<?php include '../includes/footer.php'?>
    