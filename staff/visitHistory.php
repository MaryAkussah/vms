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
                include '../includes/staffSidebar.php';
            ?>
             <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
              <div class="card">
                <div class="card-header"><strong>Visit History</strong></div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                      <thead>
                        <tr>
                          <th>S/N</th>
                          <th>VISITOR NAME</th>
                          <th>STAFF NAME</th>
                          <th>PURPOSE</th>
                          <th>VISIT DATE</th>
                          <th>TIME IN</th>
                          <th>TIME OUT</th>
                          <th>STATUS</th>
                        </tr>
                      </thead>
                      <?php 
                      $visitHistory=$conn->query("SELECT * FROM check_in
<<<<<<< HEAD
                      LEFT JOIN visitors ON visitors.visitor_id = check_in.visitor_id
                      LEFT JOIN tbl_staff ON tbl_staff.staff_id = check_in.staff_id
                      LEFT JOIN status ON status.status_id = check_in.status_id
                      LEFT JOIN (
                          SELECT team_id, MIN(visitor_id) AS lead_visitor_id
                          FROM tbl_team
                          GROUP BY team_id
                      ) AS team_lead ON check_in.team_id = team_lead.team_id
                      WHERE check_in.staff_id='$staff_id' AND (check_in.team_id IS NULL OR check_in.visitor_id = team_lead.lead_visitor_id)
                      ORDER BY check_in.check_in_id DESC");
=======
                      LEFT JOIN visitors ON visitors.visitor_id=check_in.visitor_id
                      LEFT JOIN tbl_staff ON tbl_staff.staff_id=check_in.staff_id
                      LEFT JOIN status ON status.status_id=check_in.status_id
                      WHERE check_in.staff_id='$staff_id'
                      ORDER BY check_in_id DESC");
>>>>>>> d4cbf2a9c05de32fe5bd02bc85e371bc7a160a1e
                      $visits=$visitHistory->fetch_all(MYSQLI_ASSOC);

                      ?>
                      <tbody>
                        <?php $i=1; foreach ($visits as $fetch): ?>
                          <tr>
                            
                            <td><?=$i++;?></td>
<<<<<<< HEAD
                            <td>
                                <?php 
                                    echo $fetch['full_name'];
                                    // Check if the visitor is part of a team
                                    if (!empty($fetch['team_id'])) {
                                        echo " <a href='javascript:void(0);'  class='team-toggler' data-team-id='{$fetch['team_id']}'><i class='fas fa-users text-success'></i></a>";
                                    }
                                ?>
                            </td>
=======
                            <td><?= $fetch['full_name']?></td>
>>>>>>> d4cbf2a9c05de32fe5bd02bc85e371bc7a160a1e
                            <td><?= $fetch['first_name']?> <?= $fetch['last_name']?></td>
                            <td><?= $fetch['purpose']?></td>
                            <td><?= $fetch['date_in']?></td>
                            <td><?= date('g:i A', strtotime($fetch['time_in']))?></td>
                            <td><?php if(empty($fetch['time_out'])){echo "<strong class='text-danger'><i>Not Set</i></strong>";}else{echo date('g:i A', strtotime($fetch['time_out']));}?></td>
<<<<<<< HEAD
                            <td><?php if($fetch['status_id']==4){echo "<span  class='badge badge-danger'>".$fetch['status_name']."</span>";}elseif($fetch['status_id']==5){echo "<span class='badge badge-success'>".$fetch['status_name']."</span>";}elseif($fetch['status_id']==6){echo "<span class='badge badge-warning'>".$fetch['status_name']."</span>";} elseif($fetch['status_id']==7){echo "<span class='badge badge-warning'>".$fetch['status_name']."</span>";}?></td>
                          </tr>


                            <!-- modal for viewing team members -->
                            <div class="modal fade  mt-5" id="teamMembersModal" tabindex="-1" role="dialog" aria-labelledby="teamMembersModalLabel" aria-hidden="true"  data-backdrop="false">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="teamMembersModalLabel">Team Members</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" id="teamMembersContainer">
                                        <!-- Team members will be displayed here -->
                                    </div>
                                </div>
                            </div>
                        </div>

=======
                            <td><?php if($fetch['status_id']==4){echo "<span  class='badge badge-danger'>".$fetch['status_name']."</span>";}elseif($fetch['status_id']==5){echo "<span class='badge badge-success'>".$fetch['status_name']."</span>";}elseif($fetch['status_id']==6){echo "<span class='badge badge-warning'>".$fetch['status_name']."</span>";} elseif($fetch['status_id']==7){echo "<span class='badge badge-warning'>".$fetch['status_name']."</span>";}elseif($fetch['status_id']==8){echo "<span class='badge badge-danger'>".$fetch['status_name']."</span>";}?></td>
                          </tr>
>>>>>>> d4cbf2a9c05de32fe5bd02bc85e371bc7a160a1e
                        <?php endforeach?>
                        
                      </tbody>
                    </table>
                </div>
                </div>
              </div>
            </div>
          </div>

        </section>
      </div>
            
        </div>
    </div>
<<<<<<< HEAD

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Add click event listener to all elements with the class 'team-toggler'
        const teamTogglers = document.querySelectorAll('.team-toggler');
        
        teamTogglers.forEach(function (toggler) {
            toggler.addEventListener('click', function () {
                // Get the team ID from the data-team-id attribute
                const teamId = this.getAttribute('data-team-id');
                
                // Perform AJAX request to fetch team members
                fetchTeamMembers(teamId);
            });
        });

        // Function to fetch and display team members
        function fetchTeamMembers(teamId) {
            // Make AJAX request to fetch team members
            fetch('fetch_team_members.php?team_id=' + teamId)
                .then(response => response.json())
                .then(data => {
                    // Display team members in a modal or any other element
                    // For example, you can use a modal to display team members
                    displayTeamMembers(data);
                })
                .catch(error => console.error('Error fetching team members:', error));
        }

        // Function to display team members in a modal
function displayTeamMembers(teamMembers) {
    // Clear existing content in modal body
    $('#teamMembersContainer').empty();

    // Create the table header outside the loop
    var memberHtml = `
        <div class="team-member table-responsive">
            <table class="table table-striped" id="table-1">
                <thead>
                    <tr>
                        <th>VISITOR NAME</th>
                        <th>VISITOR PHONE</th>
                        <th>STAFF NAME</th>
                        <th>TIME IN</th>
                        <th>TIME OUT</th>
                        <th>VISIT DATE</th>
                    </tr>
                </thead>
                <tbody>
    `;

    // Loop through team members and add rows to the table body
    teamMembers.forEach(function(member) {
        // Append row for each team member
        memberHtml += `
            <tr>
                <td>${member.full_name}</td>
                <td>${member.visitor_phone}</td>
                <td>${member.first_name} ${member.last_name}</td>
                <td>${member.time_in}</td>
                <td>${member.time_out ? member.time_out : 'Not Set'}</td>
                <td>${member.date_in}</td>
            </tr>
        `;
    });

    // Close the table body and the table itself
    memberHtml += `
                </tbody>
            </table>
        </div>
    `;

    // Append the generated HTML to the modal body
    $('#teamMembersContainer').append(memberHtml);

    // Show the modal
    $('#teamMembersModal').modal('show');
}
    });
</script>

<?php include '../includes/footer.php'?>
</body>
=======
</body>


<?php include '../includes/footer.php'?>
    
>>>>>>> d4cbf2a9c05de32fe5bd02bc85e371bc7a160a1e
