<?php
require('top1.inc.php');
if($_SESSION['ROLE']!=1){
	header('location:add_employee1.php?id='.$_SESSION['USER_ID']);
	die();
}
$leave_type='';
$no_of_days	='';
$id='';
if(isset($_GET['id'])){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	$res=mysqli_query($con,"select * from leave_type where id='$id'");
	$row=mysqli_fetch_assoc($res);
	$leave_type=$row['leave_type'];
	$no_of_days=$row['no_of_days'];
	
}
if(isset($_POST['submit'])){
	$leave_type=mysqli_real_escape_string($con,$_POST['leave_type']);
	$no_of_days=mysqli_real_escape_string($con,$_POST['no_of_days']);
	if($id>0){
		$sql="update leave_type set leave_type='$leave_type',no_of_days='$no_of_days' where id='$id'";
	}else{
		$sql="insert into leave_type(leave_type,no_of_days) values('$leave_type','$no_of_days')";
	}
	mysqli_query($con,$sql);
	header('location:leave_type1.php');
	die();
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Leave Type</strong><small> Form</small></div>
                        <div class="card-body card-block">
                           <form method="post">
							   <div class="form-group">
									<label class=" form-control-label">Leave Type</label>
									<input type="text" value="<?php echo $leave_type?>" name="leave_type" placeholder="Enter leave type" class="form-control" required>
								</div>
							    <div class="form-group">
									<label class=" form-control-label">noofdays</label>
									<input type="int" value="<?php echo $no_of_days?>" name="no_of_days" placeholder="Enter maxdays" class="form-control" required>
								</div>
							   <button  type="submit" name="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							  </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
                  
<?php
require('footer1.inc.php');
?>