<?php include('incs/header.php'); ?>
<?php include('incs/nav.php'); ?>
<?php include('incs/side.php'); ?>

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url("admin/index"); ?>"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item active">Loan</li>
                            <li class="breadcrumb-item active">Interest Payment Report</li>
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
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                         <div class="header">
                            
                            <h2>
                            Interest Payment Report /
    <?php echo ($blanch_id == 'all') ? 'All BRANCHES' : $blanch_data->blanch_name; ?> /
    From: <?php echo $from; ?> - To: <?php echo $to; ?>
</h2>


                            
                            <div class="pull-right">
                                <a href="" data-toggle="modal" data-target="#addcontact2" class="btn btn-primary"><i class="icon-calendar">Filter</i></a>
                                <?php if (count($data) > 0) {
                                 ?>
                                 <a href="<?php echo base_url("admin/print_loan_withdrawalFilter/{$from}/{$to}/{$blanch_id}") ?>" class="btn btn-primary" target="_blank"><i class="icon-printer">Print</i></a>
                             <?php }else{ ?>
                                <?php } ?>
                            </div>    
                         </div>
                          <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example dataTable table-custom">
                                <thead class="thead-primary">
                                        <tr>
                                        <th>S/no.</th>
                                        <th>Customer Name</th>
                                        <th>Branch Name</th>
                                        <th>Loan Amount</th>
                                        <th>Total Interest</th>
                                        <th>Principal + Interest</th>
                                        <th>Amount Paid</th>
                                        <th>Principal Paid</th>
                                        <th>Interest Paid</th>
                                        
                                        </tr>
                                    </thead>
                                   
       
                                    <tbody>

                                    <?php
$total_loan_aprove = 0;
$total_loan_int = 0;
$total_interest = 0;
$total_principal = 0;
$total_depost = 0;
?>

    <?php $no = 1 ?>    
    <?php if ($blanch_id == 'all'): ?>    
        <?php foreach ($datas as $loan_aproveds): ?>
            

                <?php
$total_loan_aprove += $loan_aproveds->loan_aprove;
$total_loan_int += $loan_aproveds->loan_int;
$total_interest +=$loan_aproveds->interest_paid;
$total_principal += $loan_aproveds->principal_paid;
$total_depost += $loan_aproveds->depost;
?>

                <tr>
                    <td><?php echo $no ++ ; ?></td>
                    <td><?php echo $loan_aproveds->blanch_name; ?></td>
                    <td><?php echo $loan_aproveds->f_name . ' ' . $loan_aproveds->m_name . ' ' . $loan_aproveds->l_name; ?></td>
                     <td><?php echo number_format($loan_aproveds->loan_aprove); ?></td>
                     <td><?php echo number_format($loan_aproveds->total_interest); ?></td>
                    <td><?php echo number_format($loan_aproveds->loan_int); ?></td>
                    <td><?php echo number_format($loan_aproveds->depost); ?></td>
                    <td><?php echo $loan_aproveds->principal_paid; ?></td>
                    <td><?php echo $loan_aproveds->interest_paid; ?></td>
                   
                </tr>
                
           
        <?php endforeach; ?>
    <?php else: ?>
        <?php foreach ($data as $loan_aproveds): ?>
            <?php
$total_loan_aprove += $loan_aproveds->loan_aprove;
$total_loan_int += $loan_aproveds->loan_int;
$total_interest +=$loan_aproveds->interest_paid;
$total_principal += $loan_aproveds->principal_paid;
$total_depost += $loan_aproveds->depost;
?>

            <tr>
                   <td><?php echo $no ++ ; ?></td>
                    <td><?php echo $loan_aproveds->blanch_name; ?></td>
                    <td><?php echo $loan_aproveds->f_name . ' ' . $loan_aproveds->m_name . ' ' . $loan_aproveds->l_name; ?></td>
                     <td><?php echo number_format($loan_aproveds->loan_aprove); ?></td>
                     <td><?php echo number_format($loan_aproveds->total_interest); ?></td>
                    <td><?php echo number_format($loan_aproveds->loan_int); ?></td>
                    <td><?php echo $loan_aproveds->depost; ?></td>
                    <td><?php echo $loan_aproveds->principal_paid; ?></td>
                    <td><?php echo $loan_aproveds->interest_paid; ?></td>
                
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</tbody>


                                      
                                 </tr>
      


                           
                              
                                    </tbody>
                                      <tr>
                                    <td><b>TOTAL:</b></td>
                                    <td></td>
                                    <td></td>
                                    <td><b><?php echo number_format($total_loan_aprove); ?></b></td>
                                    <td><b></b></td>
                                    <td><b><?php echo number_format($total_loan_int); ?></b></td>
                                    <td><b><?= number_format($total_depost) ?></b></td>
                                    <td><b><?= number_format($total_principal) ?></b></td>
                                    <td><b><?= number_format($total_interest) ?></b></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </table>
                            </div>
                        </div>

                    </div>
                </div> 


             
            </div>
        </div>
    </div>
</div>

<?php include('incs/footer.php'); ?>


<div class="modal fade" id="addcontact2" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Filter Loan Withdrawal</h6>
            </div>
            <?php echo form_open("admin/filter_interest_paid"); ?>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-md-12 col-12">
                        <span>Select Branch</span>
                       <select type="number" class="form-control" name="blanch_id">
                           <option value="">Select Branch</option>
                           <?php foreach ($blanch as $blanchs): ?>
                           <option value="<?php echo $blanchs->blanch_id; ?>"><?php echo $blanchs->blanch_name; ?></option>
                           <?php endforeach; ?>
                           <option value="all">All</option>
                       </select>
                    </div>
                    <div class="col-md-6 col-6">
                        <?php $date = date("Y-m-d"); ?>
                        <span>From:</span>
                       <input type="date" name="from" value="<?php echo $date; ?>" class="form-control">
                    </div>
                      <div class="col-md-6 col-6">
                        <span>To:</span>
                       <input type="date" name="to" value="<?php echo $date; ?>" class="form-control">
                    </div>
                    <input type="hidden" name="loan_status" value="withdrawal">
                   
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Filter</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>



