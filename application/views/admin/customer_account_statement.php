
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $compdata->comp_name; ?> |Ripoti ya Akaunti ya Mkopo
 </title>
</head>
<body>

<div id="container">
  <style>
    .display{
      display: flex;
      
    }
  </style>
     <style>
             .c {
               text-transform: uppercase;
               }
                
      </style>
<table  style="border: none">
<tr style="border: none">
<td style="border: none">


  <?php @$customer_loan = $this->queries->get_loan_account_statement($loan_id);
     @$total_deposit = $this->queries->get_total_amount_paid_loan($loan_id);

    // @$out_stand = $this->queries->get_outstand_loan_customer($customer_loan->loan_id);
   ?>
<div style="width: 20%;">
<img src="<?php echo base_url().'assets/img/'.$compdata->comp_logo ?>" style="width: 100px;height: 80px;">
</div> 

</td>
<td style="border: none">
<div class="pull">
<p style="font-size:14px;" class="c"><b> <?php echo $compdata->comp_name; ?></b><br>
<b><?php echo $compdata->adress; ?></b> <br>
<?php //$day = date("d-m-Y"); ?>
</p>
<p style="font-size:12px;text-align:center;" class="c">RIPOTI YA AKAUNTI YA MKOPO</p>
<p style="font-size:12px;text-align:center;" class="c"><b><?php echo $customer_data->f_name; ?> </b> <b><?php echo $customer_data->m_name; ?></b> <b> <?php echo $customer_data->l_name; ?> </b> / <b> <?php echo $customer_data->phone_no; ?></b></p>
</div>
</td>
<td>
  <p>Kiasi cha mkopo : <b> <?php echo number_format($customer_data->loan_aprove); ?> </b> </p>
  <p>Riba : <?php echo $customer_data->interest_formular; ?>%</p>
  <p>Aina ya Marejesho : <b>

  <?php 
  if ($customer_data->day == '1') {
    echo "KILA SIKU";
  }elseif ($customer_data->day == '7') {
   echo "WIKI";
  }elseif ($customer_data->day == '30') {
     echo "MWEZI";
  }
   ?>
  </b> 
</p>
  <p>Idadi ya Marejesho : <b><?php echo $customer_data->session; ?></b> </p>
  <p>Mkopo na Riba : <b><?php echo number_format($customer_data->loan_int); ?></b> </p>
  <p>Jumla ya Malipo : <b><?php echo number_format($total_deposit->total_Deposit) ?></b>  </p>
  <p>Deni: <b><?php echo number_format(($customer_loan->loan_int) - ($total_deposit->total_Deposit) ) ?></b></p>
</td>
</tr>
</table>

    
 
  <div id="body">
  <style> 
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 5px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

</style>
</head>
<body>
 <hr>

<?php  @$loan_desc = $this->queries->get_total_pay_description_acount_statement($loan_id); ?>
<table>
  <thead>  
    <tr>
   
     <th style="font-size:12px;border: none;">Tarehe</th>
     <th style="font-size:12px;border: none;">Afisa</th>
     <th style="font-size:12px;border: none;">Mkopo</th>
     <th style="font-size:12px;border: none;">Mkopo & Riba</th>
     <th style="font-size:12px;border: none;">Malipo</th>
     <th style="font-size:12px;border: none;">Deni</th>

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

</body>
</html>




