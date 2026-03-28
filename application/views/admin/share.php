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
                            <li class="breadcrumb-item active">Share Holder</li>
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
                            <h2>Sajili Wenye Hisa</h2>
                        </div>
                        <div class="body">
                            <?php echo form_open("admin/create_shareHolder") ?>
                            <div class="row">
                              <div class="col-md-4">
                                    <span>* Jina Kamili:</span>
                                    <input type="text" name="share_name" placeholder="Jina Kamili" autocomplete="off" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <span>* Nambari ya Simu:</span>
                                    <input type="number" name="share_mobile" placeholder="Nambari ya Simu" autocomplete="off" class="form-control" required>
                                </div>
                                <input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">
                                <div class="col-lg-4">
                                    <span>* Barua Pepe:</span>
                                    <input type="email" name="share_email" placeholder="Barua Pepe" autocomplete="off" class="form-control" required>
                                </div>

                                <div class="col-md-6">
                                    <span>*Jinsia:</span>
                            <select type="text" name="share_sex" class="form-control input-sm" data-required="true">
                                <option value="">Chagua Jinsia</option>
                                <option value="male">Mwanaume</option>
                                <option value="female">Mwanamke</option>
                            </select>
                                </div>
                                <div class="col-md-6">
                                    <span>*Tarehe ya Kuzaliwa:</span>
                                    <input type="date" name="share_dob" placeholder="Tarehe ya Kuzaliwa" autocomplete="off" class="form-control" required>
                                </div>
                                </div>
                                
                               
                                <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="icon-drawer">Hifadhi</i></button>
                                </div>
                            
                            <?php echo form_close();  ?>
                        </div>
                    </div>
                </div>


                <div class="col-lg-12">
                    <div class="card">
                         <div class="header">
                            <h2>Orodha ya Wamiliki wa Hisa</h2>    
                             </div>
                          <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example dataTable table-custom">
                                    <thead class="thead-primary">
                                        <tr>
                                            <tr>
                                                <th>S/No.</th>
                                                <th>Jina la Mshiriki</th>
                                                <th>Nambari ya Simu</th>
                                                <th>Barua Pepe</th>
                                                <th>Jinsia</th>
                                                <th>Tarehe ya Kuzaliwa</th>
                                                <th>Kitendo</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                             <?php $no = 1; ?>
                                    <?php foreach($share  as $shares): ?>
                                              <tr>
                                    <td><?php echo $no++; ?>.</td>
                                    <td><?php echo $shares->share_name ?></td>
                                    <td><?php echo $shares->share_mobile ?></td>
                                    <td><?php echo $shares->share_email ?></td>
                                    <td><?php echo $shares->share_sex; ?></td>
                                    <td><?php echo $shares->share_dob ?></td>
                                <td>

                                     <a href="" class="btn btn-sm btn-icon btn-pure btn-primary on-default m-r-5 button-edit"
                                            data-toggle="modal" data-target="#addcontact1<?php echo $shares->share_id; ?>" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                            <a href="<?php echo base_url("admin/delete_share/{$shares->share_id}") ?>" class="btn btn-sm btn-icon btn-pure btn-danger on-default button-remove"
                                            data-toggle="tooltip" data-original-title="Remove" onclick="return confirm('Are You Sure?')"><i class="icon-trash" aria-hidden="true"></i></a>    
                                    </td>                                                                                   
</tr>
    <div class="modal fade" id="addcontact1<?php echo $shares->share_id; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Hariri Mshiriki wa Hisa</h6>
            </div>
            <?php echo form_open("admin/modify_shareholder/{$shares->share_id}"); ?>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-md-4">
                                    <span>* Jina Kamili:</span>
                                    <input type="text" name="share_name" placeholder="Jina Kamili" autocomplete="off" value="<?php echo $shares->share_name ?>" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <span>* Nambari ya Simu:</span>
                                    <input type="number" name="share_mobile" placeholder="Nambari ya Simu" value="<?php echo $shares->share_mobile ?>" autocomplete="off" class="form-control" required>
                                </div>
                                
                                <div class="col-md-4">
                                    <span>* Barua Pepe:</span>
                                    <input type="email" name="share_email" placeholder="Barua Pepe" autocomplete="off" value="<?php echo $shares->share_email ?>" class="form-control" required>
                                </div>

                                <div class="col-md-6">
                                    <span>* Jinsia:</span>
                            <select type="text" name="share_sex" class="form-control input-sm" data-required="true">
                                <option value="<?php echo $shares->share_sex; ?>"><?php echo $shares->share_sex; ?></option>
                                <option value="male">Mwanaume</option>
                                <option value="female">Mwanamke</option>
                            </select>
                                </div>
                                <div class="col-md-6">
                                    <span>* Tarehe ya Kuzaliwa:</span>
                                    <input type="date" name="share_dob" placeholder="Tarehe ya Kuzaliwa" autocomplete="off" value="<?php echo $shares->share_dob ?>" class="form-control" required>
                                </div>
                       </div>
                  </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
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


             
            </div>
        </div>
    </div>
</div>

<?php include('incs/footer.php'); ?>


