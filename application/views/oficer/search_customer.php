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
                            
                            <li class="breadcrumb-item active"><?php echo $this->lang->line("applyloan_menu") ?></li>
                            <li class="breadcrumb-item active"><?php echo $this->lang->line("guarantorsinfo_menu"); ?></li>
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

            <?php if(@$sponser->customer_id == TRUE){ ?>
            <div class="modal fade" id="confirmSponserModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Uthibitisho wa Mdhamini</h5>
                        </div>
                        <div class="modal-body">
                            <p style="margin-bottom:0;">
                                Mteja <strong><?php echo $customer->f_name; ?> <?php echo $customer->m_name; ?> <?php echo $customer->l_name; ?></strong>,
                                mdhamini wake wa mkopo uliopita alikuwa
                                <strong><?php echo $sponser->sp_name; ?> <?php echo $sponser->sp_mname; ?> <?php echo $sponser->sp_lname; ?></strong>.
                                Je anaendelea kudhamini mkopo huu mwingine?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Ndio</button>
                            <a href="<?php echo base_url('oficer/delete_from_sponser/'.$customer->customer_id); ?>" class="btn btn-danger">Hapana</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>

            <div class="row clearfix g-4 justify-content-center">
                <div class="col-lg-5 col-md-6">
                    <div class="card h-100">
                        <div class="body text-center p-3">
                            <h6 class="mb-2">Customer Details</h6>
                            <div class="profile-image mb-2">
                                <img src="<?php echo base_url().'assets/img/male.jpeg'; ?>" class="rounded-circle img-thumbnail" alt="Customer image" style="width: 110px;height: 110px;object-fit:cover;">
                            </div>
                            <p class="mb-1"><small class="text-muted d-block">Full Name</small><strong><?php echo $customer->f_name; ?> <?php echo $customer->m_name; ?> <?php echo $customer->l_name; ?></strong></p>
                            <p class="mb-0"><small class="text-muted d-block">Phone Number</small><strong><?php echo $customer->phone_no; ?></strong></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-md-6">
                    <div class="card h-100">
                        <div class="body text-center p-3">
                            <h6 class="mb-2">Sponsor Details</h6>
                            <div class="profile-image mb-2">
                                <img src="<?php echo !empty($sponser->sp_passport) ? base_url($sponser->sp_passport) : base_url().'assets/img/male.jpeg'; ?>" class="rounded-circle img-thumbnail" alt="Sponsor passport" style="width: 110px;height: 110px;object-fit:cover;">
                            </div>
                            <?php if (!empty($sponser->customer_id)): ?>
                                <p class="mb-1"><small class="text-muted d-block">Full Name</small><strong><?php echo $sponser->sp_name; ?> <?php echo $sponser->sp_mname; ?> <?php echo $sponser->sp_lname; ?></strong></p>
                                <p class="mb-1"><small class="text-muted d-block">Phone Number</small><strong><?php echo $sponser->sp_phone_no; ?></strong></p>
                                <span class="badge <?php echo !empty($sponser->sp_passport) ? 'badge-success' : 'badge-warning'; ?>"><?php echo !empty($sponser->sp_passport) ? 'Passport Uploaded' : 'No Passport Uploaded'; ?></span>
                            <?php else: ?>
                                <small class="text-muted">No sponsor information available</small>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                  
             

                <?php if(@$sponser->customer_id == TRUE){ ?>
               
                <div class="col-lg-12">
                    <div class="card">
                          <div class="body">
                            <div class="header">
                              <h2><?php echo $this->lang->line("Guarantors_menu") ?></h2>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover j-basic-example dataTable table-custom">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th><?php echo $this->lang->line("full_name_menu") ?></th>
                                            <th><?php echo $this->lang->line("phone_number_menu") ?></th>
                                            <th><?php echo $this->lang->line("relationship") ?></th>
                                            <th>Passport</th>
                                            <th><?php echo $this->lang->line("action_menu") ?></th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach($sponsers_data as $sponsers_datas): ?>
                                        <tr>
                                            <td><?php echo $sponsers_datas->sp_name; ?> <?php echo $sponsers_datas->sp_mname; ?> <?php echo $sponsers_datas->sp_lname; ?></td>
                                            <td><?php echo $sponsers_datas->sp_phone_no; ?></td>
                                            <td><?php echo $sponsers_datas->sp_relation; ?></td>
                                            <td>
<?php if (!empty($sponsers_datas->sp_passport)): ?>
    
    <div class="passport-card" onclick="showPassport('<?php echo base_url($sponsers_datas->sp_passport); ?>')">
        <img src="<?php echo base_url($sponsers_datas->sp_passport); ?>" alt="Passport">
        
        <div class="passport-overlay">
            <span class="view-text">View</span>
        </div>
    </div>

<?php else: ?>
    <span class="badge badge-secondary">No Passport</span>
<?php endif; ?>
</td>
                                </tr>

                <div class="modal fade" id="addcontact1<?php echo $sponsers_datas->sp_id; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel"><?php echo $this->lang->line("update_menu") ?></h6>
            </div>
            <?php echo form_open_multipart("oficer/modify_sponser/{$sponsers_datas->sp_id}/{$sponsers_datas->customer_id}"); ?>
            <div class="modal-body">
                <div class="row clearfix">
                             <div class="col-lg-4 col-6">
                          <span><?php echo $this->lang->line("first_name_menu"); ?>:</span>
                            <input type="text" class="form-control" id="sp_name" value="<?php echo $sponsers_datas->sp_name ?>" placeholder="First name" name="sp_name" autocomplete="off">
                        </div>
                               <div class="col-lg-4 col-6">
                              <span><?php echo $this->lang->line("midle_name_menu"); ?>:</span>
                                <input type="text" class="form-control" id="sp_mname" value="<?php echo $sponsers_datas->sp_mname ?>" placeholder="Enter Middle name" name="sp_mname" autocomplete="off">
                            </div>
                                 <div class="col-lg-4 col-6">
                      <span><?php echo $this->lang->line("last_name_menu"); ?>:</span>
                        <input type="text" class="form-control" value="<?php echo $sponsers_datas->sp_lname ?>" id="sp_lname" placeholder="Enter Last name" name="sp_lname" autocomplete="off">
                    </div>
                    <div class="col-lg-6 col-6">
                      <span><?php echo $this->lang->line("phone_number_menu") ?>:</span>  
                        <input type="number" class="form-control" value="<?php echo $sponsers_datas->sp_phone_no ?>" id="sp_phone_no" placeholder="Enter Phone number" name="sp_phone_no" autocomplete="off">
                    </div>
                   
                     <div class="col-lg-6 col-12">
                      <span><?php echo $this->lang->line("relationship") ?>:</span>  
                        <input type="text" class="form-control" id="sp_relation" value="<?php echo $sponsers_datas->sp_relation ?>" placeholder="Enter Reationship With Customer" name="sp_relation" autocomplete="off">
                    </div>
                                        <div class="col-lg-12 col-12">
                                            <span>Guarantor Passport:</span>
                                                <input type="file" class="form-control sponsor-passport-input" name="sp_passport" accept="image/*">
                                                <input type="hidden" name="sp_passport_cropped" class="sp-passport-cropped" value="">
                                                <input type="hidden" name="old_sp_passport" value="<?php echo $sponsers_datas->sp_passport; ?>">
                                                <?php if (!empty($sponsers_datas->sp_passport)): ?>
                                                    <div style="margin-top:8px;">
                                                        <a href="<?php echo base_url($sponsers_datas->sp_passport); ?>" target="_blank">
                                                            <img src="<?php echo base_url($sponsers_datas->sp_passport); ?>" alt="Current guarantor passport" class="img-thumbnail" style="width:120px;height:120px;object-fit:cover;">
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                        </div>
                               
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><?php echo $this->lang->line("update_menu"); ?></button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line("close_menu") ?></button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

                               <?php endforeach; ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <?php }else{
                 ?>

                 <?php } ?>


                                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><?php echo $this->lang->line("guarantorsinfo_menu"); ?></h2>
                        </div>
                        <div class="body">

            <?php echo form_open_multipart(@$sponser->customer_id == TRUE ? "oficer/modify_sponser/{$sponser->sp_id}/{$customer->customer_id}" : "oficer/create_sponser/{$customer->customer_id}"); ?>
                            <div class="row">

    <div class="col-lg-4 col-6">
      <span><?php echo $this->lang->line("first_name_menu"); ?>:</span>
                <input type="text" class="form-control" id="sp_name" placeholder="<?php echo $this->lang->line("first_name_menu"); ?>" name="sp_name" autocomplete="off" value="<?php echo @$sponser->sp_name; ?>">
    </div>

    <div class="col-lg-4 col-6">
      <span><?php echo $this->lang->line("midle_name_menu"); ?>:</span>
                <input type="text" class="form-control" id="sp_mname" placeholder="<?php echo $this->lang->line("midle_name_menu"); ?>" name="sp_mname" autocomplete="off" value="<?php echo @$sponser->sp_mname; ?>">
    </div>

    <input type="hidden" name="customer_id"  id="customer_id" value="<?php echo $customer->customer_id; ?>">
    <input type="hidden" name="comp_id" id="comp_id" value="<?php echo $customer->comp_id; ?>">

    <div class="col-lg-4 col-6">
      <span><?php echo $this->lang->line("last_name_menu"); ?>:</span>
                <input type="text" class="form-control" id="sp_lname" placeholder="<?php echo $this->lang->line("last_name_menu"); ?>" name="sp_lname" autocomplete="off" value="<?php echo @$sponser->sp_lname; ?>">
    </div>
    <div class="col-lg-6 col-6">
      <span><?php echo $this->lang->line("phone_number_menu") ?>:</span>  
                <input type="number" class="form-control" id="sp_phone_no" placeholder="<?php echo $this->lang->line("phone_number_menu") ?>" name="sp_phone_no" autocomplete="off" value="<?php echo @$sponser->sp_phone_no; ?>">
    </div>
   
     <div class="col-lg-6 col-12">
      <span><?php echo $this->lang->line("relationship") ?></span>  
                <input type="text" class="form-control" id="sp_relation" placeholder="<?php echo $this->lang->line("relationship") ?>" name="sp_relation" autocomplete="off" value="<?php echo @$sponser->sp_relation; ?>">
    </div>

        <div class="col-lg-12 col-12">
            <span>Guarantor Passport:</span>
                                <input type="file" class="form-control sponsor-passport-input" id="sp_passport" name="sp_passport" accept="image/*" <?php echo (@$sponser->customer_id == TRUE ? '' : 'required'); ?>>
                                <input type="hidden" name="sp_passport_cropped" class="sp-passport-cropped" value="">
                                <input type="hidden" name="old_sp_passport" value="<?php echo @$sponser->sp_passport; ?>">
                                <?php if (!empty($sponser->sp_passport)): ?>
                                    <div style="margin-top:8px;">
                                        <a href="<?php echo base_url($sponser->sp_passport); ?>" target="_blank">
                                            <img src="<?php echo base_url($sponser->sp_passport); ?>" alt="Current guarantor passport" class="img-thumbnail" style="width:120px;height:120px;object-fit:cover;">
                                        </a>
                                    </div>
                                <?php endif; ?>
        </div>
      </div>
    </div>
    <br>

    <div class="text-center">
        <button type="submit" class="btn btn-primary"><i class="icon-drawer"><?php echo (@$sponser->customer_id == TRUE ? $this->lang->line("update_menu") : $this->lang->line("save_menu")); ?></i></button>
     <?php if (@$data_loan_desc->loan_status == 'open' || @$data_loan_desc->loan_status == 'reject' || @$data_loan_desc->loan_status == 'out' || @$data_loan_desc->loan_status == 'withdrawal') {
      ?>
   <a href="<?php echo base_url("oficer/loan_applicationForm/{$customer->customer_id}"); ?>" class="btn btn-primary"><?php echo $this->lang->line("skip_menu"); ?></a>
  <?php }else{ ?>
    <a href="<?php echo base_url("oficer/loan_applicationForm/{$customer->customer_id}"); ?>" class="btn btn-primary"><?php echo $this->lang->line("skip_menu"); ?></a>
    <?php } ?>
    </div>
                            
                            <?php echo form_close();  ?>
                        </div>
                    </div>
                </div> 

        
                  
                    
                </div>
            </div>
        </div>
   

<div class="modal fade" id="sponserPassportCropModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crop Guarantor Passport</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-6 col-6">
                            <img id="sponser-passport-crop-image" style="max-width:100%;">
                        </div>
                        <div class="col-md-6 col-6">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="cropSponserPassportBtn">Crop</button>
            </div>
        </div>
    </div>
</div>




<?php include('incs/footer.php'); ?>



<script>
    function getDate(data){
  let now = new Date();
  let bod = (new Date(data));

  let age = now.getFullYear() - bod.getFullYear();
   let _age = document.querySelector("#age");
   _age.value = age;
 //alert(age)
}
</script>


<script>
$(function(){
    var sponserCropModal = $('#sponserPassportCropModal');
    var cropImage = document.getElementById('sponser-passport-crop-image');
    var sponserCropper = null;
    var activeInput = null;
    var activeForm = null;

    $('body').on('change', '.sponsor-passport-input', function(e){
        var files = e.target.files;
        if (!files || files.length === 0) {
            return;
        }

        var file = files[0];
        activeInput = $(this);
        activeForm = activeInput.closest('form');

        var done = function(url){
            cropImage.src = url;
            sponserCropModal.modal('show');
        };

        if (URL) {
            done(URL.createObjectURL(file));
        } else if (FileReader) {
            var reader = new FileReader();
            reader.onload = function(event){
                done(event.target.result);
            };
            reader.readAsDataURL(file);
        }
    });

    sponserCropModal.on('shown.bs.modal', function(){
        sponserCropper = new Cropper(cropImage, {
            aspectRatio: 1,
            viewMode: 2,
            preview: '.preview'
        });
    }).on('hidden.bs.modal', function(){
        if (sponserCropper) {
            sponserCropper.destroy();
            sponserCropper = null;
        }
    });

    $('#cropSponserPassportBtn').click(function(){
        if (!sponserCropper || !activeForm) {
            return;
        }

        var canvas = sponserCropper.getCroppedCanvas({
            width: 600,
            height: 600
        });

        canvas.toBlob(function(blob){
            var reader = new FileReader();
            reader.onloadend = function(){
                activeForm.find('.sp-passport-cropped').val(reader.result);
                sponserCropModal.modal('hide');
            };
            reader.readAsDataURL(blob);
        }, 'image/jpeg', 0.9);
    });
});
</script>


<script>
$(document).ready(function(){
<?php if(@$sponser->customer_id == TRUE){ ?>
$('#confirmSponserModal').modal({
    backdrop: 'static',
    keyboard: false
});
$('#confirmSponserModal').modal('show');
<?php } ?>

$('#blanch').change(function(){
var blanch_id = $('#blanch').val();
//alert(blanch_id)
if(blanch_id != ''){

$.ajax({
url:"<?php echo base_url(); ?>admin/fetch_employee_blanch",
method:"POST",
data:{blanch_id:blanch_id},
success:function(data)
{
$('#empl').html(data);
//$('#district').html('<option value="">All</option>');
}
});
}
else
{
$('#empl').html('<option value="">Select Employee</option>');
//$('#district').html('<option value="">All</option>');
}
});



// $('#customer').change(function(){
// var customer_id = $('#customer').val();
//  //alert(customer_id)
// if(customer_id != '')
// {
// $.ajax({
// url:"<?php echo base_url(); ?>admin/fetch_data_vipimioData",
// method:"POST",
// data:{customer_id:customer_id},
// success:function(data)
// {
// $('#loan').html(data);
// //$('#malipo_name').html('<option value="">select center</option>');
// }
// });
// }
// else
// {
// $('#loan').html('<option value="">Select Active loan</option>');
// //$('#malipo_name').html('<option value="">chagua vipimio</option>');
// }
// });

// $('#social').change(function(){
//  var district_id = $('#social').val();
//  if(district_id != '')
//  {
//   $.ajax({
//    url:"<?php echo base_url(); ?>user/fetch_data_malipo",
//    method:"POST",
//    data:{district_id:district_id},
//    success:function(data)
//    {
//     $('#malipo_name').html(data);
//     //$('#malipo').html('<option value="">chagua malipo</option>');
//    }
//   });
//  }
//  else
//  {
//   //$('#vipimio').html('<option value="">chagua vipimio</option>');
//   $('#malipo_name').html('<option value="">chagua vipimio</option>');
//  }
// });


});
</script>