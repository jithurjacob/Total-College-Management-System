<?php  ?>
<div class="row holder">
    <div class="col-md-12">
        <div class="home_steps  text-justify noborder">

            <br />
            <h2>Current Departments</h2>
            <br />
            <div class="responsive-table">
                <table id="current_table" class="table  table-condens table-hover table-bordere text-left verify_table responsive">
                    <thead>
                        <th>Department Name</th>
                        <th>Number of Students studying</th>
                        <th>Number of Students passed</th>
                        <th>Head of Department</th>
                        <th>Action</th>
                    </thead>
                    <?php  foreach ($branches_current as $branch): ?>
                        <tr id="<?php   echo $branch['b_id']; ?>">

                            <td class="middle-align">
                                <?php     echo $branch['b_name']; ?>
                            </td>
                            <td class="middle-align">
                                <?php     echo $branch['current_count']; ?>
                            </td>
                            <td class="middle-align">
                                <?php     echo $branch['previous_count']; ?>
                            </td>
                            <td class="middle-align">
                                <?php     echo $branch['f_name']; ?>
                               
                            </td>
                            
                            <td class="middle-align">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                                        <!-- EDITING LINK -->
                                        <li>
                                            <a href="#" onclick="showAjaxModal('http://creativeitem.com/demo/ekattor/index.php?modal/popup/modal_edit_class/3');">
                                                <i class="entypo-pencil"></i>
                                                Edit                                            </a>
                                            </li>
                                            <li class="divider"></li>

                                            <!-- DELETION LINK -->
                                            <li>
                                                <a href="#" onclick="confirm_modal('http://creativeitem.com/demo/ekattor/index.php?admin/classes/delete/3');">
                                                    <i class="entypo-trash"></i>
                                                    Delete                                            </a>
                                                </li>
                                            </ul>
                                        </div>

                                    </td>

                                </tr>
                            <?php endforeach ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row holder">
            <div class="col-md-12">
                <div class="home_steps  text-justify noborder">

                    <br />
                    <h2>Removed Departments</h2>
                    <br />
                    <div class="responsive-table">
                        <table id="branch_table" class="table  table-condens table-hover table-bordere text-left verify_table responsive">
                            <thead>
                                <th>Department Name</th>
                                <th>Number of Students studying</th>
                                <th>Number of Students passed</th>
                                <th>Head of Department</th>

                                <th>Add</th>
                            </thead>
                            <?php  foreach ($branches_previous as $branch): ?>
                                <tr id="<?php   echo $branch['b_id']; ?>">

                                    <td class="middle-align">
                                        <?php     echo $branch['b_name']; ?>
                                    </td>
                                    <td class="middle-align">
                                        <?php     echo $branch['current_count']; ?>
                                    </td>
                                    <td class="middle-align">
                                        <?php     echo $branch['previous_count']; ?>
                                    </td>
                                    <td class="middle-align">
                                        <?php     echo $branch['f_name']; ?>
                                        
                                    </td>
                                    <td class="middle-align">
                                    <a class="add_btn" table="branches" data="<?php echo $branch['b_id']; ?>" ><i class="entypo-check"></i> Add</a></td>


                                </tr>
                            <?php endforeach ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>


 <div class="modal fade" id="modal_ajax">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">College of Engineering Poonjar</h4>
                </div>
                
                <div class="modal-body" style="height:500px; overflow:auto;">
                
                    
                    
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

 <!-- (Normal Modal)-->
    <div class="modal fade" id="modal-4">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-top:100px;">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
                </div>
                
                
                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>      
    

    <script type="text/javascript">
    function showAjaxModal(url)
    {
        // SHOWING AJAX PRELOADER IMAGE
        jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo base_url();?>assets/images/preloader.gif" /></div>');
        
        // LOADING THE AJAX MODAL
        jQuery('#modal_ajax').modal('show', {backdrop: 'true'});
        
        // SHOW AJAX RESPONSE ON REQUEST SUCCESS
        $.ajax({
            url: url,
            success: function(response)
            {
                jQuery('#modal_ajax .modal-body').html(response);
            }
        });
    }
    </script>

      <script type="text/javascript">
    function confirm_modal(delete_url)
    {
        jQuery('#modal-4').modal('show', {backdrop: 'static'});
        document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
    </script>