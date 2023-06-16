<?php
require('top1.inc.php');
if($_SESSION['ROLE']!=1){
	header('location:add_employee1.php?id='.$_SESSION['USER_ID']);
	die();
}
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">leaveapplication</h4>
						   <h4 class="box_title_link"><a href="leaveapp_id.php">Enter leave_application_id</a> </h4>
                        </div>
                
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