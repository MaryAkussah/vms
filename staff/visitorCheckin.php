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
                    <form class="needs-validation" novalidate="">
                        <div class="card-header">
                        <h4>Check In Visitor</h4>
                        </div>
                        <div class="card-body">
                            <div class="card-header">Basic Info</div>
                        <div class="row">
                            <div class="form-group col-6">
                            <label for="frist_name">First Name</label>
                            <input id="frist_name" type="text" class="form-control" name="first_name" autofocus required="">
                            <div class="invalid-feedback">Please enter your first name</div>
                            </div>

                            <div class="form-group col-6">
                            <label for="last_name">Last Name</label>
                            <input id="last_name" type="text" class="form-control" name="last_name" required="">
                            <div class="invalid-feedback">Please enter your last name</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="user_email" required="">
                                <div class="invalid-feedback">Please enter your email address</div>
                            </div>
                            <div class="form-group col-6">
                                <label for="phone">Phone</label>
                                <input id="phone" type="number" class="form-control" name="user_phone" required="">
                                <div class="invalid-feedback">Please enter your phone number</div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="visitor_type">Visitor Type</label>
                                <select name="visitor_type_id" class="form-control" required>
                                        <option value="" selected disabled>--SELECT VISITOR TYPE--</option>
                                            <?php

                                            $result = mysqli_query($conn,"SELECT * FROM visitor_type");
                                            while($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?=$row["visitor_type_id"];?>"><?= $row["visitor_type_name"];?></option>
                                            <?php
                                            }
                                            ?>
                                    </select>
                                <div class="invalid-feedback">Please enter your email address</div>
                            </div>
                            <div class="form-group col-6">
                                <label for="id">Ghana Card / Voters ID</label>
                                <input id="id" type="text" class="form-control" name="identification" required="">
                                <div class="invalid-feedback">Please enter your identification number</div>
                            </div> 
                        </div>
                        <div class="card-header">Visit Info</div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="staff">Host Name (Staff)</label>
                                <select name="staff_id" class="form-control" required>
                                        <option value="" selected disabled>--SELECT HOST NAME--</option>
                                            <?php

                                            $result = mysqli_query($conn,"SELECT * FROM tbl_staff");
                                            while($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?=$row["staff_id"];?>"><?= $row["first_name"];?> <?= $row["last_name"];?></option>
                                            <?php
                                            }
                                            ?>
                                    </select>
                                <div class="invalid-feedback">Please enter the hostname</div>
                            </div>
                            <div class="form-group col-6">
                                <label for="id">Ghana Card / Voters ID</label>
                                <input id="id" type="text" class="form-control" name="identification" required="">
                                <div class="invalid-feedback">Please enter your identification number</div>
                            </div> 
                        </div>

                        <div class="form-group mb-0">
                            <label>Message</label>
                            <textarea class="form-control" required=""></textarea>
                            <div class="invalid-feedback">
                            What do you wanna say?
                            </div>
                        </div>
                        </div>
                        <div class="card-footer text-right">
                        <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

        </section>
      </div>
            
        </div>
    </div>
</body>


<?php include '../includes/footer.php'?>
    