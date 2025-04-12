  <div id="left-sidebar" class="sidebar">
        <div class="sidebar-scroll">
            <div class="user-account">
                <img src="<?php echo base_url() ?>assets/img/male.jpeg" class="rounded-circle user-photo" alt="User Profile Picture">
                <div class="dropdown">
                    
                    <span><?php echo $this->lang->line('karibu_menu'); ?>,</span>
                    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong><?php echo @$_SESSION['comp_name']; ?></strong></a>
                    <ul class="dropdown-menu dropdown-menu-right account">
                        <li><a href="javascript:;"><i class="icon-user"></i>My Profile</a></li>
                        <li><a href="<?php echo base_url("admin/setting"); ?>"><i class="icon-settings"></i>Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="javascript:void(0);"><i class="icon-power"></i>Logout</a></li>
                    </ul>
                </div>
                <!-- <hr> -->
               <!--  <ul class="row list-unstyled">
                    <li class="col-4">
                        <small>Employee</small>
                        <h6>14</h6>
                    </li>
                    <li class="col-4">
                        <small>Customer</small>
                        <h6>13</h6>
                    </li>
                    <li class="col-4">
                        <small>Admin</small>
                        <h6>213</h6>
                    </li>
                </ul> -->
            </div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#menu">Menu</a></li>                
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#sub_menu">Report</i></a></li>
                <!-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Chat"><i class="icon-book-open"></i></a></li> -->
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#setting"><i class="icon-settings"></i></a></li>                
            </ul>
                
            <!-- Tab panes -->
            <div class="tab-content p-l-0 p-r-0">
                <div class="tab-pane active" id="menu">
                    <nav class="sidebar-nav">
                        <ul class="main-menu metismenu">
                            <li class="active"><a href="<?php echo base_url("admin/index"); ?>"><i class="icon-home"></i><span>Dashibodi</span></a></li>

                          <li><a href="javascript:void(0);" class="has-arrow"><i class="icon-settings"></i><span>Mpangilio</span> </a>
                                <ul>
                                    <li><a href="<?php echo base_url("admin/loan_category"); ?>">Aina za Mkopo</a></li>
                                    <li><a href="<?php echo base_url("admin/loan_fee") ?>">Ada ya Mkopo</a></li>
                                    <li><a href="<?php echo base_url("admin/penart_setting"); ?>">Faini Lala</a></li>
                                    <li><a href="<?php echo base_url("admin/formular_setting"); ?>">Formula ya Riba</a></li>
                                    <li><a href="<?php echo base_url("admin/transaction_account"); ?>">Akaunti za Miamala</a></li>
                                </ul>
                            </li>

                          <li><a href="javascript:void(0);" class="has-arrow"><i class="icon-wallet"></i><span>Mtaji</span> </a>
                                <ul>
                                    <li><a href="<?php echo base_url("admin/shareHolder"); ?>">Wanahisa</a></li>
                                    <li><a href="<?php echo base_url("admin/capital"); ?>">Weka Mtaji</a></li>
                                    <li><a href="<?php echo base_url("admin/transfar_amount"); ?>">Ongezeko</a></li>
                                </ul>
                            </li>
                             <li><a href="<?php echo base_url("admin/blanch"); ?>"><i class="icon-size-actual"></i>Sajiri Tawi</a></li>
                             <!-- <li><a href="javascript:;"><i class="icon-users"></i>Group</a></li> -->
                            
                            <li><a href="javascript:void(0);" class="has-arrow"><i class="icon-wallet"></i><span>FomuFaini</span> </a>
                                <ul>
                                    <li><a href="<?php echo base_url("admin/income_detail"); ?>">Sajili Faini</a></li>
                                    <li><a href="<?php echo base_url("admin/income_dashboard"); ?>">Lipa Fain</a></li>
                                    <li><a href="<?php echo base_url("admin/deducted_income"); ?>">Fomu</a></li>
                                    <!-- <li><a href="javascript:;">Transfor Income Branch To Branch</a></li>
                                    <li><a href="javascript:;">Transfor Income Branch To Company</a></li> -->
                                    <li><a href="<?php echo base_url("admin/income_balance"); ?>">Income Balance</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0);" class="has-arrow"><i class="icon-credit-card"></i><span>Matumizi</span> </a>
                                <ul>
                                    <li><a href="<?php echo base_url("admin/expenses"); ?>">Sajili Matumizi</a></li>
                                    <li><a href="<?php echo base_url("admin/expnses_requisition_form"); ?>">Ombi la Matumizi</a></li>
                                    <li><a href="<?php echo base_url("admin/get_recomended_request"); ?>">Matumizi yote</a></li>
                                </ul>
                            </li>

                            <li><a href="javascript:void(0);" class="has-arrow"><i class="icon-layers"></i><span>Wafanyakazi</span> </a>
                                <ul>
                                    <li><a href="<?php echo base_url("admin/employee"); ?>">Sajili Mfanyakazi</a></li>
                                    <li><a href="<?php echo base_url("admin/all_employee"); ?>">Wafanyakazi Wote</a></li>
                                  <!--   <li><a href="javascript:void(0);">All Branchs & Employee</a></li>
                                    <li><a href="javascript:void(0);">Employee Leave</a></li>
                                    <li><a href="javascript:void(0);">Sallary Sheet</a></li>
                                    <li><a href="javascript:void(0);">Employee Allowance</a></li>
                                    <li><a href="javascript:void(0);">Employee Deduction</a></li> -->
                                </ul>
                            </li>
                            
                            <li>
                                <a href="#Authentication" class="has-arrow"><i class="icon-user"></i><span>Wateja</span></a>
                                <ul>
                                    <li><a href="<?php echo base_url("admin/customer"); ?>">Sajili mteja</a></li>
                                    <li><a href="<?php echo base_url("admin/all_customer"); ?>">Wateja wote</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#Widgets" class="has-arrow"><i class="icon-list"></i><span>Mikopo</span></a>
                                <ul>
                                    <li><a href="<?php echo base_url("admin/loan_application"); ?>">Omba Mkopo</a></li>
                                    <li><a href="<?php echo base_url("admin/loan_pending"); ?>">Mikopo Inasubiri Kupitishwa</a></li>
                                    
                                    <li><a href="<?php echo base_url("admin/disburse_loan"); ?>">Mkopo umepitishwa</a></li>
                                    <li><a href="<?php echo base_url("admin/loan_withdrawal"); ?>">Mikopo Gawiwa</a></li>
                                    <li><a href="<?php echo base_url("admin/all_loan_lejected"); ?>">Mkopo kataliwa</a></li>
                                    <!-- <li><a href="javascript:;">Individual Loan</a></li>
                                    <li><a href="javascript:;">Group Loan</a></li> -->
                                </ul>
                            </li>
                            <li><a href="<?php echo base_url("admin/teller_dashboard"); ?>"><i class="icon-list"></i>Gaw/Lipisha</a></li>

                            <li>

                                <a href="#Pages" class="has-arrow"><i class="icon-docs"></i><span>Mawasiliano</span></a>
                                <ul>
                                    <li><a href="<?php echo base_url("admin/reminder_sms"); ?>">Kupitia sms</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <br><br><br><br>
                </div>

                <div class="tab-pane" id="sub_menu">
                    <nav class="sidebar-nav">
                        <ul class="main-menu metismenu">
                        	

                            <li>
                                <a href="#uiElements" class="has-arrow"><i class="icon-wallet"></i> <span>Transaction Report</span></a>
                                <ul>
                                    <li><a href="<?php echo base_url("admin/cash_transaction") ?>">General Transactions</a></li>
                                    <li><a href="<?php echo base_url("admin/penalt_payments") ?>">Penalt Payments</a></li>
                                    <li><a href="<?php echo base_url("admin/teller_transaction") ?>">Teller Officer Cash Transaction</a></li>
                                    <li><a href="<?php echo base_url("admin/branch_trans") ?>">Branchwise Transactions</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="#uiElements" class="has-arrow"><i class="icon-wallet"></i> <span>Report za Mwezi</span></a>
                                <ul>
                                    <li><a href="<?php echo base_url("admin/monthly_withdrawal") ?>">Gawa ya Mwezi</a></li>
                                    <li><a href="<?php echo base_url("admin/monthly_income") ?>">Faini ya Mwezi</a></li>
                                    <li><a href="<?php echo base_url("admin/mikopo_chefuchefu") ?>">Mikopo chefuchefu</a></li>
                                </ul>
                            </li>
                        	<li><a href="<?php echo base_url("admin/blanchiwise_report"); ?>"><i class="icon-list"></i>Ripoti ya Kila Tawi</a></li>
                        	<li><a href="<?php echo base_url("admin/loan_pending_time"); ?>"><i class="icon-list"></i>Lala Nje</a></li>
                        	<!-- <li><a href="</?php echo base_url("admin/repaymant_data"); ?>"><i class="icon-list"></i>Loan Repayment</a></li> -->
                        	<li><a href="<?php echo base_url("admin/Default_loan"); ?>"><i class="icon-list"></i>Madeni Sugu</a></li>
                        	<li><a href="<?php echo base_url("admin/loan_collection"); ?>"><i class="icon-list"></i>Loan Collection</a></li>
                        	<!-- <li><a href="javascript:;"><i class="icon-list"></i>Customer Loan Report</a></li> -->
                        	<li><a href="<?php echo base_url("admin/customer_account_statement"); ?>"><i class="icon-list"></i>Statementi ya Mteja</a></li>
                        	<li><a href="<?php echo base_url("admin/today_recevable_loan"); ?>"><i class="icon-list"></i>Makusanyo Ya Leo</a></li>
                        	<li><a href="<?php echo base_url("admin/today_receved_loan"); ?>"><i class="icon-list"></i>Malipo ya Leo</a></li>

                          
                        
                        </ul>
                    </nav>
                    <br><br><br>
                </div>
               
                <div class="tab-pane p-l-15 p-r-15" id="setting">
                    <h6>Choose Skin</h6>
                    <ul class="choose-skin list-unstyled">
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>                   
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="cyan" class="active">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="blush">
                            <div class="blush"></div>
                            <span>Blush</span>
                        </li>
                    </ul>

               
                </div>             
            </div>          
        </div>
    </div>