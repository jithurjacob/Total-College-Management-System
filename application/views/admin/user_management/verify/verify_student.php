<?php  ?>
<div class="row holder">
    <div class="col-md-12">
        <div class="home_steps  text-justify noborder">
        <br />
            <br />
            <h2>Unverified  Students</h2>
            <br />
            <br />
            
            <br />
            <div class="responsive-table">
            <table id="student_table" class="table  table-condens table-hover table-bordere text-left verify_table responsive">
                    <thead>
                    <th>Name</th>
                    <th>Branch</th>
                    <th>Semester</th>
                    <th>Admn No</th>
                    <th>Reg No</th>
                    <th>Roll No</th>
                    <th>Year of Passing</th>
                        <th>Username</th>
                        
                        <th>Email</th>
                        
                        <th>Mobile Number</th>
                        <th>Verify</th>
                        <th>Reject</th>
                    </thead>
                    <?php  foreach ($students as $student): ?>
                        <tr id="<?php  $enc_usr=$student["username"];   echo $student['username']; ?>">
                            
                            <td>
                                <?php     echo $student['name']; ?>
                            </td>
                            <td>
                                <?php     echo $student['branch']; ?>
                            </td>
                            <td>
                                <?php     echo $student['semester']; ?>
                            </td>
                            <td>
                                <?php     echo $student['admnno']; ?>
                            </td>
                            <td>
                                <?php     echo $student['regno']; ?>
                            </td>
                            <td>
                                <?php     echo $student['rollno']; ?>
                            </td>
                            <td>
                                <?php     echo $student['year_pass']; ?>
                            </td>
                            <td>
                                <?php    echo $student['username']; ?>
                            </td>
                            <td>
                                <?php     echo $student['email']; ?>
                            </td>
                            
                            <td>
                                <?php     echo $student['mobno']; ?>
                            </td>

                            <td><a class="accept_btn" table="students" data="<?php echo $student['username']; ?>" ><i class="entypo-check"></i> Verify</a></td>
                            <td><a class="reject_btn" table="students" data="<?php echo $student['username']; ?>" ><i class="entypo-cancel"> Reject</a></td>
                            
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    </div>
</div>