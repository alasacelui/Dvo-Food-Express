
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

?>
<?php include 'header.php'; ?>
  <?php include 'nav.php' ?>
       <?php include 'dashboardlayout.php' ?>
<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>

  
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        
                       
                        <div class="card">
                            <div class="card-body">
                              
                                <h4 class="card-title">View user Orders</h4>
                             
                                <div class="table-responsive m-t-20">
                                    <table id="myTable" class="table table-bordered table-striped">
                                       
                                        <tbody>
                                           <?php
											$sql="SELECT users.*, users_orders.* FROM users INNER JOIN users_orders ON users.u_id=users_orders.u_id where o_id='".$_GET['user_upd']."'";
												$query=mysqli_query($db,$sql);
												$rows=mysqli_fetch_array($query);
												
												
																		
												?>
											  <?php if($rows) : ?>
											<tr>
													<td><strong>username:</strong></td>
												    <td><center><?php echo $rows['username']; ?></center></td>
													   <td><center>
													   <a href="javascript:void(0);" onClick="popUpWindow('order_update.php?form_id=<?php echo htmlentities($rows['o_id']);?>');" title="Update order">
															 <button type="button" class="btn btn-primary">Take Action</button></a>
															 </center>
											 </td>
												  
																																					
											</tr>	
											<tr>
												<td><strong>Title:</strong></td>
												    <td><center><?php echo $rows['title']; ?></center></td>
													    <td><center>
													   <a href="javascript:void(0);" onClick="popUpWindow('userprofile.php?newform_id=<?php echo htmlentities($rows['o_id']);?>');" title="Update order">
														<button type="button" class="btn btn-primary">View User Details</button></a>
											
													   </center></td>
												   																								
											</tr>	
											<tr>
													<td><strong>Quantity:</strong></td>
												    <td><center><?php echo $rows['quantity']; ?></center></td>
													  
												   																							
											</tr>
											<tr>
													<td><strong>Price:</strong></td>
												    <td><center>₱<?php echo $rows['price']; ?></center></td>
													   
												   																							
											</tr>
											<tr>
													<td><strong>Address:</strong></td>
												    <td><center><?php echo $rows['address']; ?></center></td>
													  
												   																							
                                            </tr>
                                            
                                            <tr>
													<td><strong>Phone Number:</strong></td>
												    <td><center><?php echo $rows['phone']; ?></center></td>
													  
												   																							
                                            </tr>
                                            
											<tr>
													<td><strong>Date:</strong></td>
												     <td><center><?php echo $rows['date']; ?></center></td>
													  
												   																							
											</tr>
											<tr>
													<td><strong>status:</strong></td>
													<?php 
																			$status=$rows['status'];
																			if($status=="" or $status=="NULL")
																			{
																			?>
																			<td> <center><button type="button" class="btn btn-info" style="font-weight:bold;"><span class="fa fa-bars"  aria-hidden="true" >Dispatch</button></center></td>
																		   <?php 
																			  }
																			   if($status=="in process")
																			 { ?>
																			<td>   <center><button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin"  aria-hidden="true" ></span>On the Way!</button></center></td> 
																			<?php
																				}
																			if($status=="closed")
																				{
																			?>
																			<td>  <center><button type="button" class="btn btn-success" ><span  class="fa fa-check-circle" aria-hidden="true">Delivered</button></center></td> 
																			<?php 
																			} 
																			?>
																			<?php
																			if($status=="rejected")
																				{
																			?>
																			<td>  <center><button type="button" class="btn btn-danger"> <i class="fa fa-close"></i>cancelled</button> </center></td> 
																			<?php 
																			} 
																			?>
													  
												   																							
											</tr>

                                                                             <?php else: ?>
                                                                            <h1>NO DATA</h1>
                                                                            <?php endif ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
						 </div>
                      
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
			
			
			
			
            <!-- footer -->
          <?php include 'footer.php' ?>