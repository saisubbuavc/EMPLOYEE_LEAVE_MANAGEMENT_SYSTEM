<?php
require('top1.inc.php');
if($_SESSION['ROLE']!=1){
	header('location:add_employee1.php?id='.$_SESSION['USER_ID']);
	die();
}
$res=mysqli_query($con,"CALL countemp()") or die("query fail: ".mysqli_error());
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Total Employee master</h4>
						   
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead> 
                                    <tr>
                                       <th width="5%">S.No</th>
                                       <th width="5%">DepartmentID</th>
                                       <th width="5%">Noofemployees</th>
                                       <th width="50%"></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
									$i=1;
									while($row=mysqli_fetch_array($res)){?>
									<tr>
                                       <td><?php echo $i?></td>
									   <td><?php echo $row['department_id']?></td>
                                       <td><?php echo $row['TOTAL EMPLOYEE']?></td>
									   
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