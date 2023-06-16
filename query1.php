<?php
require('top1.inc.php');
if($_SESSION['ROLE']!=1){
	header('location:add_employee1.php?id='.$_SESSION['USER_ID']);
	die();
}
$res=mysqli_query($con,"SELECT department_id,COUNT(CASE when gender='m' then 1 END) as malecount,COUNT(CASE when gender='f' then 1 END) as femalecount,count(*) AS 'TOTAL' from employee GROUP BY department_id ");
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Total number of males and females</h4>
						   
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead> 
                                    <tr>
                                       <th width="5%">S.No</th>
									   <th width="5%">DepartmentId</th>
                                       <th width="5%">Males</th>
                                       <th width="5%">Females</th>
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
									   <td><?php echo $row['malecount']?></td>
                                       <td><?php echo $row['femalecount']?></td>
									   
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