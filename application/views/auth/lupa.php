<!DOCTYPE html>
<html>
    <head>
		<title>Masuk | Duit Dompet</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href='<?= base_url('assets/css/responsive.css'); ?>' rel="stylesheet">

		<link href="<?= base_url('assets/img/favicon.ico') ?>"  type="image/x-icon" rel="icon">
		<link href="<?= base_url('assets/css/main.css') ?>" rel='stylesheet'>
		<link href="<?= base_url('assets/css/login.css') ?>" rel='stylesheet'>
		<link href="<?= base_url('assets/css/themify.css') ?>" rel='stylesheet'>

		<script src="<?= base_url('assets/js/main.js') ?>" type="text/javascript"></script>
		<script src="<?= base_url('assets/js/jquery.min.js') ?>" type="text/javascript"></script>
	</head>
	
    <body onload='init()'>
        <div class='auth-wrap'>
            <div class='auth-contentwrap'>
                <form class='auth-lupa' action='<?= base_url('auth/lupa'); ?>' method='post'>
                    <div class='head'>
                        <img src='<?= base_url('assets/img/duitdompet-logo.png'); ?>'>
                        <h1>DUIT DOMPET</h1>
                        <p>Ingatlah Password anda dengan baik</p><br>
                        <p'><?= $this->session->flashdata('pesan'); ?></p>
                    </div>
                    <div class='grup'>
                        <label>Username</label>
                        <div class='inwrap'>
                            <input name='username' placeholder="Masukan username anda">
                        </div>
                        <p style='color: red !important; font-size: .5em !important;'><?= form_error('username') ?></p>
                    </div>
                    <div class='grup'>
                        <label>Password</label>
                        <div class='grup-horizontal'>
                            <div>
                                <div class='inwrap'>
                                    <input name='password1' type='password' placeholder="Masukan Password anda">
                                </div>
                            </div>
                            <div>
                                <div class='inwrap'>
                                    <input name='password2' type='password' placeholder="Verifikasi Password anda">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class='btn lupa'>Ganti Password</button>
                    <hr>
                    <center><a href='<?= base_url('auth'); ?>' class='ingat'>Terima kasih, Tapi saya sudah teringat kembali.</a></center>
                </form>
            </div>
        </div>

	</body>
</html>