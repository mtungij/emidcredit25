<?php include('incs/header.php'); ?>
<?php include('incs/nav.php'); ?>
<?php include('incs/side.php'); ?>
<?php $comp_id = $this->session->userdata('comp_id'); ?>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">

                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a><?php echo @$_SESSION['comp_name']; ?></h2>

                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url("admin/index"); ?>"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item active"><?php echo $this->lang->line("dashboard_menu"); ?></li>  

                        </ul>
                    </div>

                    <div class="col-lg-6 col-md-4 col-sm-12 text-right">
                        <?php foreach ($account_capital as $account_capitals): ?>
                        <div class="bh_chart hidden-xs">
                            <div class="float-left m-r-15">
                                <small><?php echo $account_capitals->account_name; ?></small>
                                <h6 class="mb-0 mt-1"><i class="icon-wallet"></i><?php echo number_format($account_capitals->comp_balance); ?></h6>
                            </div>
                            
                        </div>
                       <?php endforeach; ?>
                       
                    </div>
                </div>
            </div>
           <?php if ($das = $this->session->flashdata('massage')): ?> 
                    <div class="row"> 
                        <div class="col-md-12"> 
                                <div class="alert alert-dismisible alert-success"> <a href="" class="close">&times;</a> <?php echo $das;?> </div> 
                            </div> 
                        </div> 
                    <?php endif; ?>
            <div class="row clearfix">
                <?php 
          $blanchs = $this->queries->get_blanch($comp_id);
                 ?>
                
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><?php echo $this->lang->line("revenue_menu"); ?></h2>
                             <ul class="header-dropdown">
                                 <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle btn btn-primary" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-size-actual"></i>Branches</a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <?php foreach ($blanch as $blanchs):
                                        $blanch_total_capital = $this->queries->get_total_blanch_account($blanchs->blanch_id);
                                         //print_r($blanch_total_capital);
                                         ?>

                                        <li class="c"><a href="<?php echo base_url("admin/view_blanchPanel/{$blanchs->blanch_id}") ?>"><?php echo $blanchs->blanch_name; ?> - <?php echo number_format($blanch_total_capital->total_blanch_amount); ?></a></li>
                                         <?php endforeach; ?>
                                    </ul>
                                </li>
                            </ul>

                        </div>
                        <div class="body">

                        <div class="row clearfix">
                <div class="col-lg-3 col-md-6">
                    <div class="card top_counter currency_state">
                    <a href="#" type="button" class="no-focus" data-toggle="popover" data-placement="top" title="Gawa ya mwezi" data-content="Gawa inayoonekana hapa ni gawa jumla ya mwezi isiyokuwa na riba kwa matawi yote">
                        <div class="body">
                            <div class="icon"><img src="https://www.wrraptheme.com/templates/lucid/html/assets/images/coin/XRP.svg" width="35" /></div>
                           
                          

                            <div class="content">
                                <div class="text"><strong>GAWA MWEZI</strong></div>
                                <h5 class="number"><?= number_format($total_loan_with) ?></h5>
                            </div>
                           
                        </div> 
                        </a>                       
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card top_counter currency_state">
                        <div class="body">
                                <div class="icon"><img src="https://www.wrraptheme.com/templates/lucid/html/assets/images/coin/ETH.svg" width="35" /></div>
                            <div class="content">
                                <div class="text"><strong>RIBA YA MWEZI</strong></div>
                                <h5 class="number"><?= number_format($montly_interest)?></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card top_counter currency_state">
                    <a href="#" type="button" class="no-focus" data-toggle="popover" data-placement="top"  data-content="hapa unaona idadi jumla ya wateja waliopewa mikopo kwa mwezi husika ">
                        <div class="body">
                                <div class="icon"><img src="https://www.wrraptheme.com/templates/lucid/html/assets/images/coin/XRP.svg" width="35" /></div>
                            <div class="content">
                                <div class="text"><strong>GAWA MWEZI WATEJA</strong></div>
                                <h5 class="number"><?= $customer_monthly ?></h5>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="card top_counter currency_state">
                        <div class="body">
                                <div class="icon"><img src="https://www.wrraptheme.com/templates/lucid/html/assets/images/coin/neo.svg" width="35" /></div>
                            <div class="content">
                           
                                <div class="text"><strong>FAINI YA MWEZI</strong></div>
                                <h5 class="number"><?= number_format($total_monthly_income->total_receved) ?></h5>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-12">
                    <div class="card top_counter currency_state">
                        <div class="body">
                                <div class="icon"><img src="https://www.wrraptheme.com/templates/lucid/html/assets/images/coin/neo.svg" width="35" /></div>
                            <div class="content">
                           
                                <div class="text"><strong>RIBA ILIYOKUSANYWA</strong></div>
                                <h5 class="number"><?= number_format($monthly_interest) ?></h5>

                            </div>
                        </div>
                    </div>
                </div>
               

                <div class="col-lg-3 col-md-6">
                    <div class="card top_counter currency_state">
                        <div class="body">
                            <div class="icon"><img src="https://www.wrraptheme.com/templates/lucid/html/assets/images/coin/qtum.svg" width="35" /></div>
                            <div class="content">
                                <div class="text"><strong>MAUZO YA LEO</strong></div>
                                <h5 class="number"><?= number_format($rejesho->total_rejesho)?></h5>
                            </div>
                        </div>                        
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card top_counter currency_state">
                        <div class="body">
                                <div class="icon"><img src="https://www.wrraptheme.com/templates/lucid/html/assets/images/coin/stellar.svg" width="35" /></div>
                            <div class="content">
                                <div class="text"><strong>MALAZO JUMLA</strong></div>
                                <h5 class="number"><?= number_format($total_malazo) ?></h5>  
                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="col-lg-3 col-md-12">
                    <div class="card top_counter currency_state">
                    <a href="#" type="button" class="no-focus" data-toggle="popover" title="Madeni sugu" data-placement="top"  data-content="haya ni madeni sugu ya jumla kwa matawi yote kwa muda wotee ">
                        <div class="body">
                                <div class="icon"><img src="https://www.wrraptheme.com/templates/lucid/html/assets/images/coin/XRP.svg" width="35" /></div>
                            <div class="content">
                            <?php $loan_out = $this->queries->get_total_outStandcomp($comp_id); ?>
                                <div class="text"><strong>MADENI SUGU</strong></div>
                                <h5 class="number"><?= number_format($loan_out->total_remain) ?></h5>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>



                            <div class="row clearfix">
                                <div class="col-md-4">
  <div class="body bg-success text-light">
                                        <h4><i class="icon-wallet"></i> <?= number_format($today_deposit, ) ?></h4>
                                        <span>Payment Today</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="body bg-warning text-light">
                                        <h4><i class="icon-wallet"></i><?= number_format($today_principal) ?></h4>
                                        <span>Principal Returned</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="body bg-primary text-light">
                                        <h4><i class="icon-wallet"></i><?= number_format( $today_interest) ?></h4>
                                        <span>Interest Returned</span>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- <div id="total_revenue" class="ct-chart m-t-20"></div> -->
                        </div>
                    </div>
                </div>

                                <?php 
             $all_customer = $this->db->query("SELECT * FROM tbl_customer WHERE comp_id = '$comp_id'");
             $all_male = $this->db->query("SELECT * FROM tbl_customer WHERE comp_id = '$comp_id' AND gender = 'male'");
             $all_female = $this->db->query("SELECT * FROM tbl_customer WHERE comp_id = '$comp_id' AND gender = 'female'");
             $employee = $this->db->query("SELECT * FROM tbl_employee WHERE comp_id = '$comp_id'");
             $new_customer = $this->queries->get_today_registered_customers_count($comp_id);
             ?>
            </div>


            <div class="row clearfix">
                 <div class="col-md-3 col-12">
                   <div class="card">
                        <div class="header">
                            <h2>WATEJA & WAFANYAKAZI</h2>
                        </div>
                        <div class="body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="c">JUMLA YA WATEJA</td>
                                        <td class="align-right"><span class="badge badge-success"><?php echo $all_customer->num_rows(); ?></span></td>
                                    </tr>
                                    <tr>
                                        <td class="c">WATEJA WAPYA</td>
                                        <td class="align-right"><span class="badge badge-info"><?php echo $new_customer; ?></span></td>
                                    </tr>

                                    <tr>
                                        <td class="c">WANAUME</td>
                                        <td class="align-right"><span class="badge badge-info"><?php echo $all_male->num_rows(); ?></span></td>
                                    </tr>
                                    <tr>
                                        <td class="c">WANAWAKE</td>
                                        <td class="align-right"><span class="badge badge-danger"><?php echo $all_female->num_rows(); ?></span></td>
                                    </tr>
                                    <tr>
                                        <td class="c">WAFANYAKAZI</td>
                                        <td class="align-right"><span class="badge badge-default"><?php echo $employee->num_rows(); ?></span></td>
                                    </tr>                              
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
        <?php 
        $deposit_daily = $this->queries->fetch_today_deposit_daily_comp($comp_id);
        $depist_weekly = $this->queries->fetch_today_deposit_weekly_comp($comp_id);
        $deposit_monthly = $this->queries->fetch_today_deposit_monthly_comp($comp_id);
        $all_deposit = $this->queries->fetch_today_deposit_comp($comp_id);
        //print_r($all_deposit);
         ?>

                    <div class="col-md-3 col-12">
                   <div class="card">
                        <div class="header">
                            <h2>MALIPO YA LEO</h2>
                        </div>
                        <div class="body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="c">KILA SIKU</td>
                                        <td class="align-right"><span class="badge badge-warning"><?php echo number_format($deposit_daily->total_deposit); ?></span></td>
                                    </tr>

                                    <tr>
                                        <td class="c">WIKI</td>
                                        <td class="align-right"><span class="badge badge-info"><?php echo number_format($depist_weekly->total_deposit_weekly + $depist_weekly->total_double_wekly); ?></span></td>
                                    </tr>
                                    <tr>
                                        <td class="c">MWEZI</td>
                                        <td class="align-right"><span class="badge badge-secondary"><?php echo number_format($deposit_monthly->total_deposit_monthly + $deposit_monthly->total_double_month); ?></span></td>
                                    </tr>
                                    <tr>
                                        <td class="c"><b>JUMLA</b></td>
                                        <td class="align-right"><b><span class="badge badge-success"><?php echo number_format($all_deposit->total_deposit_all + $all_deposit->total_double_all); ?></span></b></td>
                                    </tr>                              
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>

                    <?php 
                 $loan_with_day = $this->queries->get_today_withdrawal_daily_comp($comp_id);
                 $loan_with_weekly = $this->queries->get_today_withdrawal_weekly_comp($comp_id);
                 $loan_with_monthy = $this->queries->get_today_withdrawal_monthly_comp($comp_id);
                 $ll_loanwith = $this->queries->get_today_withdrawal_all_comp($comp_id);
                 //print_r($ll_loanwith);
                     ?>

                     <div class="col-md-3 col-12">
                   <div class="card">
                        <div class="header">
                            <h2>MIKOPO ILIYOTOLEWA LEO</h2>
                        </div>
                        <div class="body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="c">KILA SIKU</td>
                                        <td class="align-right"><span class="badge badge-warning"><?php echo number_format($loan_with_day->total_loanWith_day); ?></span></td>
                                    </tr>

                                    <tr>
                                        <td class="c">WIKI</td>
                                        <td class="align-right"><span class="badge badge-info"><?php echo number_format($loan_with_weekly->total_loanWith_weekly); ?></span></td>
                                    </tr>
                                    <tr>
                                        <td class="c">MWEZI</td>
                                        <td class="align-right"><span class="badge badge-secondary"><?php echo number_format($loan_with_monthy->total_loanWith_monthly); ?></span></td>
                                    </tr>
                                    <tr>
                                        <td class="c"><b>JUMLA</b></td>
                                        <td class="align-right"><b><span class="badge badge-success"><?php echo number_format($ll_loanwith->total_loanWith_all); ?></span></b></td>
                                    </tr>                              
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>

             <?php 
             $deducted_balance = $this->queries->get_today_deducted_income_dahboard_comp($comp_id);
             $non_balance = $this->queries->get_today_nonDeducted_receive_comp($comp_id);
             $expenses = $this->queries->get_today_expenses_blanch_data_comp($comp_id);
             $reg_fee = $this->queries->get_today_registration_fee_total($comp_id);
            //  print_r($reg_fee);
            //          exit();
              ?>
                     <div class="col-md-3 col-12">
                   <div class="card">
                        <div class="header">
                            <h2>FOMU NA MATUMIZI</h2>
                        </div>
                        <div class="body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="c">FOMU</td>
                                        <td class="align-right"><span class="badge badge-warning"><?php echo number_format($deducted_balance->total_deducted); ?></span></td>
                                    </tr>

                                   

                                    <tr>
                                        <td class="c">FAINI</td>
                                        <td class="align-right"><span class="badge badge-info"><?php echo number_format($non_balance->total_non); ?></span></td>
                                    </tr>
                                    <tr>
                                        <td class="c"><b>JUMLA</b></td>
                                        <td class="align-right"><span class="badge badge-success"><?php echo number_format($deducted_balance->total_deducted + $non_balance->total_non + $reg_fee->total_fee); ?></span></td>
                                    </tr>
                                    <tr>
                                        <td class="c">MATUMIZI</td>
                                        <td class="align-right"><b><span class="badge badge-danger"><?php echo number_format($expenses->total_expenses); ?></span></b></td>
                                    </tr>                              
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
             
             
            </div>

            

             <div class="row clearfix w_social3">
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php echo base_url("admin/customer"); ?>"><div class="card facebook-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/user.png" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color: black;">Sajili mteja </div>
                            <!-- <div class="number">123</div> -->
                        </div>
                    </div></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php echo base_url("admin/loan_application"); ?>"><div class="card instagram-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/request.jpg" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black;">Omba Mkopo</div>
                            <!-- <div class="number">231</div> -->
                        </div>
                    </div></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php echo base_url("admin/teller_dashboard") ?>"><div class="card twitter-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/deposit.jpg" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text"style="color:black;">Lipisha/Gawa</div>
                            <!-- <div class="number">31</div> -->
                        </div>
                    </div></a>
                </div>
                
                <div class="col-lg-2 col-md-4 col-6">
                <a href="<?php echo base_url("admin/loan_pending"); ?>"><div class="card linkedin-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/aplication.png" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black">Maombi ya Mikopo</div>
                            <!-- <div class="number">2510</div> -->
                        </div>
                    </div></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                <a href="<?php echo base_url("admin/disburse_loan"); ?>"><div class="card linkedin-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/aproveds.jpg" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black">Mikopo Iliyopitishwa</div>
                            <!-- <div class="number">2510</div> -->
                        </div>
                    </div></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                <a href="<?php echo base_url("admin/today_recevable_loan"); ?>"><div class="card linkedin-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/receivable.png" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black">Makusanyo Ya leo</div>
                            <!-- <div class="number">2510</div> -->
                        </div>
                    </div></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                <a href="<?php echo base_url("admin/loan_pending_time"); ?>"><div class="card linkedin-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/default.jpeg" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black">Lala Nje</div>
                            <!-- <div class="number">2510</div> -->
                        </div>
                    </div></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                <a href="<?php echo base_url("admin/Default_loan"); ?>"><div class="card linkedin-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/default.jpeg" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black">Deni Sugu</div>
                            <!-- <div class="number">2510</div> -->
                        </div>
                    </div></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php echo base_url("admin/daily_report"); ?>"><div class="card linkedin-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/daily.png" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black">Report ya siku</div>
                            <!-- <div class="number">2510</div> -->
                        </div>
                    </div></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php echo base_url("admin/expnses_requisition_form"); ?>"><div class="card behance-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/expenses.png" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black">Omba Matumizi</div>
                            <!-- <div class="number">121</div> -->
                        </div>
                    </div></a>
                </div>
                
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php echo base_url("admin/cash_transaction"); ?>">
                        <div class="card facebook-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/transaction.png" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black;">Malipo</div>
                            <!-- <div class="number">123</div> -->
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php echo base_url("admin/transfar_amount"); ?>"><div class="card twitter-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/stoo.png" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black">Ongezeko</div>
                            <!-- <div class="number">1</div> -->
                        </div>
                    </div></a>
                </div>

                <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php echo base_url("admin/income_dashboard"); ?>">
                        <div class="card twitter-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/income.png" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black;">Fomu/Faini</div>
                            <!-- <div class="number">31</div> -->
                        </div>
                    </div>
                    </a>
                </div>
            </div>



              <div class="row clearfix w_social3">
                
                
                
                
                
                


             
                
              
               
               

               

                 
                

                 
                 

        </div>
    </div>
    
</div>

<?php include('incs/footer.php'); ?>