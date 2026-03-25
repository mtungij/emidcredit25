<div id="wrapper">

    <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-btn">
                <button type="button" class="btn-toggle-offcanvas"><i class="icon-list"></i></button>
            </div>

            <div class="navbar-brand">
                <a href=""><img src="<?php echo base_url() ?>assets/img/mikopo.png" alt="Lucid Logo" class="img-responsive logo"></a>                
            </div>
            
            <div class="navbar-right">
                <form id="navbar-search" class="navbar-form search-form">
                    <input value="" class="form-control" placeholder="Search Customer..." type="text">
                    <button type="submit" class="btn btn-default"><i class="icon-magnifier"></i></button>
                </form>                

                <div id="navbar-menu">
                    <ul class="nav navbar-nav nav-actions">
                        <li class="nav-action-item">
                            <a href="javascript:void(0);" id="pwa-install-btn" class="icon-menu pwa-install-link" title="Install Loan Pocket"><i class="icon-cloud-download"></i> <span class="pwa-install-label">Install App</span></a>
                        </li>
                        <li class="nav-action-item">
                            <a href="<?php echo base_url("welcome/empl_logout"); ?>" class="icon-menu logout-link" title="Logout"><i class="icon-logout"></i> <span class="logout-label">Logout</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>