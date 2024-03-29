<!--
/*File Name: EditPayslip_view.php
  Program Description: Compute Payroll for current Payperiod
*/
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<title>Edit Pay Slip</title>
	<script type="text/javascript" src="<?php echo base_url();?>devtools/jquery-1.5.2"></script>
	<script>
		$(document).ready(function(){
			$('#DailyRate').blur(function(){
				$.post("<?php echo base_url();?>devtools/validate.php", {
				query: $('#DailyRate').val(),
				vtype: "numeric",
			},
			function(data){
					$("#daily_rate").text(data);
			});
			});
			$('#HolidayAdjustment').blur(function(){
				$.post("<?php echo base_url();?>devtools/validate.php", {
				query: $('#HolidayAdjustment').val(),
				vtype: "salary",
			},
			function(data){
					$("#holiday_adj").text(data);
			});
			});
			$('#TaxRefund').blur(function(){
				$.post("<?php echo base_url();?>devtools/validate.php", {
				query: $('#TaxRefund').val(),
				vtype: "salary",
			},
			function(data){
					$("#tax_ref").text(data);
			});
			});
			$('#NonTax').blur(function(){
				$.post("<?php echo base_url();?>devtools/validate.php", {
				query: $('#NonTax').val(),
				vtype: "salary",
			},
			function(data){
					$("#non_tax").text(data);
			});
			});
			$('#TaxShield').blur(function(){
				$.post("<?php echo base_url();?>devtools/validate.php", {
				query: $('#TaxShield').val(),
				vtype: "salary",
			},
			function(data){
					$("#tax_shield").text(data);
			});
			});
			$('#PagibigLoan').blur(function(){
				$.post("<?php echo base_url();?>devtools/validate.php", {
				query: $('#PagibigLoan').val(),
				vtype: "salary",
			},
			function(data){
					$("#pagibig_loan").text(data);
			});
			});
			$('#SSSLoan').blur(function(){
				$.post("<?php echo base_url();?>devtools/validate.php", {
				query: $('#SSSLoan').val(),
				vtype: "salary",
			},
			function(data){
					$("#sss_loan").text(data);
			});
			});
			$('#CompanyLoan').blur(function(){
				$.post("<?php echo base_url();?>devtools/validate.php", {
				query: $('#CompanyLoan').val(),
				vtype: "salary",
			},
			function(data){
					$("#comp_loan").text(data);
			});
			});
			$('#CellphoneCharges').blur(function(){
				$.post("<?php echo base_url();?>devtools/validate.php", {
				query: $('#CellphoneCharges').val(),
				vtype: "salary",
			},
			function(data){
					$("#cellphone").text(data);
			});
			});
			$('#AdvancestoEmployee').blur(function(){
				$.post("<?php echo base_url();?>devtools/validate.php", {
				query: $('#AdvancestoEmployee').val(),
				vtype: "salary",
			},
			function(data){
					$("#advances").text(data);
			});
			});
			$('#Status').blur(function(){
				$.post("<?php echo base_url();?>devtools/validate.php", {
				query: $('#Status').val(),
				vtype: "open",
			},
			function(data){
					$("#stat").text(data);
			});
			});
		});
	</script>
	<style>
		th{text-align: left;}
		.numeric{text-align: right; width: 60px}
		td{text-align: right;}
	</style>
	<?php
		include 'links.php';
		include 'styles.php';
	?>
</head>

<body>
<h3>Initial Pay Slip for <?php echo $start_date." to ".$end_date;?></h3>
<form method="post" accept-charset="utf-8" action="<?php echo site_url(); ?>/payroll/editpayslip">
<div style='color:red'>
	<?php if(!isset($_POST['edit'])) echo validation_errors();?>
</div>
<table>
	<tr>
		<th>Employee Number:</th>
		<td style='text-align:left'>
		<?php echo $EmployeeNumber;?>
		<input type='hidden' id='EmployeeNumber' name='EmployeeNumber' value='<?php echo $EmployeeNumber?>'/>
		</td>
	</tr>
	<tr>
		<th>Employee Name:</th>
		<td style='text-align:left'>
		<?php echo $EmployeeName;?>
		<input type='hidden' id='EmployeeName' name='EmployeeName' value='<?php echo $EmployeeName?>'/>
		</td>
	</tr>
	<tr>
		<th>Daily Rate:</th>
		<td>
		<input type='text' class='numeric' id='DailyRate' name='DailyRate' value='<?php echo $DailyRate;?>'/>
		</td><td style='text-align:left'><span class='warning' name='daily_rate' id='daily_rate'></span>
		</td>
	</tr>
	<tr>
		<th>Pay Period Rate:</th>
		<td>
		<?php echo $PayPeriodRate;?>
		<input type='hidden' id='PayPeriodRate' name='PayPeriodRate' value='<?php echo $PayPeriodRate?>'/>
		</td>
	</tr>
	<tr>
		<th>Absences/Tardiness:</th>
		<td>
		<?php echo $AbsencesTardiness;?>
		<input type='hidden' id='AbsencesTardiness' name='AbsencesTardiness' value='<?php echo $AbsencesTardiness?>'/>
		</td>
	</tr>
	<tr>
		<th>Overtime Pay:</th>
		<td>
		<input type='hidden' id='Overtime' name='Overtime' value='<?php echo $Overtime?>'/>
		<?php echo $Overtime;?>
		</td>
	</tr>
	<tr>
		<th>Holiday Pay:</th>
		<td>
		<input type='hidden' id='Holiday' name='Holiday' value='<?php echo $Holiday?>'/>
		<?php echo $Holiday;?>
		</td>
	</tr>
	<tr>
		<th>Holiday Adjustment:</th>
		<td><input type='text' class='numeric' id='HolidayAdjustment' name='HolidayAdjustment' value='<?php echo $HolidayAdjustment;?>'/>
		</td><td style='text-align:left'><span class='warning' name='holiday_adj' id='holiday_adj'></span>
		</td>
	<tr>
		<th>Salary Adjustment (Tax Refund):</th>
		<td><input type='text' class='numeric' id='TaxRefund' name='TaxRefund' value='<?php echo $TaxRefund;?>'/>
		</td><td style='text-align:left'><span class='warning' name='tax_ref' id='tax_ref'></span>
		</td>
	</tr>
	<tr>
		<th>Night Differential:</th>
		<td>
		<input type='hidden' id='NightDifferential' name='NightDifferential' value='<?php echo $NightDifferential?>'/>
		<?php echo $NightDifferential;?>
		</td>
	</tr>
	<tr>
		<th>Gross Pay:</th>
		<td>
		<input type='hidden' id='GrossPay' name='GrossPay' value='<?php echo $GrossPay?>'/>
		<?php echo $GrossPay;?>
		</td>
	</tr>
	<tr>
		<th>Non-Tax:</th>
		<td><input type='text' class='numeric' id='NonTax' name='NonTax' value='<?php echo $NonTax;?>'>
		</td><td style='text-align:left'><span class='warning' name='non_tax' id='non_tax'></span>
		</td>
	</tr>
	<tr>
		<th>Tax Shield:</th>
		<td><input type='text' class='numeric' id='TaxShield' name='TaxShield' value='<?php echo $TaxShield;?>'>
		</td><td style='text-align:left'><span class='warning' name='tax_shield' id='tax_shield'></span>
		</td>
	</tr>
	<tr>
		<th>Total Pay:</th>
		<td>
		<input type='hidden' id='TotalPay' name='TotalPay' value='<?php echo $TotalPay?>'/>
		<?php echo $TotalPay;?>
		</td>
	</tr>
	<tr>
		<th>Withholding Tax Basis:</th>
		<td>
		<input type='hidden' id='WithholdingBasis' name='WithholdingBasis' value='<?php echo $WithholdingBasis?>'/>
		<?php echo $WithholdingBasis;?>
		</td>
	</tr>
	<tr>
		<th>Withholding Tax:</th>
		<td>
		<input type='hidden' id='WithholdingTax' name='WithholdingTax' value='<?php echo $WithholdingTax?>'/>
		<?php echo $WithholdingTax;?>
		</td>
	</tr>
	<tr>
		<th>SSS:</th>
		<td>
		<input type='hidden' id='SSS' name='SSS' value='<?php echo $SSS?>'/>
		<?php echo $SSS;?>
		</td>
	</tr>
	<tr>
		<th>Philhealth:</th>
		<td>
		<input type='hidden' id='Philhealth' name='Philhealth' value='<?php echo $Philhealth?>'/>
		<?php echo $Philhealth;?>
		</td>
	</tr>
	<tr>
		<th>Pag-Ibig:</th>
		<td>
		<input type='hidden' id='Pagibig' name='Pagibig' value='<?php echo $Pagibig?>'/>
		<?php echo $Pagibig;?>
		</td>
	</tr>
	<tr>
		<th>Pag-Ibig Loan:</th>
		<td><input type='text' class='numeric' id='PagibigLoan' name='PagibigLoan' value='<?php echo $PagibigLoan;?>'>
		</td><td style='text-align:left'><span class='warning' name='pagibig_loan' id='pagibig_loan'></span>
		</td>
	</tr>
	<tr>
		<th>SSS Loan:</th>
		<td><input type='text' class='numeric' id='SSSLoan' name='SSSLoan' value='<?php echo $SSSLoan;?>'>
		</td><td style='text-align:left'><span class='warning' name='sss_loan' id='sss_loan'></span>
		</td>
	</tr>
	<tr>
		<th>Company Loan:</th>
		<td><input type='text' class='numeric' id='CompanyLoan' name='CompanyLoan' value='<?php echo $CompanyLoan;?>'>
		</td><td style='text-align:left'><span class='warning' name='comp_loan' id='comp_loan'></span>
		</td>
	</tr>
	<tr>
		<th>Cellphone Charges:</th>
		<td><input type='text' class='numeric' id='CellphoneCharges' name='CellphoneCharges' value='<?php echo $CellphoneCharges;?>'>
		</td><td style='text-align:left'><span class='warning' name='cellphone' id='cellphone'></span>
		</td>
	</tr>
	<tr>
		<th>Advances to Employee:</th>
		<td><input type='text' class='numeric' id='AdvancestoEmployee' name='AdvancestoEmployee' value='<?php echo $AdvancestoEmployee;?>'>
		</td><td style='text-align:left'><span class='warning' name='advances' id='advances'></span>
		</td>
	</tr>
	<tr>
		<th>Net Pay:</th>
		<td>
		<input type='hidden' id='NetPay' name='NetPay' value='<?php echo $NetPay?>'/>
		<?php echo $NetPay;?>
		</td>
	</tr>
	<tr>
		<th>Status:</th>
		<td><input type='text' id='Status' name='Status' value='<?php echo $Status;?>'>
		</td><td style='text-align:left'><span class='warning' name='stat' id='stat'></span>
		</td>
	</tr>
</table>

<input type='hidden' id='start_date' name='start_date' value='<?php echo $start_date?>'/>
<input type='hidden' id='end_date' name='end_date' value='<?php echo $end_date?>'/>
<input type='submit' id='editpayslip' name='editpayslip' value='Compute Pay Slip'/>
<input type='reset' id='reset' name='reset' value='Reset'/>
</form>

</body>
</html>