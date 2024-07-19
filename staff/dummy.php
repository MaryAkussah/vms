  <!-- <?php 
                                                $sql = "SELECT sl.*, ts.first_name, ts.last_name	
                                                FROM staff_leave as sl 
                                                LEFT JOIN tbl_staff as ts ON sl.staff_id=ts.staff_id
                                                LEFT JOIN status as s ON s.status_id=sl.staff_id
                                                WHERE ts.department_id='$department_id'
                                                AND sl.state='Pending'
                                                ORDER BY sl.leave_id DESC";
                                            
                                            $result = $conn->query($sql);
                                            
                                            if ($result->num_rows > 0) {
                                                $i = 1;
                                                while ($fetch = $result->fetch_assoc()) {
                                            ?> -->


        <!-- Example: -->
        <?php 
                                                }
                                            } else {
                                                echo "<tr><td colspan='8'>No leave requests found.</td></tr>";
                                            }