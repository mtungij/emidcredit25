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
                            <li class="breadcrumb-item active">Loan Withdrawal</li>
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
    Loan Withdrawal /
    <?php echo ($blanch_id == 'all') ? 'All BRANCHES' : $blanch_data->blanch_name; ?> /
    From: <?php echo $from; ?> - To: <?php echo $to; ?>
</h2>


                            
                            <div class="pull-right">
                                <a href="" data-toggle="modal" data-target="#addcontact2" class="btn btn-primary"><i class="icon-calendar">Filter</i></a>
                                <?php if (count($data) > 0) {
                                 ?>
                                 <a href="<?php echo base_url("admin/print_loan_withdrawalFilter/{$from}/{$to}/{$blanch_id}/{$loan_status}") ?>" class="btn btn-primary" target="_blank"><i class="icon-printer">Print</i></a>
                             <?php }else{ ?>
                                <?php } ?>
                            </div>    
                         </div>
                          <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example dataTable table-custom">
                                    <thead class="thead-primary">
                                        <tr>
                                        
                                        <th>Branch Name</th>
                                        <th>Customer Name</th>
                                        <th>Loan Product</th>
                                        <th>Loan Withdrawal</th>
                                        <th>Principal + interest</th>
                                        <th>Method</th>
                                        <th>Duration Type</th>
                                        <th>Number of Repayment</th>
                                        <th>Restoration</th>
                                        <th>Withdrawal Date</th>
                                        <th>End Date</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                   
       
                                    <tbody>
    <?php $no = 1 ?>    
    <?php if ($blanch_id == 'all'): ?>    
        <?php foreach ($datas as $branch_loans): ?>
            <?php foreach ($branch_loans as $loan_aproveds): ?>
                <tr>
                    <td><?php echo $loan_aproveds->blanch_name; ?></td>
                    <td><?php echo $loan_aproveds->f_name . ' ' . $loan_aproveds->m_name . ' ' . $loan_aproveds->l_name; ?></td>
                    <td><?php echo $loan_aproveds->loan_name; ?></td>
                    <td><?php echo number_format($loan_aproveds->loan_aprove); ?></td>
                    <td><?php echo number_format($loan_aproveds->loan_int); ?></td>
                    <td><?php echo $loan_aproveds->account_name; ?></td>
                    <td>
                        <?php
                            if ($loan_aproveds->day == 1) {
                                echo "Daily";
                            } elseif ($loan_aproveds->day == 7) {
                                echo "Weekly";
                            } elseif (in_array($loan_aproveds->day, [28, 29, 30, 31])) {
                                echo "Monthly";
                            }
                        ?>
                    </td>
                    <td><?php echo $loan_aproveds->session; ?></td> 
                    <td><?php echo number_format($loan_aproveds->restration); ?></td> 
                    <td><?php echo $loan_aproveds->loan_stat_date; ?></td> 
                    <td><?php echo substr($loan_aproveds->loan_end_date, 0, 10); ?></td> 
                </tr>
            <?php endforeach; ?>
        <?php endforeach; ?>
    <?php else: ?>
        <?php foreach ($data as $loan_aproveds): ?>
            <tr>
                <td><?php echo $loan_aproveds->blanch_name; ?></td>
                <td><?php echo $loan_aproveds->f_name . ' ' . $loan_aproveds->m_name . ' ' . $loan_aproveds->l_name; ?></td>
                <td><?php echo $loan_aproveds->loan_code ?? ''; ?></td>
                <td><?php echo $loan_aproveds->loan_name; ?></td>
                <td><?php echo $loan_aproveds->interest_formular; ?>%</td>
                <td><?php echo number_format($loan_aproveds->loan_aprove); ?></td>
                <td><?php echo number_format($loan_aproveds->loan_int); ?></td>
                <td><?php echo $loan_aproveds->account_name; ?></td>
                <td>
                    <?php
                        if ($loan_aproveds->day == 1) {
                            echo "Daily";
                        } elseif ($loan_aproveds->day == 7) {
                            echo "Weekly";
                        } elseif (in_array($loan_aproveds->day, [28, 29, 30, 31])) {
                            echo "Monthly";
                        }
                    ?>
                </td>
                <td><?php echo $loan_aproveds->session; ?></td> 
                <td><?php echo number_format($loan_aproveds->restration); ?></td> 
                <td><?php echo $loan_aproveds->loan_stat_date; ?></td> 
                <td><?php echo substr($loan_aproveds->loan_end_date, 0, 10); ?></td> 
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</tbody>


                                <td>
             
                    </div>
                </div>
                </div>
                                        
                                        </td>           
                                 </tr>
      


                           
                              
                                    </tbody>
                                      <tr>
                                    <td><b>TOTAL:</b></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><b><?php echo number_format(@$sum_loan_withdrawal->total_loan_aprove); ?></b></td>
                                    <td><b><?php echo number_format(@$sum_loan_withdrawal->total_loan_int); ?></b></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
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
            <?php echo form_open("admin/filter_loan_withdrawal"); ?>
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



