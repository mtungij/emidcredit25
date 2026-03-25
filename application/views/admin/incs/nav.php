<div id="wrapper">

    <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-btn">
                <button type="button" class="btn-toggle-offcanvas"><i class="icon-list"></i></button>
            </div>

            <div class="navbar-brand">
                <a href=""><img src="<?php echo base_url() ?>assets/img/mikopo.png" alt="Lucid Logo" class="img-responsive logo"></a>                
            </div>
            <?php 
  @$comp_id = $this->session->userdata('comp_id');
  $customer_search = $this->queries->get_allcustomerDatagroup($comp_id);
             ?>
            <div class="navbar-right">
                <form id="navbar-search" class="navbar-form search-form" style="width:300px;">
                    
                   <select type="number" class="form-control select2" name=""onchange="location = this.value;">
                       <option value="">Search customer</option>
                        <?php foreach ($customer_search as $customer_searchs): ?>
                       <option value="<?php echo base_url("admin/customer_profile/{$customer_searchs->customer_id}"); ?>"><?php echo $customer_searchs->f_name; ?> <?php echo $customer_searchs->m_name; ?> <?php echo $customer_searchs->l_name; ?> - (<?php echo $customer_searchs->blanch_name; ?>)</option>
                       <?php endforeach ?>
                   </select>
               </form>                

                <div id="navbar-menu">
                    <ul class="nav navbar-nav nav-actions">
                        <li class="nav-action-item">
                            <a href="javascript:void(0);" id="pwa-install-btn" class="icon-menu pwa-install-link" title="Install Loan Pocket"><i class="icon-cloud-download"></i> <span class="pwa-install-label">Install App</span></a>
                        </li>
                        <li class="nav-action-item">
                            <a href="<?php echo base_url("welcome/logout"); ?>" class="icon-menu logout-link" title="Logout"><i class="icon-logout"></i> <span class="logout-label">Logout</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>