<?php  ?>
<div class="row holder">
    <div class="col-md-12">
        <div class="home_steps  text-justify noborder">
        <br />
            <br />
            <h2>Unverified Alumni Users</h2>
            <br />
            <br />
            
            <br />
            <div class="responsive-table">
            <table id="alumni_table" class="table  table-condens table-hover table-bordere text-left verify_table responsive">
                    <thead>
                    <th>Name</th>
                    <th>Branch</th>
                    <th>Year of Passing</th>
                        <th>Username</th>
                        
                        <th>Email</th>
                        
                        <th>Mobile Number</th>
                        <th>Verify</th>
                        <th>Reject</th>
                    </thead>
                    <?php  foreach ($alumnees as $alumni): ?>
                        <tr id="<?php  $enc_usr=$alumni["username"];   echo $alumni['username']; ?>">
                            
                            <td>
                                <?php     echo $alumni['name']; ?>
                            </td>
                            <td>
                                <?php     echo $alumni['branch']; ?>
                            </td>
                            <td>
                                <?php     echo $alumni['year_pass']; ?>
                            </td>
                            <td>
                                <?php    echo $alumni['username']; ?>
                            </td>
                            <td>
                                <?php     echo $alumni['email']; ?>
                            </td>
                            
                            <td>
                                <?php     echo $alumni['mobno']; ?>
                            </td>

                            <td><a class="accept_btn" table="students" data="<?php echo $alumni['username']; ?>" ><i class="entypo-check"></i> Verify</a></td>
                            <td><a class="reject_btn" table="students" data="<?php echo $alumni['username']; ?>" ><i class="entypo-cancel"> Reject</a></td>
                            
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    </div>
</div>