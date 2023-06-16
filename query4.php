<?php
require('top1.inc.php');
if($_SESSION['ROLE']!=1){
	header('location:add_employee1.php?id='.$_SESSION['USER_ID']);
	die();
}
$res=mysqli_query($con,"SELECT  l.employee_id,t.leave_type,l.leave_status,l.noofdays,t.no_of_days, t.no_of_days-l.noofdays AS balence_leaves FROM `leave` l,leave_type t WHERE l.leave_id=t.id AND l.leave_status=2 ORDER BY l.employee_id");
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">leavesleft</h4>
						   
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead> 
                                    <tr>
                                       <th width="5%">S.No</th>
									   <th width="5%">employee_id</th>
                                       <th width="5%">leave_type</th>
                                       <th width="5%">leave_status</th>
                                       <th width="5%">noofdays</th>
									   <th width="5%">no_of_days</th>
									   <th width="5%">balence_leaves</th>
                                       <th width="50%"></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
									$i=1;
									while($row=mysqli_fetch_array($res)){?>
									<tr>
                                       <td><?php echo $i?></td>
									   <td><?php echo $row['employee_id']?></td>
									   <td><?php echo $row['leave_type']?></td>
                                       <td><?php echo $row['leave_status']?></td>
									   <td><?php echo $row['noofdays']?></td>
                                       <td><?php echo $row['no_of_days']?></td>
                                       <td><?php echo $row['balence_leaves']?></td>
									</tr>
									<?php 
									$i++;
									} ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
         
<?php
require('footer1.inc.php');
?>