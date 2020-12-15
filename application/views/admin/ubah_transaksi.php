<div class="main-konten">
    <div class='fluid-wrap'>
        <form id='update-form' action='<?= base_url('admin/update/').$curr_trans['ref']; ?>' method='post'>
            <h1>Ubah Data Transaksi</h1>
            <div class='grup'>
                <label>Jenis Transaksi</label>
                <div class='input'>
                    <select name='jenis_transaksi'>
                        <option value='<?= $curr_trans['ref'] ?>'>Data tidak berubah ...</option>
                        <?php foreach($jenis_transaksi as $tr) : ?>
                        <option value='<?= $tr['id']; ?>'> <?= $tr['nama_transaksi']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <input name='id' value='<?= $curr_trans['id_transaksi'] ?>' style='display:none; border: none !important;'>
            <div class='grup-horizontal'>
                <div class='grup'>
                    <label>Keterangan</label>
                    <div class='input'>
                        <input name='keterangan' value='<?= $curr_trans['keterangan'] ?>'>
                    </div>
                </div>
                <div class='grup'>
                    <label>Tanggal Transaksi</label>
                    <div class='input'>
                        <input type="date" name='tanggal'>
                    </div>
                </div>
            </div>
            <div class='grup'>
                <label>Nominal</label>
                <div class='simbol-input'>
                    <span class='simbol'>Rp.</span>
                    <input name='nominal' type='number' placeholder="Nominal" value='<?= $curr_trans['nominal'] ?>'>
                </div>
            </div>
            <hr>
            <div class='grup-horizontal'>
                <a href='<?= base_url("admin/trans/masuk") ?>' class='btn simpan' style="background: var(--oranye-light); color: #fff; display: flex; align-items: center; justify-content: center; ">Kembali</a>
                <button class='btn simpan' style="background: var(--oranye-dark); ">Simpan Data</button>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("[name='tanggal']").val('<?= $curr_trans['tanggal_transaksi'] ?>');

    });
</script>