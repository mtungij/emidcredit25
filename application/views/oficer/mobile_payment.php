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
                            <li class="breadcrumb-item active"><?php echo $this->lang->line("loan") ?></li>
                            <li class="breadcrumb-item active"><?php echo $this->lang->line("loanRequest_menu") ?></li>
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
                            <h2>Malipo kwa Njia Ya simu</h2>    
                             </div>
                          <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example dataTable table-custom">
                                    <thead class="thead-primary">
                                        <tr>
                                    <th>S/No.</th>
                                    <th>Jina La Mteja</th>
                                    <th>Namba ya simu</th>
                                    <th>Kiasi kilicholipwa</th>
                                    <th>Njia Ya malipo</th>
                                    <th>Wakala</th>
                                    <th>Afisa</th>
                                   <!--  <th>Action</th> -->
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php $no = 1; ?>
                                               <?php $no = 1; ?>
                                    <?php foreach($cash_transaction as $mobile): ?>
                                   
                                              <tr>
                                    <td><?php echo $no++; ?>.</td>
                                    <td><?php echo $mobile->f_name; ?> <?php echo $mobile->m_name; ?> <?php echo $mobile->l_name; ?></td>
                                    <td><?php echo $mobile->phone_no; ?></td>
                                    <td><?php echo $mobile->depost; ?></td>
                                    <td><?php echo $mobile->deposit_account; ?></td>
                                    <td><?php echo $mobile->jina_wakala; ?></td>
                                    <td><?php echo $mobile->empl_name; ?></td>
                                    
                                       
                                        
                                        
                                         
                                            
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
</div>

<?php include('incs/footer.php'); ?>


