<?php include('incs/header.php'); ?>
<?php include('incs/nav.php'); ?>
<?php include('incs/side.php'); ?>

    <div id="main-content" class="profilepage_2 blog-page">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url("admin/index"); ?>"><i class="icon-home"></i></a></li>
                            
                            <li class="breadcrumb-item active">Report</li>
                            <li class="breadcrumb-item active">Customer Account Statement</li>
                        </ul>
                    </div>            
                 
                </div>
            </div>

            <?php if ($das = $this->session->flashdata('massage')): ?> 
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="alert alert-dismisible alert-success"> <a href="" class="close">&times;</a> 
                                    <?php echo $das;?> </div> 
                            </div> 
                        </div> 
                    <?php endif; ?>
                     <?php if ($das = $this->session->flashdata('error')): ?> 
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="alert alert-dismisible alert-danger"> <a href="" class="close">&times;</a> 
                                    <?php echo $das;?> </div> 
                            </div> 
                        </div> 
                    <?php endif; ?>

            <div class="row clearfix">
            
                <style>
                    .sam{
                        display: flex;
                    }
                </style>  
                <div class="col-lg-12">
                    <div class="card">
                          <div class="body">
                     
                            
                            <div class="table-responsive">
                                <table class="table table-hover j-basic-example dataTable table-custom">
                                    <thead class="thead-primary">
                                        <tr>
                                        <th>Customer Name</th>
                                        <th>Phone Number</th>
                                        <th>Loan Amount</th>
                                        <th>Paid Amount</th>
                                        <th>Remain Amount</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                
                                      <?php $customer_loan = $this->queries->get_loan_account_statement($loan_id);
                                         @$total_deposit = $this->queries->get_total_amount_paid_loan($loan_id);

                                        // @$out_stand = $this->queries->get_outstand_loan_customer($customer_loan->loan_id);
                                         // print_r($total_deposit);
                                         //           exit();
                                       ?>



                                   <?php //print_r($out_stand); ?>
                                        <tr>
                                            <td><?php echo @$customer->f_name; ?> <?php echo @$customer->m_name; ?> <?php echo @$customer->l_name; ?></td>
                                            <td><?php echo @$customer->phone_no; ?></td> 
                                                
                                            <td><?php echo number_format($customer_loan->loan_int); ?></td>
                                            <td><?php echo number_format($total_deposit->total_Deposit) ?></td>
                                            <td><?php echo number_format(($customer_loan->loan_int) - ($total_deposit->total_Deposit) ) ?></td>
                                        
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>





                  <div class="col-lg-12">
                    <?php echo form_open("oficer/customer_report"); ?>
                     <div class="sam">
                            <select type="number" class="form-control select2" required name="customer_id" id="customer" >
                                    <option>Search Customer</option>
                                    <?php foreach ($customery as $customer_datas): ?>
                                    <option value="<?php echo $customer_datas->customer_id; ?>"><?php echo $customer_datas->f_name; ?> <?php echo $customer_datas->m_name; ?> <?php echo $customer_datas->l_name; ?> / <?php echo $customer_datas->customer_code; ?> </option>
                                    <?php endforeach; ?>
                                </select>
                                <select type="number" class="form-control select2" required name="loan_id" id="loan">
                                    <option>Select Loan</option>
                                </select>
                                <button type="submit" class="btn btn-primary"><i class="icon-magnifier-add">Search</i></button>
                                </div>
                            <?php echo form_close(); ?>
                            
                    <div class="card">
                          <div class="body">
                             <div class="pull-right">
                             <a href="<?php echo base_url("oficer/print_account_statement/{$customer_id}/{$loan_id}"); ?>" target="_blank" class="btn btn-primary" target="_blank"><i class="icon-printer"></i></a> 
                             </div>
                            <div class="table-responsive">
                                <table class="table table-hover j-basic-example dataTable table-custom">
                                <thead class="thead-primary">
                                        <tr>
                                        <th>Tarehe</th>
                                        <th>Afisa</th>
                                        <th>Mkopo</th>
                                        <th>Mkopo & Riba</th>
                                        <th>Malipo</th>
                                        <th>Deni</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
    <?php 
    @$loan_desc = $this->queries->get_total_pay_description_acount_statement($loan_id);
//    echo "<pre>";
//       print_r( @$loan_desc);
//             exit();
    // Remove the last 3 records
    $filtered_loan_desc = array_slice($loan_desc, 0, count($loan_desc) - 3);

    // Initialize remaining debt with the total loan interest
    
    ?>

    <?php foreach ($filtered_loan_desc as $payisnulls): ?>
        <tr>
            <td class="c"><?php echo $payisnulls->date_data; ?></td>
            <td class="c"><?php echo $payisnulls->emply; ?></td>
            <td><?php echo number_format(@$payisnulls->loan_aprove); ?></td>
            <td><?php echo number_format(@$payisnulls->loan_int); ?></td>
            <td>
                <?php
                if ($payisnulls->depost != 0) {
                    echo number_format(@$payisnulls->depost);
                }
                ?>
            </td>
           
            <td>
                <?php
              echo number_format(@$payisnulls->rem_debt)
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

                

                </div> 
              </div>
            </div>
   



<?php include('incs/footer.php'); ?>

 <script>
$(document).ready(function(){

$('#customer').change(function(){
var customer_id = $('#customer').val();
 //alert(customer_id)
if(customer_id != '')
{
$.ajax({
url:"<?php echo base_url(); ?>oficer/fetch_data_loanActive",
method:"POST",
data:{customer_id:customer_id},
success:function(data)
{
$('#loan').html(data);
//$('#malipo_name').html('<option value="">select center</option>');
}
});
}
else
{
$('#loan').html('<option value="">Select Active loan</option>');
//$('#malipo_name').html('<option value="">chagua vipimio</option>');
}
});



$('#blanch').change(function(){
 var blanch_id = $('#blanch').val();
 //alert (blanch_id)
 if(blanch_id != '')
 {
  $.ajax({
   url:"<?php echo base_url(); ?>admin/fetch_blanch_account",
   method:"POST",
   data:{blanch_id:blanch_id},
   success:function(data)
   {
    $('#account').html(data);
    //$('#malipo').html('<option value="">chagua malipo</option>');
   }
  });
 }
 else
 {
  //$('#vipimio').html('<option value="">chagua vipimio</option>');
  $('#account').html('<option value="">Select Account</option>');
 }
});


});
</script>



 


 







