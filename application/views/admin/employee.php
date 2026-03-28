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
                            <li class="breadcrumb-item active">Employee</li>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Register Employee</h2>
                        </div>
                        <div class="body">
                            <?php echo form_open("admin/create_employee") ?>
                            <div class="row">
                                <div class="col-lg-3 form-group-sub">
                                    <label class="form-control-label">*Jina Kamili:</label>
                                <input type="text" name="empl_name" placeholder="Full name" autocomplete="off" class="form-control" required>
                                </div>
                                <div class="col-lg-3 form-group-sub">
                                    <label class="form-control-label">*Nambari ya Simu:</label>
                                    <input type="number" name="empl_no" placeholder="Nambari ya Simu" autocomplete="off" class="form-control" required>
                                </div>
                                <div class="col-lg-3 form-group-sub">
                                    <label class="form-control-label">*Barua Pepe:</label>
                                    <input type="email" name="empl_email" placeholder="Barua Pepe" autocomplete="off" class="form-control input-sm" required>
                                </div>
                                <input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">
                                <input type="hidden" name="ac_status" value="empl">
                                <div class="col-lg-3 form-group-sub">
                                    <label  class="form-control-label">*Tawi:</label>
                            <select type="number" name="blanch_id" class="form-control select2" required class="form-control ">
                                <option value="">Chagua Tawi</option>
                                <?php foreach ($blanch as $blanchs): ?>
                                <option value="<?php echo $blanchs->blanch_id; ?>"><?php echo $blanchs->blanch_name; ?></option>
                                <?php endforeach; ?>
                            </select>
                                </div>

                                <div class="col-lg-3 form-group-sub">
                                    <label  class="form-control-label">*Cheo:</label>
                                <select type="text" name="position_id" class="form-control select2" required>
                                <option value="">Chagua Cheo</option>
                                <?php foreach ($position as $positions): ?>
                                <option value="<?php echo $positions->position_id; ?>"><?php echo $positions->position; ?></option>
                                <?php endforeach; ?>
                            </select>
                                </div>
                                <!-- <input type="hidden" name="position_id" value="1">
 -->                                <div class="col-lg-3 form-group-sub">
                                    <label  class="form-control-label">*Jina la Mtumiaji:</label>
                                <input type="text" name="username" placeholder="Jina la Mtumiaji" autocomplete="off" class="form-control" required>
                                </div>

                                <div class="col-lg-3 form-group-sub">
                                    <label  class="form-control-label">*Jinsia:</label>
                                <select type="text" name="empl_sex" class="form-control" data-required="true">
                                <option value="">Chagua Jinsia</option>
                                <option value="male">Mwanaume</option>
                                <option value="female">Mwanamke</option>
                             </select>
                                </div>
                                <input type="hidden" name="salary" value="0">

                                <input type="hidden" name="pays" value="no">
                            <input type="hidden" name="pay_nssf" value="no">
                            <input type="hidden" name="bank_account" value="CASH">
                                <input type="hidden" name="account_no" value="0">
                                <div class="col-lg-3 form-group-sub">
                                    <label class="form-control-label">*Password:</label>
                                    <input type="password" name="password" id="password" minlength="6" placeholder="Password" autocomplete="new-password" class="form-control" required>
                                    <small id="password_status" class="text-muted"></small>
                                </div>
                                <div class="col-lg-3 form-group-sub">
                                    <label class="form-control-label">*Confirm Password:</label>
                                    <input type="password" name="confirm_password" id="confirm_password" minlength="6" placeholder="Confirm Password" autocomplete="new-password" class="form-control" required>
                                    <small id="confirm_status" class="text-muted"></small>
                                </div>
                                <br>
                                </div>
                            </div>
                                <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="icon-drawer">Hifadhi</i></button>
                                </div>
                            
                            <?php echo form_close();  ?>
                        </div>
                    </div>
                </div>
             
            </div>
        </div>
    </div>
</div>

<?php include('incs/footer.php'); ?>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var form = document.querySelector('form');
    var password = document.getElementById('password');
    var confirmPassword = document.getElementById('confirm_password');
    var passwordStatus = document.getElementById('password_status');
    var confirmStatus = document.getElementById('confirm_status');

    if (!form || !password || !confirmPassword || !passwordStatus || !confirmStatus) {
        return;
    }

    function validatePasswordStatus() {
        var passLen = password.value.length;
        if (passLen < 6) {
            passwordStatus.textContent = 'Idadi ya herufi: ' + passLen + ' (angalau 6)';
            passwordStatus.className = 'text-danger';
        } else {
            passwordStatus.textContent = 'Idadi ya herufi: ' + passLen + ' (Sawa)';
            passwordStatus.className = 'text-success';
        }
    }

    function validatePasswordMatch() {
        if (confirmPassword.value.length === 0) {
            confirmStatus.textContent = '';
            confirmPassword.setCustomValidity('');
            return;
        }

        if (password.value !== confirmPassword.value) {
            confirmPassword.setCustomValidity('Nenosiri halifanani');
            confirmStatus.textContent = 'Hali: Nenosiri halifanani';
            confirmStatus.className = 'text-danger';
        } else {
            confirmPassword.setCustomValidity('');
            confirmStatus.textContent = 'Hali: Nenosiri linafanana';
            confirmStatus.className = 'text-success';
        }
    }

    password.addEventListener('input', function () {
        validatePasswordStatus();
        validatePasswordMatch();
    });
    confirmPassword.addEventListener('input', validatePasswordMatch);
    form.addEventListener('submit', function () {
        validatePasswordStatus();
        validatePasswordMatch();
    });

    validatePasswordStatus();
});
</script>


