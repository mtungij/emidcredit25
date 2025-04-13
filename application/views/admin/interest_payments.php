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
                            <h2>Today Principal & Interest Paid</h2>
                            <div class="pull-right">
                                <a href="" data-toggle="modal" data-target="#addcontact2" class="btn btn-primary"><i class="icon-calendar">Filter</i></a>
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
                                       
                              
                                        <tr>
                                   
                                    
                    
                                        <?php if (!empty($today_profit)): ?>
    <?php $no = 1; foreach ($today_profit as $row): ?>
        <tr>                                     
            <td><?php echo $no++; ?>.</td>                                     
            <td><?= $row['f_name'] . ' ' . $row['m_name'] . ' ' . $row['l_name']; ?></td>                                     
            <td><?= $row['blanch_name'] ?? ''; ?></td>                                     
            <td><?= number_format($row['loan_aprove'])  ; ?></td>                                     
            <td><?=  number_format($row['total_interest'])   ; ?></td>                                     
            <td><?= number_format($row['loan_int']) ; ?></td>                                     
            <td><?= number_format($row['depost']); ?></td>                                     
            <td><?= number_format($row['principal_paid']); ?></td>                                     
            <td><?= $row['interest_paid']; ?></td>                                                                                                                                                                                                       
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="9" style="text-align: center;">No data found</td>
    </tr>
<?php endif; ?>



      

      


                           
                                <tr>
                                    <td><b>TOTAL:</b></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
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



