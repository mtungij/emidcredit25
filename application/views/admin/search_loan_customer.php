<?php include('incs/header.php'); ?>
<?php include('incs/nav.php'); ?>
<?php include('incs/side.php'); ?>

<div id="main-content" class="profilepage_2 blog-page">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url("admin/index"); ?>"><i
                                    class="icon-home"></i></a></li>

                        <li class="breadcrumb-item active">Teller</li>
                        <li class="breadcrumb-item active">Customer Loan Information</li>
                    </ul>
                </div>

            </div>
        </div>

        <?php if ($das = $this->session->flashdata('massage')): ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-dismisible alert-success"> <a href="" class="close">&times;</a>
                        <?php echo $das; ?> </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($das = $this->session->flashdata('error')): ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-dismisible alert-danger"> <a href="" class="close">&times;</a>
                        <?php echo $das; ?> </div>
                </div>
            </div>
        <?php endif; ?>




        <?php
        @$customer_loan = $this->queries->get_loan_active_customer($customer->customer_id);
        @$total_deposit = $this->queries->get_total_amount_paid_loan($customer_loan->loan_id);
        @$out_stand     = $this->queries->get_outstand_loan_customer($customer_loan->loan_id);
        @$total_recovery      = $this->queries->get_total_loan_pend($customer_loan->loan_id);
        @$total_penart        = $this->queries->get_total_penart_loan($customer_loan->loan_id);
        @$total_deposit_penart= $this->queries->get_total_paypenart($customer_loan->loan_id);
        @$end_deposit         = $this->queries->get_end_deposit_time($customer_loan->loan_id);
        $button_class = '';
        if ($loan_status->loan_status == 'New Customer') {
            $button_class = 'btn-primary';
        } elseif ($loan_status->loan_status == 'Old Customer') {
            $button_class = 'btn-warning';
        } else {
            $button_class = 'btn-secondary';
        }
        ?>

        <!-- ===== Customer & Sponsor Cards ===== -->
        <div class="row clearfix mb-4">

            <!-- CUSTOMER CARD -->
            <div class="col-12 col-md-6 col-xl-4 mb-3 mb-md-0">
                <div class="card h-100">
                    <div class="card-body p-3">
                        <div class="d-flex flex-column align-items-center text-center">
                            <?php if (@$customer->passport): ?>
                                <img src="<?php echo base_url() . $customer->passport; ?>" alt="Customer"
                                    class="rounded-circle p-1 bg-primary" width="130" height="130" style="object-fit:cover;">
                            <?php else: ?>
                                <img src="<?php echo base_url() . 'assets/img/male.jpeg'; ?>" alt="Customer"
                                    class="rounded-circle p-1 bg-primary" width="130" height="130" style="object-fit:cover;">
                            <?php endif; ?>
                            <div class="mt-2">
                                <h6 class="mb-0"><?php echo strtoupper(@$customer->f_name . ' ' . @$customer->m_name . ' ' . @$customer->l_name); ?></h6>
                                <small class="text-secondary"><?php echo @$customer->phone_no; ?></small>
                                <div class="mt-1">
                                <?php
                                $loan_stat   = @$customer_loan->loan_status;
                                $loan_end    = @$customer_loan->loan_end_date;
                                $remain_debt = (float)(@$customer_loan->loan_int) - (float)(@$total_deposit->total_Deposit);
                                $today       = date('Y-m-d');

                                if ($loan_stat == 'disbarsed') {
                                    // Loan approved but cash not yet given to customer
                                    $ls_class = 'btn-warning';
                                    $ls_label = 'Hajapewa Mkopo';
                                } elseif ($remain_debt <= 0) {
                                    // Fully repaid
                                    $ls_class = 'btn-info';
                                    $ls_label = 'Kamaliza Mkopo';
                                } elseif ($remain_debt > 0 && $loan_end && $loan_end < $today) {
                                    // Debt remains AND end date already passed — out of agreement
                                    $ls_class = 'btn-danger';
                                    $ls_label = 'Nje ya Mkataba';
                                } elseif ($remain_debt > 0 && $loan_end && $loan_end >= $today) {
                                    // Debt remains AND still within agreement period
                                    $ls_class = 'btn-success';
                                    $ls_label = 'Ndani ya Mkataba';
                                } else {
                                    $ls_class = 'btn-secondary';
                                    $ls_label = 'Hakuna Mkopo';
                                }
                                ?>
                                <button class="btn btn-sm <?= $ls_class ?>"><?= $ls_label ?></button>
                                <a href="<?php echo base_url("admin/customer_profile/$customer->customer_id"); ?>"
                                    class="btn btn-sm btn-outline-primary">Tazama zaidi</a>
                                </div>
                            </div>
                        </div>
                        <hr class="my-2">
                        <ul class="list-group list-group-flush" style="font-size:0.82rem">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap py-1">
                                <span class="fw-bold">
                                    Customer ID
                                </span>
                                <strong><span class="text-secondary"><?php echo @$customer->customer_code; ?></span></strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap py-1">
                                <span class="fw-bold">
                                  Kuchukua Mkopo
                                </span>
                                <strong><span class="text-secondary">
                                    <?php echo @$customer_loan->loan_stat_date ?: 'YYY-MM-DD'; ?>
                                </span></strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap py-1">
                                <span class="fw-bold">
                                 Kumaliza Mkopo
                                </span>
                                <strong><span class="text-secondary">
                                    <?php echo @$customer_loan->loan_end_date ? substr($customer_loan->loan_end_date, 0, 10) : 'YY-DD-MM'; ?>
                                </span></strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap py-1">
                                <span class="fw-bold">
                                   Last Payment Date
                                </span>
                                <strong><span class="text-secondary">
                                    <?php echo !empty(@$end_deposit->deposit_day) ? substr($end_deposit->deposit_day, 0, 10) : 'YYY-MM-DD'; ?>
                                </span></strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap py-1">
                                <span class="fw-bold">
                                  Kiasi cha Mkopo
                                </span>
                                <strong><span class="text-secondary"><?php echo number_format(@$customer_loan->loan_int); ?></span></strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap py-1">
                                <span class="fw-bold">
                                   Rejesho
                                </span>
                                <strong><span class="text-secondary"><?php echo number_format(@$customer_loan->restration); ?></span></strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap py-1">
                                <span class="fw-bold">
                                    Jumla ya Malipo
                                </span>
                                <?php if (@$total_deposit->total_Deposit > @$customer_loan->loan_int): ?>
                                    <strong><span class="text-secondary"><?php echo number_format(@$customer_loan->loan_int); ?></span></strong>
                                    <span class="text-danger">(+<?php echo number_format(@$total_deposit->total_Deposit - @$customer_loan->loan_int); ?>)</span>
                                <?php else: ?>
                                    <strong><span class="text-secondary"><?php echo number_format(@$total_deposit->total_Deposit); ?></span></strong>
                                <?php endif; ?>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap py-1">
                                <span class="fw-bold">
                                   Baki ya Deni
                                </span>
                                <?php if (@$total_deposit->total_Deposit > @$customer_loan->loan_int): ?>
                                    <strong><span class="text-secondary">0.00</span></strong>
                                <?php else: ?>
                                    <strong><span class="text-danger"><?php echo number_format(@$customer_loan->loan_int - @$total_deposit->total_Deposit); ?></span></strong>
                                <?php endif; ?>
                            </li>
                            <li class="list-group-item py-2">
                                <?php
                                $loan_start_ts = strtotime((string) @$customer_loan->loan_stat_date);
                                $loan_end_ts   = strtotime((string) @$customer_loan->loan_end_date);
                                $today_ts      = strtotime(date('Y-m-d'));
                                $remain_amount = max(0, (float) (@$customer_loan->loan_int) - (float) (@$total_deposit->total_Deposit));
                                $pending_amount = (float) (@$total_recovery->total_pending);

                                $duration_days = 0;
                                $elapsed_days = 0;
                                $time_progress = 0;

                                if ($loan_start_ts && $loan_end_ts && $loan_end_ts > $loan_start_ts) {
                                    $duration_days = max(1, (int) ceil(($loan_end_ts - $loan_start_ts) / 86400));
                                    $elapsed_days = (int) floor(($today_ts - $loan_start_ts) / 86400);
                                    if ($elapsed_days < 0) {
                                        $elapsed_days = 0;
                                    }
                                    $time_progress = (int) round(($elapsed_days / $duration_days) * 100);
                                    if ($time_progress < 0) {
                                        $time_progress = 0;
                                    }
                                    if ($time_progress > 100) {
                                        $time_progress = 100;
                                    }
                                }

                                if ($remain_amount <= 0) {
                                    $bar_class = 'bg-success';
                                    $bar_text = 'Mkopo umekamilika';
                                    $time_progress = 100;
                                } elseif ($loan_end_ts && $today_ts > $loan_end_ts) {
                                    $bar_class = 'bg-danger';
                                    $days_late = (int) floor(($today_ts - $loan_end_ts) / 86400);
                                    $bar_text = 'Nje ya mkataba - imechelewa siku ' . $days_late;
                                    $time_progress = 100;
                                } elseif ($loan_end_ts && ($loan_end_ts - $today_ts) <= (7 * 86400) && $pending_amount > 0) {
                                    $bar_class = 'bg-danger';
                                    $days_left = (int) ceil(($loan_end_ts - $today_ts) / 86400);
                                    $bar_text = 'Hatari - imebaki siku ' . max(0, $days_left);
                                } elseif ($pending_amount > 0) {
                                    $bar_class = 'bg-warning';
                                    $bar_text = 'Kuna malipo yaliyokosekana';
                                } else {
                                    $bar_class = 'bg-info';
                                    $bar_text = 'Ndani ya mkataba';
                                }
                                ?>
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <span class="fw-bold text-secondary">Progress ya Mkopo</span>
                                    <small class="text-muted"><?php echo $bar_text; ?></small>
                                </div>
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar <?php echo $bar_class; ?>" role="progressbar"
                                        style="width: <?php echo $time_progress; ?>%"
                                        aria-valuenow="<?php echo $time_progress; ?>" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap py-1">
                                <span class="fw-bold">
                                  Rejesho/Idadi ya Malipo
                                </span>
                                <?php
                                $installment_amount = (float)(@$customer_loan->restration);
                                $total_paid_amount  = (float)(@$total_deposit->total_Deposit);
                                $total_sessions     = (int)(@$customer_loan->session);
                                $paid_sessions      = 0;

                                if ($installment_amount > 0) {
                                    $paid_sessions = (int) floor($total_paid_amount / $installment_amount);
                                }

                                if ($total_sessions > 0 && $paid_sessions > $total_sessions) {
                                    $paid_sessions = $total_sessions;
                                }

                                $repayment_progress = $total_sessions > 0 ? ($paid_sessions . '/' . $total_sessions) : 'N/A';

                                $loan_type_label = '';
                                $loan_day = (int) (@$customer_loan->day);
                                if ($loan_day === 1) {
                                    $loan_type_label = ' (Siku)';
                                } elseif ($loan_day === 7) {
                                    $loan_type_label = ' (Wiki)';
                                } elseif (in_array($loan_day, [28, 29, 30, 31], true)) {
                                    $loan_type_label = ' (Mwezi)';
                                }
                                ?>
                                <strong><span class="text-secondary"><?php echo $repayment_progress . $loan_type_label; ?></span></strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap py-1">
                                Siku za Malipo Zisizolipwa
                                </span>
                                <?php
                                $loan_day_value = (int) (@$customer_loan->day);
                                $loan_session_total = (int) (@$customer_loan->session);
                                $paid_installments = 0;

                                if ((float) (@$customer_loan->restration) > 0) {
                                    $paid_installments = (int) floor((float) (@$total_deposit->total_Deposit) / (float) (@$customer_loan->restration));
                                }

                                if ($loan_session_total > 0 && $paid_installments > $loan_session_total) {
                                    $paid_installments = $loan_session_total;
                                }

                                $expected_installments = 0;
                                $loan_start_ts = strtotime((string) @$customer_loan->loan_stat_date);
                                if ($loan_start_ts && $loan_day_value > 0) {
                                    $days_since_start = (int) floor((strtotime(date('Y-m-d')) - $loan_start_ts) / 86400);
                                    if ($days_since_start >= 0) {
                                        // First installment is due after the first full interval,
                                        // not on the same day as loan_stat_date.
                                        $expected_installments = (int) floor($days_since_start / $loan_day_value);
                                    }
                                }

                                if ($loan_session_total > 0 && $expected_installments > $loan_session_total) {
                                    $expected_installments = $loan_session_total;
                                }

                                $days_not_paid = max(0, $expected_installments - $paid_installments);
                                ?>
                                <strong><span class="text-danger"><?php echo $days_not_paid; ?></span></strong>
                            </li>
                            <!-- <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap py-1">
                                <span class="fw-bold">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="me-1 icon-inline text-warning">
                                        <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                                        <line x1="12" y1="9" x2="12" y2="13"></line>
                                        <line x1="12" y1="17" x2="12.01" y2="17"></line>
                                    </svg>Missed Amount
                                </span>
                                <strong><span class="<?= (@$total_recovery->total_pending != 0.00) ? 'text-danger' : 'text-secondary' ?>">
                                    <?php echo number_format($total_recovery->total_pending ?? 0.00, 2); ?>
                                </span></strong>
                            </li> -->
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap py-1">
                                <span class="fw-bold">
                                    Jumla ya Faini
                                </span>
                                <?php $penalty_remain = (@$total_penart->total_penart - @$total_deposit_penart->total_penart_paid); ?>
                                <strong><span style="color:<?= $penalty_remain != 0.00 ? 'red' : 'inherit'; ?>">
                                    <?php echo number_format($penalty_remain, 2); ?>
                                </span></strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- SPONSOR / GUARANTOR CARD -->
           <div class="col-12 col-md-6 col-xl-4 ml-md-auto">
                <div class="card h-100">
                    <div class="card-body p-3">
                        <div class="d-flex flex-column align-items-center text-center">
                            <?php
                            $sponsor_image = base_url() . 'assets/img/male.jpeg';
                            if (!empty($sponsors) && !empty($sponsors[0]['sp_passport'])) {
                                $sponsor_image = base_url() . $sponsors[0]['sp_passport'];
                            }
                            ?>
                            <img src="<?php echo $sponsor_image; ?>" alt="Sponsor Passport"
                                class="rounded-circle p-1 bg-warning" width="130" height="130"
                                style="object-fit:cover;">
                            <div class="mt-2">
                                <h6 class="mb-0"></h6>
                            </div>
                        </div>
                        <hr class="my-2">
                        <?php if (!empty($sponsors)): ?>
                            <?php foreach ($sponsors as $i => $sponsor): ?>
                                <?php if ($i > 0): ?>
                                    <hr class="my-1">
                                <?php endif; ?>
                                <small class="text-muted fw-bold">Guarantor #<?php echo ($i + 1); ?></small>
                                <ul class="list-group list-group-flush mb-1" style="font-size:0.82rem">
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap py-1">
                                        <span class="fw-bold">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="me-1 icon-inline text-primary">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>First Name
                                        </span>
                                        <strong><span class="text-secondary"><?php echo htmlspecialchars($sponsor['sp_name']); ?></span></strong>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap py-1">
                                        <span class="fw-bold">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="me-1 icon-inline text-primary">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>Last Name
                                        </span>
                                        <strong><span class="text-secondary"><?php echo htmlspecialchars($sponsor['sp_lname']); ?></span></strong>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap py-1">
                                        <span class="fw-bold">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="me-1 icon-inline text-success">
                                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 11.5 19.79 19.79 0 0 1 1.21 3 2 2 0 0 1 3.22 1h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L7.91 8.96a16 16 0 0 0 6.29 6.29l1.12-1.56a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                            </svg>Phone
                                        </span>
                                        <strong><span class="text-secondary"><?php echo htmlspecialchars($sponsor['sp_phone_no']); ?></span></strong>
                                    </li>
                                </ul>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="text-center py-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"
                                    fill="none" stroke="#ccc" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                <p class="text-muted mt-3">No guarantors available for this loan.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>



        


         





            <div class="col-lg-12">
                <div class="card">
                    <?php echo form_open('admin/search_customerData', ['id' => 'searchCustomerForm']); ?>
                    <div class="sam">

                        <select id="customerSearchSelect" class="form-control select2" name="customer_id" required>
                            <option value="">Search Customer</option>
                            <?php foreach ($customery as $customer_datas): ?>
                                <option value="<?php echo $customer_datas->customer_id; ?>">
                                    <?php echo $customer_datas->f_name; ?>     <?php echo $customer_datas->m_name; ?>
                                    <?php echo $customer_datas->l_name; ?> / <?php echo $customer_datas->blanch_name; ?> /
                                    <?php echo $customer_datas->customer_code; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                    </div>
                    <?php echo form_close(); ?>
                    <div class="body">
                        <div class="pull-right">
                            <?php if (@$customer_loan->loan_status == 'withdrawal' || @$customer_loan->loan_status == 'out') {
                                ?>
                                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#addcontact1"><i
                                        class="icon-pencil">Deposit</i></a>
                            <?php } elseif (@$customer_loan->loan_status == 'disbarsed') {
                                ?>
                                <a href="" class="btn btn-success" data-toggle="modal" data-target="#addcontact2"><i
                                        class="icon-pencil">Withdrawal</i></a>
                            <?php } elseif (@$customer_loan->loan_status == 'done') { ?>
                                <a href="" class="btn btn-info" data-toggle="modal" data-target="#addcontact3"><i
                                        class="icon-pencil">Faini</i></a>
                            <?php } ?>

                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover j-basic-example dataTable table-custom">
                                <thead class="thead-primary">
                                    <tr>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th>Deposit</th>
                                        <th>Withdrawal</th>
                                        <th>Balance</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php @$loan_desc = $this->queries->get_total_pay_description($customer_loan->loan_id);
                                    @$remain_balance = $this->queries->get_total_remain_with($customer_loan->loan_id);
                                    @$total_recovery = $this->queries->get_total_loan_pend($customer_loan->loan_id);
                                    @$total_penart = $this->queries->get_total_penart_loan($customer_loan->loan_id);
                                    @$total_deposit_penart = $this->queries->get_total_paypenart($customer_loan->loan_id);
                                    @$end_deposit = $this->queries->get_end_deposit_time($customer_loan->loan_id);
                                    ?>

                                    <?php //print_r($end_deposit); ?>

                                    <?php foreach ($loan_desc as $payisnulls): ?>
                                        <tr>
                                            <td class="c"><?php echo $payisnulls->date_data; ?></td>
                                            <td class="c"> <?php echo $payisnulls->emply; ?>
                                                <?php if ($payisnulls->emply == TRUE) {
                                                    ?>
                                                    /
                                                <?php } else { ?>
                                                <?php } ?>
                                                <?php echo $payisnulls->description; ?>
                                                <?php if ($payisnulls->p_method == TRUE) { ?>
                                                    /<?php echo $payisnulls->account_name; ?>
                                                <?php } else { ?>

                                                <?php } ?>
                                                <?php if ($payisnulls->fee_id == TRUE || $payisnulls->fee_id == '0') {
                                                    ?>
                                                    / <?php echo $payisnulls->fee_desc; ?>
                                                    <?php echo $payisnulls->fee_percentage; ?>
                                                    <?php echo $payisnulls->symbol; ?>
                                                <?php } else { ?>
                                                <?php } ?>
                                                <?php if ($payisnulls->p_method == FALSE) { ?>
                                                <?php } else { ?>
                                                    /
                                                <?php } ?>
                                                <?php //echo @$payisnulls->description; ?>
                                                <?php echo @$payisnulls->loan_name; ?>
                                                <?php if (@$payisnulls->day == 1) {
                                                    echo "Daily";
                                                } elseif (@$payisnulls->day == 7) {
                                                    echo "Weekly";
                                                } elseif (@$payisnulls->day == 30 || @$payisnulls->day == 31 || @$payisnulls->day == 28 || @$payisnulls->day == 29) {
                                                    echo "Monthly";
                                                    ?>
                                                <?php } ?>     <?php echo $payisnulls->session; ?> / AC/No.
                                                <?php echo @$payisnulls->loan_code; ?>
                                            </td>
                                            <td>
                                                <?php if ($payisnulls->depost == TRUE) { ?>
                                                    <?php echo round(@$payisnulls->depost, 2); ?>
                                                <?php } elseif ($payisnulls->depost == FALSE) { ?>
                                                    0.00
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if (@$payisnulls->withdrow == TRUE) {
                                                    ?>
                                                    <?php echo round(@$payisnulls->withdrow, 2); ?>
                                                <?php } elseif (@$payisnulls->withdrow == FALSE) {
                                                    ?>
                                                    0.00
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if (@$payisnulls->balance == TRUE) {
                                                    ?>
                                                    <?php echo round(@$payisnulls->balance, 2); ?>
                                                <?php } elseif (@$payisnulls->balance == FALSE) {
                                                    ?>
                                                    0.00
                                                <?php } ?>
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
    /* Auto-submit search form when a customer is selected */
    $(function () {
        $('#customerSearchSelect').on('change', function () {
            var val = $(this).val();
            if (val && val !== '') {
                $('#searchCustomerForm').submit();
            }
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    var paymentMethod = document.querySelector("select[name='p_method']");
    var mobilePaymentFields = document.getElementById("mobilePaymentFields");
    var jinaWakala = document.querySelector("input[name='jina_wakala']");
  

    paymentMethod.addEventListener("change", function () {
        var selectedMethod = this.options[this.selectedIndex].text.trim().toUpperCase();

        if (["M-PESA", "TIGO-PESA", "AIRTELMONEY"].includes(selectedMethod)) {
            mobilePaymentFields.style.display = "flex";
            jinaWakala.setAttribute("required", "required");
            withdrawalCharger.setAttribute("required", "required");
        } else {
            mobilePaymentFields.style.display = "none";
            jinaWakala.removeAttribute("required");
            withdrawalCharger.removeAttribute("required");
        }
    });
});

</script>


<div class="modal fade" id="addcontact1" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h7 class="title" id="defaultModalLabel"><?php echo $customer->f_name; ?>
                    <?php echo $customer->m_name; ?> <?php echo $customer->l_name; ?><br>With Date:<?php if (@$customer_loan->loan_stat_date == TRUE) {
                               ?>
                        <?php echo @$customer_loan->loan_stat_date; ?>
                    <?php } elseif (@$customer_loan->loan_stat_date == FALSE) {
                               ?>
                        YY-MM-DD
                    <?php } ?> - End Date: <?php if (@$customer_loan->loan_end_date == TRUE) {
                           ?>
                        <?php echo substr(@$customer_loan->loan_end_date, 0, 10); ?>
                    <?php } elseif (@$customer_loan->loan_end_date == FALSE) {
                           ?>
                        YY-MM-DD
                    <?php } ?> <br> End Deposit Amount : <?php echo number_format(@$end_deposit->depost); ?> <br>Deposit
                    Time : <?php echo @$end_deposit->deposit_day; ?>
                </h7>
            </div>
            <?php echo form_open("admin/deposit_loan/{$customer->customer_id}"); ?>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-md-4 col-6">
                        <span>Total Loan</span>
                        <input type="text" class="form-control"
                            value="<?php echo number_format(@$customer_loan->loan_int); ?>" readonly>
                    </div>
                    <div class="col-md-4 col-6">
                        <span>Amount Paid</span>
                        <input type="text" class="form-control" value="<?php if (@$total_deposit->total_Deposit > @$customer_loan->loan_int) {
                            ?>
                                        <?php echo number_format(@$customer_loan->loan_int); ?>
                                         (<?php echo number_format(@$total_deposit->total_Deposit - @$customer_loan->loan_int); ?>)
                                             <?php } else { ?><?php echo number_format(@$total_deposit->total_Deposit); ?>
                                                 <?php } ?>" readonly>
                    </div>
                    <div class="col-md-4 col-12">
                        <span>Remain Debt</span>
                        <input type="text" class="form-control" value="<?php if (@$total_deposit->total_Deposit > @$customer_loan->loan_int) {
                            ?>
                                                 0.00
                                                 <?php } else { ?><?php echo number_format(@$customer_loan->loan_int - @$total_deposit->total_Deposit); ?>
                                                <?php } ?>" readonly>
                    </div>
                    <div class="col-md-6 col-6">

                        <?php if ($customer_loan->loan_status == 'withdrawal') {
                            ?>
                            <span>Recovery Amount</span>
                            <input type="text" class="form-control"
                                value="<?php echo number_format($total_recovery->total_pending); ?>.00" readonly
                                style="color:red">
                        <?php } elseif ($customer_loan->loan_status == 'out') {
                            ?>
                            <span style="color:red;">Default Amount</span>
                            <input type="text" class="form-control"
                                value="<?php echo number_format($out_stand->total_out); ?>.00" readonly style="color:red">
                        <?php } else { ?>
                            <span>Recovery Amount</span>
                            <input type="text" class="form-control" value="0.00" readonly style="color:red">
                        <?php } ?>

                    </div>

                    <div class="col-md-6 col-6">
                        <span>Penalt</span>
                        <input type="text" class="form-control"
                            value="<?php echo number_format($total_penart->total_penart - $total_deposit_penart->total_penart_paid); ?>.00"
                            readonly style="color:red">
                    </div>
                    <div class="col-md-6 col-6">
                        <span>Select Account:</span>
                        <select type="number" class="form-control" name="p_method" required>
                            <option value="">---Select Account---</option>
                            <?php foreach ($acount as $acounts): ?>
                                <option value="<?php echo $acounts->trans_id; ?>"><?php echo $acounts->account_name; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="col-md-6 col-6">
                        <span>Deposit </span>
                        <!-- <input type="number" class="form-control" name="depost" placeholder="Enter Deposit Amount" required>  -->
                        <input x-mask:dynamic="$money($input)" name="depost" class="form-control">
                    </div>
                   
    <div id="mobilePaymentFields" style="display: none;">
    <div class="col-md-6 col-6">
        <span> Wakala</span>
        <input type="text" class="form-control" name="jina_wakala" placeholder="Jina la Wakala">
    </div>
   
</div>
                    <input type="hidden" value="<?php echo $customer->customer_id; ?>" name="customer_id">
                    <input type="hidden" value="<?php echo $customer->comp_id; ?>" name="comp_id">
                    <input type="hidden" value="<?php echo $customer->blanch_id; ?>" name="blanch_id">
                    <input type="hidden" value="<?php echo $customer_loan->loan_id; ?>" name="loan_id">
                    <input type="hidden" value="LOAN RETURN" name="description">
                    <?php $date = date("Y-m-d"); ?>
                    <div class="col-md-12 col-12">
                        <span>Deposit Date</span>
                        <input type="date" class="form-control" value="<?php echo $date; ?>" name="deposit_date"
                            required>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Deposit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>



<div class="modal fade" id="addcontact2" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel"><?php echo $customer->f_name; ?>
                    <?php echo $customer->m_name; ?> <?php echo $customer->l_name; ?>
                </h6>
            </div>
            <?php echo form_open("admin/create_withdrow_balance/{$customer->customer_id}"); ?>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-md-6 col-6">
                        <span>Total Withdrawal</span>
                        <input type="number" class="form-control" name="withdrow"
                            value="<?php echo $remain_balance->balance; ?>" readonly>
                    </div>
                    <div class="col-md-6 col-6">
                        <span>Select Account:</span>
                        <select type="number" class="form-control" name="method" required>
                            <option value="">---Select Account---</option>
                            <?php foreach ($acount as $acounts): ?>
                                <option value="<?php echo $acounts->trans_id; ?>"><?php echo $acounts->account_name; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <input type="hidden" value="CASH WITHDRAWALS" name="description">
                    <input type="hidden" value="withdrawal" name="loan_status">
                    <input type="hidden" value="<?php echo $customer_loan->loan_id; ?>" name="loan_id">

                    <input type="hidden" value="<?php echo $customer->customer_id; ?>" name="customer_id">
                    <input type="hidden" value="<?php echo $customer->comp_id; ?>" name="comp_id">
                    <input type="hidden" value="<?php echo $customer->blanch_id; ?>" name="blanch_id">
                    <!-- <div class="col-md-4 col-6"> -->
                    <!-- <span>Code</span> -->
                    <!-- <input type="hidden" class="form-control" name="code" value="1" placeholder="Enter Code" required>      -->
                    <!--  </div> -->
                    <?php $date = date("Y-m-d"); ?>
                    <div class="col-md-6 col-6">
                        <span>withdrawal Date</span>
                        <input type="date"  class="form-control" value="<?php echo $date; ?>" name="with_date"
                            required>
                    </div>
                    <!-- <div class="col-md-6 col-6">
                        <span>code</span>
                        <input type="number" autocomplete="off" class="form-control" placeholder="Enter code"
                            name="code" required>
                    </div> -->

                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Withdrawal</button>
                <!-- <a href="</?php echo base_url("admin/get_loan_code_resend/{$customer->customer_id}") ?>"
                    class="btn btn-primary">Resend Code</a> -->
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>



<div class="modal fade" id="addcontact3" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Taarifa Ya Faini</h6>
            </div>
            <?php echo form_open("admin/samehe_faini/{$customer->customer_id}"); ?>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-md-6 col-6">
                        <span>Jumla ya Faini </span>
                        <input type="text" style="color: red" readonly class="form-control"
                            value="<?php echo number_format($total_penart->total_penart); ?>.00" required>
                    </div>
                    <div class="col-md-6 col-6">
                        <span>Faini Aliyo lipa </span>
                        <input type="text" style="color: red" readonly class="form-control"
                            value="<?php echo number_format($total_deposit_penart->total_penart_paid); ?>.00" required>
                    </div>
                    <div class="col-md-12 col-12">
                        <span>Faini Iliyo Baki Kulipwa </span>
                        <input type="text" style="color: red" readonly class="form-control"
                            value="<?php echo number_format($total_penart->total_penart - $total_deposit_penart->total_penart_paid); ?>.00"
                            required>
                    </div>

                    <input type="hidden" value="<?php echo $customer_loan->loan_id; ?>" name="loan_id">
                    <input type="hidden" value="<?php echo $customer->customer_id; ?>" name="customer_id">
                    <input type="hidden" value="<?php echo $customer->comp_id; ?>" name="comp_id">
                    <input type="hidden" value="<?php echo $customer->blanch_id; ?>" name="blanch_id">


                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Samehe</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Funga</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>