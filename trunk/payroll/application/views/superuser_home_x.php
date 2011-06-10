<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!--

 REDBANA PHILS PAYROLL 
 For Practicum Purposes | CMSC 198 | summer 2011
 Generated by: Llave, Abraham Darius S. | 2008-37120
 
 FilePurpose: VIEW-CHANGE-WITHOLDINGTAXWITHINPUTBOX
 version: 1.0.0 - initial work
 		  1.1.0 - changed over-all HTML and structure. more dynamic now.
		  2.0.0 - abe - final design
-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home - SuperUser - Redbana Phils. Payroll</title>
<?php $this->load->view('include/css.inc'); ?>
<?php $this->load->view('include/jquery-abe.inc'); ?>
<?php $this->load->view('include/jquery-abe-on_run.inc'); ?>
</head>

<body>
<div id="main_container">
	<div id="header">
    	<div id="logo">
    	<a href="home.html"><img src="<?php echo base_url(); ?>assets/images/redbana_logo2.png" alt="" title="" style="border:0" /></a>    	
    	</div>
    	<div id="logo">
    	<a href="home.html"><img src="<?php echo base_url(); ?>assets/images/payroll_logo.jpg" alt="" title="" style="border:0" /></a>    	
    	</div>
        
         <div id="menu">
            <ul>                                        
                <li><a class="current" href="home.html" title="">Home</a></li>
				<li><a href="#" title="">My Account</a></li>
                <li><a href="#" title="">Edit Other Accounts</a></li>
                <li><a href="contact.html" title="">menu4</a></li>
            </ul>
        </div>
		<div id="graynavbar" >
			
			<ul>
				<li><?php echo $userData['empNum']; ?></li>
				<li><?php echo $userData['fname']." ".$userData['mname']."&nbsp;".$userData['sname']; ?></li>
				<li class="last">
					<a href='login/logout' class='underline'>Log out</a>
				</li>
			</ul>			
		</div>
        
    </div>
    
    <?php
		function can_Access($type,$query)
		{
			$result=false;
			foreach ($query->result() as $row)
			{
				if (($row->privilege ==$type) &&($row->type==1) )
				{
					$result=true;
					break;
				}
			}
			return $result;
		}
	?>
	
    
    <div id="main_content">    	
    	<div id="centralContainer">
            <div id="demo">
				<div id="accordion">
					<h3><a class="title" href="#">Employees' Corner</a></h3>
					<div class="content" >					
												
						<?php
							echo "<ul>";
							if (can_Access("addemp",$sql))
								echo "<li><a href='employee/insert' class='underline'>Add and Edit Employee Information</a></li>";
							if (can_Access("viewemp",$sql))
								echo "<li><a href='employee/getall' class='underline'>View All Employee</a></li>";
							echo "</ul>";
						?>
					</div>
					<h3><a class="title" href="#">Classification Maintenances</a></h3>
					<div class="content" >
						<ul>
							<?php
								if (can_Access("position",$sql))
									echo "<li><a href='maintenance/posview' class='underline'>Position</a></li>";
								if (can_Access("taxstatus",$sql))
									echo "<li><a href='maintenance/taxview' class='underline'>Tax Status Maintenance</a></li>";
								if (can_Access("user",$sql))
									echo "<li><a href='maintenance/userview' class='underline'>User Right Maintenance</a></li>";
								if (can_Access("day",$sql))
									echo "<li><a href='maintenance/dayview' class='underline'>Type Of Day Maintenance</a></li>";
								if (can_Access("shift",$sql))
									echo "<li><a href='' class='underline'>Shift Maintenance</a></li>";
								if (can_Access("dept",$sql))
									echo "<li><a href='maintenance/deptview' class='underline'>Department Maintenance</a></li>";
								if (can_Access("type",$sql))
									echo "<li><a href='maintenance/typeview' class='underline'>Employment Type Maintenance</a></li>";
							?>							
						</ul>
					</div>
					<h3><a class="title" href="#">Leave</a></h3>
					<div class="content" >			
						<ul>
						<?php
							if (can_Access("allleave",$sql))
								echo "<li><a href='leave/viewbydept' class='underline'>View All Leave and Approve</a></li>";
								echo "<li><a href='leave/editmax' class='underline'>Edit Employee's Maximum Number of Leaves</a></li>";
							if (can_Access("leave",$sql))
							{
								echo "<li><a href='leave/insert' class='underline'>File a leave</a></li>";
								echo "<li><a href='leave/empview' class='underline'>View all your filed leave</a></li>";
								
							}
						?>
						</ul>
					</div>
					<h3><a class="title" href="#">Timekeeping</a></h3>
					<div class="content" >			
						<ul>
						<?php
							if (can_Access("timesheet",$sql))		
								echo "<li><a href='timesheet/viewtimesheet' class='underline'>View TimeSheet</a></li>";
						?>
						</ul>
					</div>
					<h3><a class="title" href="#">Payroll Generation</a></h3>
					<div class="content" >
						<ul>							
							<?php
								if (can_Access("timesheet",$sql))		
									echo "<li><a href='AttendanceController' class='underline'>View Tardiness/Absences/etc and corresponding charges</a></li>";
								if (can_Access("viewpay",$sql))
									echo "<li><a href='payroll/payrollinfoview' class='underline'>View Payroll</a></li>";
								if (can_Access("viewslip",$sql))
			echo "<li><a href='payroll/individualpayslip' class='underline'>View Your Pay Slip</a></li>";
							?>
							<li><a href="http://localhost/payroll/index.php/PayPeriodController/addPayPeriod" >Add Payperiod</a></li>							
						</ul>
					</div>
					<h3><a class="title" href="#">History</a></h3>
					<div class="content" >
						<ul>	
							<?php
							if (can_Access("history",$sql))
								echo "<li><a href='history/getall' class='underline'>View History</a></li>";
							?>							
						</ul>
					</div>
				</div>
				</div><!-- div#demo -->
        </div><!--end of centralContainer-->
    <div style=" clear:both;"></div>
    </div><!--end of main content-->
 

     <div id="footer">
     	<div class="copyright">
			2011 UPLB Students
        </div>
    	<div class="footer_links"> 
        <a href="#">About us</a>
         <a href="privacy.html">Privacy policy</a> 
        <a href="contact.html">Contact us </a>        
        </div>        
    </div>     
<!--end of main container-->
</body>
</html>
