
<div class="sidebar">
    <div class="sidebar-head">
        <a href="<?= base_url('admin/index'); ?>">
            <img src="<?= base_url('assets/img/duitdompet-logo-light.png'); ?>">
        </a>
    </div>
    <ul class="sidebar-body">
        <li>
            <a class="<?php 
            if(strtolower($this->uri->segment(2)) == 'index' || empty($this->uri->segment(2))) { echo 'aktif'; } ?>" class='' href="<?= base_url('admin/index'); ?>">
                <i class="ti ti-home"></i>
                <p>BERANDA</p>
            </a>
        </li>
        <li>
            <a class='<?php if(strtolower($this->uri->segment(3)) == 'masuk' || strtolower($this->uri->segment(3)) == 'keluar') { echo 'aktif'; } ?>' href="<?= base_url('admin/trans/masuk'); ?>">
                <i class="ti ti-exchange-vertical"></i>
                <p>TRANSAKSI</p>
            </a>
        </li>

        <li>
            <a class='<?php if(strtolower($this->uri->segment(2)) == 'tentang') { echo 'aktif'; } ?>' href="<?= base_url('admin/tentang'); ?>">
                <i class="ti ti-info-alt"></i>
                <p class='setting-head'>TENTANG</p>
            </a>
        </li>
    </ul>
</div>

<ul class='appnav'>
    <li>
        <a href='<?= base_url('admin/index') ?>'><i class='ti ti-home'></i></a>
        <a href='<?= base_url('admin/trans/masuk') ?>'><i class='ti ti-stats-up'></i></a>
    </li>
    <li>
        <a class='add-btn-nav' href='#'><i class='ti ti-plus' style='flex: 2 !important;'></i></a>
    </li>
    <li>
        <a href='<?= base_url('admin/trans/keluar') ?>'><i class='ti ti-stats-down'></i></a>
        <a href='<?= base_url('admin/tentang') ?>'><i class='ti ti-info-alt'></i></a>
    </li>
</ul>
<div class="konten">
    <div class="navbar">
        <h2>DUIT DOMPET</h2>
        <div class="user dropdown">
            <?= strtoupper($user) ?>
            <a class='circle' href='javascript:void(0)'>
                <i class='ti ti-user' style=' color: #fff;'></i>
            </a>
            <script>
                $(document).ready(() => {
                    $('.circle').click(() => {
                        $('.dropdown-content').toggleClass('block');
                        


                        $('.dropdown-content').mouseleave((e) => {
                            if(e.target != $('.dropdown-content')) {
                                $('.dropdown-content').removeClass('block');
                            }
                            console.log('dalem context');
                            
                        })
                        
                    });
                    console.log('clicked');
                });
            </script>
            <div class='dropdown-content' style='top: var(--navbar-height)'>
                <a href='#'>Menu #1</a>
                <a href='#'>Menu #2</a>
                <a href='<?= base_url('admin/logout')?>'>Logout</a>
            </div>
        </div>
        
    </div>
    <div class='float-btn'>
        <a href='javascript:void' class='add-btn'>
            <i class='ti ti-plus'></i>
</a>
    </div>

    