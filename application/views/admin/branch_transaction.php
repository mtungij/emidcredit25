<?php include('incs/header.php'); ?>
<?php include('incs/nav.php'); ?>
<?php include('incs/side.php'); ?>

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url("oficer/index"); ?>"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Report</li>
                        <li class="breadcrumb-item active">Branch Transaction</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <?php if ($das = $this->session->flashdata('massage')): ?> 
            <div class="row"> 
                <div class="col-md-12"> 
                    <div class="alert alert-dismissible alert-success"> 
                        <a href="" class="close">&times;</a> 
                        <?php echo $das; ?>
                    </div> 
                </div> 
            </div> 
        <?php endif; ?>

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <?php $date = date("Y-m-d"); ?>
                        <h2>Branch Transaction / <?php echo $date; ?></h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover j-basic-example dataTable table-custom">
                                <thead class="thead-primary">
                                    <tr>
                                        <th>Branch</th>
                                        <th>Total Disbursed Loan</th>
                                        <th>Total Deposit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $total_loans = 0;
                                    $total_deposits = 0;
                                    ?>
                                    
                                    <?php if (!empty($transactions)): ?>
                                        <?php foreach ($transactions as $row): 
                                            $total_loans += $row->total_loan_approved;
                                            $total_deposits += $row->total_deposit;
                                        ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($row->branch); ?></td>
                                                <td><?php echo number_format($row->total_loan_approved, 2); ?></td>
                                                <td><?php echo number_format($row->total_deposit, 2); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        
                                        <tr>
                                            <th>Total</th>
                                            <th><?php echo number_format($total_loans, 2); ?></th>
                                            <th><?php echo number_format($total_deposits, 2); ?></th>
                                        </tr>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="3" style="text-align: center;">No transactions found.</td>
                                        </tr>
                                    <?php endif; ?>
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
