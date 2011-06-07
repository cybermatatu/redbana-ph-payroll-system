<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
REDBANA PHILS PAYROLL 
For Practicum Purposes | CMSC 198 | summer 2011
Generated by: Llave, Abraham Darius S. | 2008-37120
 
FilePurpose: VIEW-GENERATE_NEW_PAYPERIOD
version: 1.0.0 - initial work
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<title> Add New PayPeriod - Redbana Phils. Payroll </title>
<style type="text/css">
</style><link href="<?php echo base_url(); ?>assets/css/mainstyling.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo base_url(); ?>devtools/jquery-1.5.2"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>devtools/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>devtools/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>devtools/ui/jquery.ui.accordion.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>devtools/ui/jquery.ui.datepicker.js"></script>
<script type="text/javascript" >
	$(function() {
		/*abe, 31jan2011/1044pm: won't it be good, that we if the date picker
		  is trigerred in filling out the form, the year less 17 appears? 
		  (because residents of ACCI dorm are most often born 17 years before the present year)
		*/
	
		$( "#datepicker").datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'yy/mm/dd',
			yearRange: '1950:2099'
		});
		$( "#datepicker2"  ).datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'yy/mm/dd',
			yearRange: '1950:2099'
		});

	});
</script>
</head>

<body>
<div id="header" class="center">
	<img src="<?php echo base_url(); ?>assets/images/payroll.png" alt="header" />
</div>
<div id="header2" class="center">
	<ul class="nav">
		<li class="nav"><a id="nav" href="<?php echo base_url(); ?>"> Home </a></li>
	</ul>
<?php 
	echo "<a class='active' href='login/logout' id='cname' alignment='left' > Sign out </a>";				
?>	
</div>
<div id="container" class="center">
</div>

<div id="article_SpecificDetail" class="center" style="width:80%"> Add New PayPeriod
</div>
		
<div>
	<?php 		     	
		if( strlen(validation_errors()) > 0 )
		{
		echo '<div id="form_error_notice" style="width: 80%" class="center"><br />';
		echo validation_errors();
		echo '</div>';
		}		    		
		if( isset($relayThisError) )
		{
		echo '<div id="form_error_notice" style="width: 80%" class="center"><br />';
		echo "{$relayThisError["ERROR_CODE"]}: {$relayThisError["ERROR_MESSAGE"]}";
		echo '</div>';
		}		
	?>
</div>
<div class="center" style="width:80%">
<div  style="width:30%; float:left">
	<?php
		if($payment_mode_specified)
		{
	?>
	<span>
		The latest PayPeriod Info: <br /><br />
		<?php if($lastPayPeriod != NULL) { ?>
		Start Date: <?php echo $lastPayPeriod-> START_DATE; ?> <br />
		End Date: <?php echo $lastPayPeriod-> END_DATE; ?>
		<?php 
		}else
		{
			echo "There is currently no Pay Period in the registry.";
		}
		?>
	</span>
	<?php
		}//if($payment_mode_specified)
	?>

	<br /><br />
	<?php echo form_open('PayperiodController/addPayPeriod_Process'); ?>		
		<table>
		 <tr>
		  	<td> Start Date: </td>
		  	<td><input type="text" name="START_DATE" id="datepicker" value="<?php echo set_value('START_DATE'); ?>" /></td>
		 </tr>
		 <tr>
		  	<td> End Date </td>
		  	<td><input type="text" name="END_DATE" id="datepicker2" value="<?php echo set_value('END_DATE'); ?>" /></td>
		 </tr>
		 <tr>
		 	<td> Working Days </td>
		 	<td><input type="text" name="WORKING_DAYS" value="<?php 
		 		if(set_value('WORKING_DAYS') == "")
		 		{
		 			if(isset($payment_mode))
		 			{
		 			 if($payment_mode != 2)
		 			 	echo 11;
		 			 else
		 			 	echo 22;
		 			}else{
		 				echo 11;
		 			}
		 		}else{
		 			 echo set_value('WORKING_DAYS'); 
		 		}
		 	?>" />
			</td>
		 </tr>
		 <?php
		 	if($payment_modes != NULL)
		 	{
		 ?>
			 <tr>
			 	<td> Payment Mode </td>
			 	<td> 
		 	    <?php
		 	  	 if( ! $payment_mode_specified)
		 	  	 {
		 	    ?>
			 	<select name="PAYMENT_MODE">
			 			<?php
			 				foreach($payment_modes as $individ)
			 				{
			 			?>
			 				<option value="<?php echo $individ->ID; ?>" ><?php echo $individ->TITLE; ?></option>
			 			<?php
			 				}
			 			?>			 			
		 		</select>
		 		<?php
		 			}else{
		 		?>		 			
		 			<select name="PAYMENT_MODE" visible="false">
							<option value="<?php echo $payment_mode; ?>" selected="selected" ><?php echo $payment_modes[$payment_mode]-> TITLE; ?></option>
					</select>
		 		<?php
		 			}
		 		?>
			 	</td>
			 </tr>
			 <tr>
				<td>END OF THE MONTH</td>
				<td>
				<select name="END_OF_THE_MONTH" id="END_OF_THE_MONTH">
					<option value="0">NO</option>
					<option value="1">YES</option>
				</select>
				</td>
			 </tr>
		 <?php
		  	}
		 ?>
		</table>
		<input type="submit" value="Insert New Payperiod" />
<?php echo form_close(); ?>
</div>
</div>
<div id="copyright">
<p> Copyright 2011 | Bautista and Associates Information Systems </p>
</div>
</body>
</html>