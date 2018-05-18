<?php 

	include 'include/config.php';
	
	include 'include/function.php';

	page_protect();
	
	ini_set('display_errors', 0);

	$status = $_GET['msg'];
	
	
if($_POST['save'] == 'Register')   {

	$tat_cust_id = $_POST['tat_cust_id'];  
	$tat_cust_no = $_POST['tat_cust_no'];
	$tat_name = $_POST['tat_name'];
	$tat_email = $_POST['tat_email'];
	$tat_mobile = $_POST['tat_mobile'];
	$tat_address = $_POST['tat_address'];  
	$tat_date = $_POST['tat_date'];
	$tat_month = $_POST['tat_month'];
	$tat_year = $_POST['tat_year'];
	$tat_notes = $_POST['tat_notes'];
	$tat_ages = $_POST['tat_ages'];
	$tat_gender = $_POST['tat_gender'];
	$tat_known = $_POST['tat_known'];  
	$tat_createdon = $_POST['tat_createdon'];
	$tat_updatedon = $_POST['tat_updatedon'];
	$tat_status = $_POST['tat_status'];
	//Checking Existing Customer
	$mobile_exist = $_POST['mobile_exist'];

if($mobile_exist == 1) {
	$err[] = "Mobile Number Already Exists";
} 

$check_customer_exist = mysql_query("SELECT `tat_mobile` FROM `tatoo_customer` where `tat_mobile`='$tat_mobile'") or die("Unable to get #1: ".mysql_error());
	$collect_customerchecked_list = mysql_num_rows($check_customer_exist); 

	if($tat_mobile == '') {
		if(!ismob($tat_mobile)) {
			$err[] = "- MOBILE looks invalid";
		} else if($collect_customerchecked_list > 0) {
			$err[] = "- Customer Already Exist";
		}
	}

$get_customerno = mysql_query("select * from tatoo_customer order by tat_cust_id DESC limit 1") or die(mysql_error());
									
									while($tat_cust_no = mysql_fetch_array($get_customerno)) {
										$customer_no = $tat_cust_no['tat_cust_id'];
										$newcustomer_no = ++$customer_no;
										$customer_number = $tat_cust_no['tat_cust_no'];
								        $newcustomer_number = ++$customer_number;
										//echo $newbill_number;
										//exit();
										 }
										$no_ofrow = mysql_num_rows($get_customerno);
							
							if($no_ofrow == 0 || $no_ofrow == '' ){$newcustomer_no = 1; $newcustomer_number = CYT001;}
							
							$get_invoicedetails = mysql_query("select * from tatoo_invoice") or die(mysql_error());
						
						while($invoice_details = mysql_fetch_array($get_invoicedetails)) {
						
							$tat_invoice_id = $invoice_details['tat_invoice_id']; 
							$tat_cust_name = $invoice_details['tat_cust_name'];
							$tat_cust_address = $invoice_details['tat_cust_address']; 
							$tat_invoice = $invoice_details['tat_invoice'];
							
							$tat_invoicedate = $invoice_details['tat_invoicedate'];
							$tat_invoicedate_timestamp = str_replace('/' ,'-' ,$tat_invoicedate);
							$tatinvoicedate = date('d-m-Y', strtotime($tat_invoicedate_timestamp));
							
							$tat_sac = $invoice_details['tat_sac'];  
							$tat_description = $invoice_details['tat_description'];
							$tat_modeofpayment = $invoice_details['tat_modeofpayment'];
							$tat_total_amount = $invoice_details['tat_total_amount'];  
							$tat_amount_paid = $invoice_details['tat_amount_paid'];
							$tat_balance = $invoice_details['tat_balance'];
							$tat_createdon = $invoice_details['tat_createdon'];
							$tat_updatedon = $invoice_details['tat_updatedon'];
							$tat_status = $invoice_details['tat_status'];
							
							}


if(empty($err))
				{
				//insert into database
			
					mysql_query("INSERT INTO `tatoo_customer_visit` (`cust_visit_type` , `cust_visit_notes` , `tat_cust_id`, `createdon`,`updatedon`) VALUES ('2', '$tat_notes', '$newcustomer_no', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."')") or die("Insertion without enquiry Failed:" . mysql_error());
					
				mysql_query("INSERT INTO `tatoo_customer` (`tat_cust_id`, `tat_cust_no`, `tat_name`, `tat_email`, `tat_mobile`, `tat_address`,`tat_date`, `tat_month`, `tat_year`, `tat_ages`, `tat_gender`, `tat_known`, `tat_createdon`,`tat_updatedon`, `tat_status`, `tat_notes`) VALUES ('$tat_cust_id', '$newcustomer_number', '$tat_name', '$tat_email', '$tat_mobile', '$tat_address', '$tat_date', '$tat_month', '$tat_year', '$tat_ages', '$tat_gender', '$tat_known','".date('Y-m-d')."', '".date('Y-m-d')."', '1', '$tat_notes')") or die("Insertion without enquiry Failed:" . mysql_error());
				
				echo "<div style='width: 350px; text-align: center; margin: 20% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>
							Please wait while we submit your enquiry...</div>";
							
				echo "<script type='text/javascript'>window.location = 'customer.php?success=Y&tat_cust_id=$tat_cust_id'</script>";
				}

}


if($_POST['update'] == 'Register'){

	$tat_cust_id = $_POST['tat_cust_id']; 
	$tat_cust_no = $_POST['tat_cust_no']; 
	$tat_name = $_POST['tat_name'];
	$tat_email = $_POST['tat_email'];
	$tat_mobile = $_POST['tat_mobile'];
	$tat_address = $_POST['tat_address'];  
	$tat_date = $_POST['tat_date'];
	$tat_month = $_POST['tat_month'];
	$tat_year = $_POST['tat_year'];
	$tat_org = $_POST['tat_org'];
	$tat_ages = $_POST['tat_ages'];
	$tat_age = $_POST['tat_age'];
	$tat_gender = $_POST['tat_gender'];
	$tat_known = $_POST['tat_known'];  
	$tat_createdon = $_POST['tat_createdon'];
	$tat_updatedon = $_POST['tat_updatedon'];
	$tat_status = $_POST['tat_status'];
	$tat_notes = $_POST['tat_notes'];


if(empty($err))
				{
				
				mysql_query("UPDATE tatoo_customer SET tat_cust_id = '$tat_cust_id', tat_cust_no = '$tat_cust_no', tat_name = '$tat_name', tat_email = '$tat_email', tat_mobile = '$tat_mobile', tat_address = '$tat_address', tat_date = '$tat_date', tat_month = '$tat_month', tat_year = '$tat_year', tat_ages= '$tat_ages',  tat_gender = '$tat_gender', tat_known = '$tat_known', tat_createdon = '".date('Y-m-d H:i:s')."', tat_updatedon = '".date('Y-m-d H:i:s')."', tat_status = '$tat_status',tat_notes = '$tat_notes' where tat_cust_id = '$tat_cust_id';") or die("Error while inserting". mysql_error());
				
				echo "<div style='width: 350px; text-align: center; margin: 20% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>
							Please wait while we submit your enquiry...</div>";
							echo "<script type='text/javascript'>window.location = 'customer.php?success=Y'</script>";
				}
}

if($_GET['action'] == 'delete') {

    $id = $_GET['nwsevnt_id'];

	$sql = "DELETE FROM tatoo_customer WHERE tat_cust_id = '$id';";
	
	$query = mysql_query($sql)or die("There was a problem while deleting: ". mysql_error()); 	

	echo "<div style='width: 350px; text-align: center; margin: 20% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update the record loading...</div>";

	if($query) {
		echo "<script type='text/javascript'>window.location = 'customer.php?msg=deleted&action=list'</script>";
}
	
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Yantra Tattoo | Dashboard</title>
  <link rel="icon" type="image/png" sizes="96x96" href="dist/img/logo_2.png">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="dist/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="dist/css/bootstrap-datepicker3.css">
  <link rel="stylesheet" type="text/css" href="dist/bootstrap/css/bootstrapValidator.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="dist/css/mediaquery.css">
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
   <style>
   	.add {
		margin:3% 0 8px 17%;
	}
	.ajax_popup
	{
	padding: 99px 56px 107px 418px;
	
	}
	
	.one {
	
    padding: 97px 270px 113px 250px;
	}
   </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
 
<div class="wrapper">
<?php include 'header.php';?>  
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <?php   if(isset($_GET['action']) =='' || $_GET['action'] == 'list') { ?>
					
    <section class="content-header">
     
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="invoice.php?action=add"> Add Invoice </a></li>
      </ol>
    </section>
    <?php }   if(isset($_GET['action']) =='add') { ?>
    
      <section class="content-header">
     
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="customer.php">Customer lists</a></li>
      </ol>
    </section>
    
    <?php } ?>
    <br>
    <br>
    
    <?php
					//get action 
					if(isset($_GET['action']) =='' || $_GET['action'] == 'list') {
					?>
          
       
            
	<section class="content">
    
     
    <a href="customer.php?action=add" class="btn btn-primary btn-sm pull-right btn_css"><i class=" glyphicon glyphicon-plus"></i> Add Customer</a>
      <div class="row">
        <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
          <div class="box">
            <div class="box-body table-responsive">
            	    <div style="display:none; text-align:center" id="progress_sales_table">loading...</div>

              <table id="customer_datas" class="table table-bordered table-striped ">
                <thead>
                  <th>Customer No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile number</th>
                  <th>Hold Mobile number</th>
                  <th>Gender</th>
                  <th>Age</th>
                  <th>Address</th>
                  <th>Action</th>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
      

<div class="modal fade exampleModal" id="dataSTEP2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-center" id="exampleModalLabel"><b><u>Customer Details</u></b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body sales-step2-data-body">
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
     
      </div>
    </div>
  </div>
</div>
      <!-- BOOSTRAP MODAL BOX -->
          <!-- <div class="modal fade" id="dataSTEP2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                        <div class="modal-lg " role="document">
                            <div class="modal-content">
                                <div class="modal-body sales-step2-data-body"></div>
                                    <div class="modal-footer">
                                  	  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                            </div>
                        </div>
                    </div>  -->
            
        
    </section>
    
                   <?php }
				   if($_GET['action'] == 'add')
				   {
						//displaying errors
						
					?>
    <!-- Main content -->
                                <section class="content">
                              <div class="col-md-10">
                            
                                     <h1 class="add">
                                    Add Customer
                                      <a href="" class="btn btn-xs btn-primary pull-right refresh_btn" id="PageRefresh"><i class="fa fa-refresh"></i> Refresh</a>
                                  </h1>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                      <?php 
							     if(!empty($err))  {
							
							echo "<div class=\"alert  alert-error\">";
							echo '<button class="close" data-dismiss="alert">x</button>
							<h4 class="alert-heading">There was a problem with your submission.</h4>';
							foreach ($err as $e) {
							echo "* $e <br>";
							}
							echo "</div>";
						}
					     	  ?>
                                      <div class="box box-primary">
                                        <form action="#" id="mainform" method="post" >
										<?php
                                        $get_customerno = mysql_query("select * from tatoo_customer order by tat_cust_id DESC limit 1") or die(mysql_error());
                                        while($tat_cust_no = mysql_fetch_array($get_customerno)) {
											$customer_no = $tat_cust_no['tat_cust_id'];
											$newcustomer_no = ++$customer_no;
											$customer_number = $tat_cust_no['tat_cust_no'];
											$newcustomer_number = ++$customer_number;
                                        }
                                        $no_ofrow = mysql_num_rows($get_customerno);
                                        if($no_ofrow == 0 || $no_ofrow == '' ){$newcustomer_no = 1; $newcustomer_number = CYT001;}
                                        ?>
                                          <div class="box-body">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                                                <br/>
                                                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 tat_show">
                                                      <div class="form-group">
                                                       <label for="formGroupExampleInput2" class="formtext control-label">Customer Id</label>
                                                         <input type="text" class="form-control" id="tat_cust_no" name="tat_cust_no" value="<?php echo $newcustomer_number; ?>" readonly>
                                                      </div>
                                                    </div>
                                                   <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 tat_show">
                                                      <div class="form-group">
                                                      <label for="formGroupExampleInput2" class="formtext control-label">Mobile Number</label>
                                                         <input type="tel" class="form-control" id="tat_mobile" placeholder="Mobile number" name="tat_mobile" maxlength="10" onKeyUp="checkphone();"  onKeyPress="return isNumber(event)" autofocus pattern="^\d{10}$",>
                                                         <span id="mobile_status" style="color: red;"></span>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 tat_show">
                                                      <div class="form-group">
                                                      <div class="valitor">
                                                      <label for="formGroupExampleInput2" class="formtext control-label">Name</label>
                                                        <input type="text" class="form-control" id="tat_name" placeholder="Name" name="tat_name" tabindex="2" maxlength="30">
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 tat_show">
                                                      <div class="form-group">
                                                      <label for="formGroupExampleInput2" class="formtext control-label">Customer Email Id</label>
                                                         <input type="text" class="form-control" id="tat_email" placeholder="Email ID" name="tat_email" maxlength="50" tabindex="3">
                                                      </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 tat_hide"> 
                                                      	<label for="formGroupExampleInput2" class="formtext control-label">Date Of Birth</label>
                                                             <div class="form-inline">
                                                                 	<div class="form-group">
                                                            <select name="tat_date" id="tat_date" onChange="" class="form-control" size="1" tabindex="4">
                                                            <option value="" selected>Day</option>
                                                            <?php
                                                                    for($i=31; $i>=01; $i--) {
                                                                        $birthdayYear = '';
                                                                        $selected = '';
                                                                        if ($birthdayYear == $i) $selected = ' selected="selected"';
                                                                        print('<option value="'.$i.'"'.$selected.'>'.$i.'</option>'."\n");
                                                                    }
                                                                ?>                          
                                                          </select>
                                                        </div>
                                                        			<div class="form-group">
                                                            <select name="tat_month" id="tat_month"  class="form-control" size="1" tabindex="5">
                                                                <option value="" selected>Month</option>
                                                                        <option value="01">Jan</option>
                                                                        <option value="02">Feb</option>
                                                                        <option value="03">Mar</option>
                                                                        <option value="04">Apr</option>
                                                                        <option value="05">May</option>
                                                                        <option value="06">June</option>
                                                                        <option value="07">July</option>
                                                                        <option value="08">Aug</option>
                                                                        <option value="09">Sep</option>
                                                                        <option value="10">Oct</option>
                                                                        <option value="11">Nov</option>
                                                                        <option value="12">Dec</option>
                                                            </select>            
                                                          </div>
                                                          			<div class="form-group">
                                                             <select name="tat_year" id="tat_year" class="form-control" onChange="check_i();" tabindex="6">
                                                                <option value="--" selected>Year</option>                       
                                                                <?php
                                                                    for($i=date('Y'); $i>=1968; $i--) {
                                                                        $birthdayYear = '';
                                                                        $selected = '';
                                                                        if ($birthdayYear == $i) $selected = ' selected="selected"';
                                                                        print('<option value="'.$i.'"'.$selected.'>'.$i.'</option>'."\n");
                                                                    }
                                                                ?>                          
                                                              </select>     
                                                          </div>                    
                                                            </div>
                                                            <br>
                                                    </div> 
                                                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 tat_show">
                                                      <div class="form-group">
                                                      	<label for="formGroupExampleInput2" class="formtext control-label">Age</label>
                                                         <input type="text" class="form-control" id="tat_ages" name="tat_ages" placeholder="Age" maxlength="20" readonly >             
                                                      </div>
                                                    </div> 
                                                        <div class="clearfix"></div>                      
                                                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 tat_show">
                                                      <div class="form-group">
                                                      	<label for="formGroupExampleInput2" class="formtext control-label">Address</label>
                                                         <textarea class="form-control" id="tat_address" name="tat_address" placeholder="Address" maxlength="100" cols="5" rows="4" tabindex="7"></textarea>                  
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 tat_hide">
                                                      <div class="form-group">
                                                      <label for="formGroupExampleInput2" class="formtext control-label">Gender</label>
                                                         <select class="form-control" name="tat_gender" id="tat_gender" tabindex="8">
                                                         	<option value="">Select Any</option>
                                                         	<option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                            <option value="Transgender">Transgender</option>
                                                         </select>
                                                      </div>
                                                    </div>
                                                    
                                                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 tat_hide">
                                                      <div class="form-group">
                                                      <label for="formGroupExampleInput2" class="formtext control-label">Referred  By</label>
                                                         <select class="form-control " id="tat_known"  name="tat_known" tabindex="9">
                                                          	<option value="">Select Who Referred</option>
                                                         	<option value="Direct">Direct</option>
                                                            <option value="Facebook">Facebook</option>
                                                            <option value="Friends">Friends</option>
                                                            <option value="Social Media">Social Media</option>
                                                            <option value="Whatsup">Whatsup</option>
                                                            <option value="Others">Others</option>
                                                            
                                                         </select>
                                                      </div>
                                                    </div>
                                                <div class="clearfix"></div>                    
                                                     <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 tat_show">
                                                      <div class="form-group">
                                                      	<label for="formGroupExampleInput2" class="formtext control-label">Customer Notes</label>
                                                         <textarea  class="form-control" id="tat_notes" name="tat_notes" placeholder="Please Add the Notes" maxlength="100" cols="3" rows="2" tabindex="7" tabindex="10" ></textarea>                  
                                                      </div>
                                                    </div>
                                                    <div class="col-md-12 col-lg-12 col-sm-6 col-xs-12">
                                                       <button type="submit" class="btn btn-success pull-right sho_btn" id="create" value="Register" name="save">Create</button>
                                                    </div>
                                                  </div>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </section>
                                
     <?php
				   }
				     if($_GET['action'] == 'view')
                     {
						$tat_cust_id = $_GET['nwsevnt_id'];
						$exampleRadios = $_GET['exampleRadios'];
						
						if(!empty($err))  {
							echo "<div class=\"alert alert_red alert_top fade in\">";
							echo '<button class="close" data-dismiss="alert">x</button>
							<h4 class="alert-heading">There is a problem.</h4>';
							foreach ($err as $e) {
							echo "* $e <br>";
							}
							echo "</div>";
						}
					?>
                 <?php } 
				   if($_GET['action'] == 'edit')
				   {
						$tat_cust_id = $_GET['nwsevnt_id'];
						$exampleRadios = $_GET['exampleRadios'];
						
						if(!empty($err))  {
							echo "<div class=\"alert alert_red alert_top fade in\">";
							echo '<button class="close" data-dismiss="alert">x</button>
							<h4 class="alert-heading">There is a problem.</h4>';
							foreach ($err as $e) {
							echo "* $e <br>";
							}
							echo "</div>";
						}
					?>
                        <section class="content">
                             <h1 class="add">
                            Update Customer
                          </h1>
                          <div class="row">
                            <!-- left column -->
                            <div class="col-md-8 col-xs-12 col-12 col-lg-8 col-md-offset-2">
                              <!-- general form elements -->
                              <div class="box box-primary">
                           
                                <form id="mainform" method="post" action="#">
                                	<?php
											
											$get_custdetails = mysql_query("select * from tatoo_customer where tat_cust_id = '$tat_cust_id'") or die(mysql_error());
												
												while($customer_details = mysql_fetch_array($get_custdetails)) {
												
													$tat_cust_id = $customer_details['tat_cust_id'];  
													$tat_cust_no = $customer_details['tat_cust_no'];
													$tat_name = $customer_details['tat_name'];
													$tat_email = $customer_details['tat_email'];
													$tat_mobile = $customer_details['tat_mobile'];
													$tat_address = $customer_details['tat_address'];  
													$tat_date = $customer_details['tat_date'];
													$tat_month = $customer_details['tat_month'];
													$tat_year = $customer_details['tat_year'];
													$tat_org = $customer_details['tat_org'];
													$tat_notes = $customer_details['tat_notes'];
													$tat_ages = $customer_details['tat_ages'];
													$tat_gender = $customer_details['tat_gender'];
													$tat_known = $customer_details['tat_known'];  
													$tat_createdon = $customer_details['tat_createdon'];
													$tat_updatedon = $customer_details['tat_updatedon'];
													$tat_status = $customer_details['tat_status'];
												}
										?>
                                           <input type="hidden" class="form-control tat_show" id="tat_notes" placeholder="Name" name="tat_notes" value="<?php echo $tat_notes; ?>">
                                  <div class="box-body">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                                        <br/>
                                            <div class="clearfix"></div>
                                            <br/>
                                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 tat_show">
                                              <div class="form-group">
                                               <label for="formGroupExampleInput2" class="formtext control-label">Customer Id</label>
                                                 <input type="text" class="form-control" id="tat_cust_no" name="tat_cust_no" value="<?php echo $tat_cust_no; ?>" readonly>
                                              </div>
                                            </div>
                                            
                                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 tat_show">
                                              <div class="form-group">
                                               <label for="formGroupExampleInput2" class="formtext control-label">Customer Mobile Number</label>
                                                 <input type="tel" class="form-control" id="tat_mobile" placeholder="Mobile number" name="tat_mobile" value="<?php echo $tat_mobile; ?>" maxlength="10" onKeyUp="checkphone();" pattern="^\d{10}$",>
                                                 <span id="mobile_status" style="color: red;"></span>
                                              </div>
                                            </div>
                                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 tat_show">
                                              <div class="form-group">
                                              <input type="hidden" class="form-control tat_show" id="tat_cust_id" placeholder="Name" name="tat_cust_id" value="<?php echo $tat_cust_id; ?>">
                                              <label for="formGroupExampleInput2" class="formtext control-label">Name</label>
                                                <input type="text" class="form-control" id="tat_name" placeholder="Name" name="tat_name" value="<?php echo $tat_name; ?>" maxlength="30">
                                              </div>
                                            </div>
                                            
                                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 tat_show">
                                              <div class="form-group">
                                               <label for="formGroupExampleInput2" class="formtext control-label">Customer Email Id</label>
                                                 <input type="text" class="form-control" id="tat_email" placeholder="Email ID" name="tat_email" value="<?php echo $tat_email; ?>" maxlength="30">
                                              </div>
                                            </div>
                                           <div class="clearfix"></div>
                                           
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 tat_hide"> 
                                                      	<label for="formGroupExampleInput2" class="formtext control-label">Date Of Birth</label>
                                                             <div class="form-inline">
                                                                 	<div class="form-group">
                                                            <select name="tat_date" id="tat_date" onChange="" class="form-control" size="1"  autofocus>
                                                            <option value="<?php echo $tat_date; ?>"><?php echo $tat_date; ?></option>
                                                            <option value="">Day</option>
                                                            
                                                            <?php
                                                                    for($i=31; $i>=01; $i--) {
                                                                        $birthdayYear = '';
                                                                        $selected = '';
                                                                        if ($birthdayYear == $i) $selected = ' selected="selected"';
                                                                        print('<option value="'.$i.'"'.$selected.'>'.$i.'</option>'."\n");
                                                                    }
                                                                ?>                          
                                                          </select>
                                                        </div>
                                                        			<div class="form-group">
                                                            <select name="tat_month" id="tat_month"  class="form-control" size="1">
                                                            <option value="<?php echo $tat_month; ?>"><?php echo $tat_month; ?></option>
                                                                <option value="">Month</option>
                                                                        <option value="01">Jan</option>
                                                                        <option value="02">Feb</option>
                                                                        <option value="03">Mar</option>
                                                                        <option value="04">Apr</option>
                                                                        <option value="05">May</option>
                                                                        <option value="06">June</option>
                                                                        <option value="07">July</option>
                                                                        <option value="08">Aug</option>
                                                                        <option value="09">Sep</option>
                                                                        <option value="10">Oct</option>
                                                                        <option value="11">Nov</option>
                                                                        <option value="12">Dec</option>
                                                            </select>            
                                                          </div>
                                                          			<div class="form-group">
                                                             <select name="tat_year" id="tat_year" class="form-control" onChange="check_i();">
                                                             
                                                             <option value="<?php echo $tat_year; ?>"><?php echo $tat_year; ?></option>
                                                                <option value="--" >Year</option>                       
                                                                <?php
                                                                    for($i=date('Y'); $i>=1970; $i--) {
                                                                        $birthdayYear = '';
                                                                        $selected = '';
                                                                        if ($birthdayYear == $i) $selected = ' selected="selected"';
                                                                        print('<option value="'.$i.'"'.$selected.'>'.$i.'</option>'."\n");
                                                                    }
                                                                ?>                          
                                                              </select>     
                                                          </div>                    
                                                            </div>
                                                            <br>
                                                    </div>
                                           
                                                       <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 tat_show">
                                                      <div class="form-group">
                                                      	<label for="formGroupExampleInput2" class="formtext control-label">Age</label>
                                                         <input type="text" class="form-control" id="tat_ages" name="tat_ages" placeholder="Age" value="<?php echo $tat_ages; ?>" maxlength="30" readonly>            
                                                      </div>
                                                    </div>
                                                      <div class="clearfix"></div>
                                                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 tat_hide">
                                                      <div class="form-group">
                                                      <label for="formGroupExampleInput2" class="formtext control-label">Gender</label>
                                                         <select class="form-control" name="tat_gender" id="tat_gender">
                                                             <option value="<?php echo $tat_gender; ?>"><?php echo $tat_gender; ?></option>
                                                             <option value="Male">Male</option>
                                                             <option value="Female">Female</option>
                                                             <option value="Transgender">Transgender</option>
                                                         </select>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 tat_hide">
                                                      <div class="form-group">
                                                      <label for="formGroupExampleInput2" class="formtext control-label">Referred  By</label>
                                                         <select class="form-control " id="tat_known"  name="tat_known" >
                                                         <option value="<?php echo $tat_known; ?>"><?php echo $tat_known; ?></option>
                                                          	<option value="">Select Who Referred</option>
                                                         	<option value="Direct">Direct</option>
                                                            <option value="Facebook">Facebook</option>
                                                            <option value="Friends">Friends</option>
                                                            <option value="Social Media">Social Media</option>
                                                            <option value="Whatsup">Whatsup</option>
                                                            <option value="Others">Others</option>
                                                            
                                                         </select>
                                                      </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 tat_show">
                                              <div class="form-group">
                                               <label for="formGroupExampleInput2" class="formtext control-label">Customer Address</label>
                                                <textarea class="form-control" id="tat_address" name="tat_address" placeholder="Address" maxlength="100"><?php echo $tat_address; ?></textarea>                  
                                              </div>
                                            </div>
                                            <hr class="sho_line">
                                            <div class="col-md-12 col-lg-12 col-sm-6 col-xs-12">
                                                <button type="submit" class="btn btn-success pull-right sho_btn editbtn" id="create" value="Register" name="update">Update</button>
                                            </div>
                                          </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </section>
                 <?php } ?>
    
    
  </div>

    <?php include 'footer.php';?>
</div>

	<script src="dist/js/datatable/datatable.js"></script>
    <script src="dist/js/datatable/dataTables.buttons.min.js"></script>
    <script src="dist/js/datatable/buttons.flash.min.js"></script>
    <script src="dist/js/datatable/jszip.min.js"></script>
    <script src="dist/js/datatable/pdfmake.min.js"></script>
    <script src="dist/js/datatable/vfs_fonts.js"></script>
    <script src="dist/js/datatable/buttons.html5.min.js"></script>
    <script src="dist/js/datatable/buttons.print.min.js"></script>
    <script src="dist/bootstrap/js/bootstrap-datepicker.min.js"></script>
    <script src="dist/js/customer.js"></script>
    <script src="dist/js/age.js"></script>
    <script type="text/javascript">
	
	//FUNCTION FOR SHOW DATA IN POPUP 
	
	function  openSTEPTWO(customer_data) { 
	 	var CUST_ID = customer_data;
		//alert(CUST_ID);
		$('#progress_sales_table').show();
		$('.sales-step2-data-body').load('getuser.php?tat_cust_id='+CUST_ID+'',function(){
			$('#progress_sales_table').hide();
			$('#dataSTEP2').modal({show:true});
		});
	}
	
		function  openSTEPTHREE(customer_data) { 
	 	var CUST_ID = customer_data;
		//alert(CUST_ID);
		$('#progress_sales_table').show();
		$('.sales-step2-data-body').load('customer.php?action=delete&nwsevnt_id='+data+'tat_cust_id='+CUST_ID+'',function(){
			$('#progress_sales_table').hide();
			$('#dataSTEP2').modal({show:true});
		});
	}

	  	
		$('#customer_datas').DataTable({
		ajax: {
		"url": "data/JSON_customertable.php",
		"type": "GET"
		},		
		
		columns: [
		{ data: "number" }, //0
		{ data: "name" }, //1
		{ data: "email" }, //2
		{ data: "mobile" }, //3
		{ data: "hold_num" }, //4
		{ data: "gender" }, //5
		{ data: "AGE" }, //6
		{ data: "address" }, //7
		{ data: "modify" } //8
		],
		columnDefs: [{
		"targets": 0,
		"data": "number",
		"render" : function ( data, type, full) {
		
			//ONCLICK FUNCTION IS USED TO CALL "openSTEPTWO" 
				
	     return '<a href="#" class="btn btn-xs btn-info" onClick ="openSTEPTWO('+data+');" >'+data+'</a>';
		 
			//return '';
		}
		},{
		"targets": 8,
		"data": "modify",
		"render" : function ( data, type, full) {                                          
			return '<a data-toggle="tooltip" data-original-title="Click to edit" href="customer.php?action=edit&nwsevnt_id='+data+'&tat_cust_id='+data+'" class="btn btn-xs btn-info" title="">Edit</a> &nbsp;  <a href="#" class="btn btn-xs btn-danger" onClick ="openSTEPTHREE('+data+');" >Delete</a>';
		}
		} ],
		dom: 'lBfrtip',
		buttons: [
		'excelHtml5',
		'csvHtml5',
		'pdfHtml5'
		]
	});
	
	</script>
    
   <script type="text/javascript">
//
//    
//		$('.openSTEPTWO').on('click',function(){
//			
//						$('#progress_sales_table').show();
//		
//		$('.sales-step2-data-body').load('getuser.php?tat_cust_id=2',function(){
//				
//						$('#progress_sales_table').hide();
//						
//						$('#dataSTEP2').modal({show:true});
//					
//						});
//		});
//    
//    </script>
    
    <script type="text/javascript"> 

 function check_i() {
		  var b_year=document.getElementById( "tat_year" ).value;
		  var b_month=document.getElementById( "tat_month" ).value;
		  var b_day=document.getElementById( "tat_date" ).value;
		   	var total_sgst_field = document.getElementById('tat_ages');
			
        var birthdate = new Date(b_year,b_month,b_day);
	//	alert(birthdate);
        var cur = new Date();
        var diff = cur-birthdate;
        var age = Math.floor(diff/31536000000);
		 total_sgst_field.value = (age);
        // alert(total_sgst_field);
		 //alert(age);
		   }

</script>

<script>
// FUNCTION FOR CHECKING MOBILE NUMBER ALLOWS ONLY NUMBERS BASED ON  KEYCODE..
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

//END 

//FUNCTION FOR CHECKING MOBILE NUMBER HAS BEEN PRESENTED IN DATABASE OR NOT

function checkphone() {

 var phone=document.getElementById( "tat_mobile" ).value;
 if(phone)
 {
  $.ajax({
  type: 'post',
  url: 'checkdata.php',
  data: {
   tat_mobile:phone,
  },
  success: function (response) {
   $( '#mobile_status' ).html(response);
   if(response=="Available")	
   {
    return true;
	
   }
   else
   {
   $('#mainform').bootstrapValidator();	
    return false;
	
   }
  }
  });
 }
 else
 {
  $( '#mobile_status' ).html("");
  $('#mainform').bootstrapValidator();	
  return false;
 }
}

//END

</script>
<script>
//FUNCTION FOR FETCHING DATAS AND SHOWN IN POPUP
$(document).ready(function(){
	
	$(document).on('click', '#getUser', function(e){
		
		e.preventDefault();
		
		var tat_mobile_num = $(this).data('id');   // it will get id of clicked row
		
		$('#dynamic-content').html(''); // leave it blank before ajax call
		$('#modal-loader').show();      // load ajax loader
		
		$.ajax({
			url: 'getuser.php',
			type: 'POST',
			data: 'tat_cust_id='+tat_mobile_num,
			dataType: 'html'
		})
		.done(function(data){
			console.log(data);	
			$('#dynamic-content').html('');    
			$('#dynamic-content').html(data); // load response 
			$('#modal-loader').hide();		  // hide ajax loader	
		})
	
		.fail(function(){
			$('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
			$('#modal-loader').hide();
		});
		
	});
});
//END
</script>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel'
        ]
    } );
} );
</script>

</body>
</html>
