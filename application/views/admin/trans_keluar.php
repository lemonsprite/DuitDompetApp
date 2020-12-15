<div class="main-konten">

    <!-- /Konten -->
    <div class='kasual'>
        <h1 class='pageHead'>RIWAYAT TRANSAKSI</h1>
        <div class='inner-konten'>
            <div class="btn-grup">
                <a class='btn' href="<?= base_url('admin/trans/masuk'); ?>">PEMASUKAN</a>
                <a class='btn aktif' href="<?= base_url('admin/trans/keluar'); ?>">PENGELUARAN</a>
            </div>

            <div class="tabel-data">
                <table id="pengeluaran" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Keterangan</th>
                            <th>Jumlah</th>
                            <th>Tanggal</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; foreach($transaksi as $trans) :?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $trans['keterangan'] ?></td>
                            <td>Rp. <?= number_format($trans['nominal'], 0,",",".") ?>,-</td>
                            <td><?= $trans['tanggal_transaksi'] ?></td>
                            <td class='btn-grup'>
                                <a id='ubah' href='<?= base_url("admin/ubah/").$trans['id_transaksi']; ?>' class='btn'><i class='ti ti-pencil'></i></a>
                                <a href='javascript:void(0)' data-id='<?= $trans['id_transaksi'] ?>' class='btn del'><i class='ti ti-trash'></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <script>
                            $(document).ready(function(){
                                // $('#del').click(function(e) {
                                //     e.preventDefault();
                                // });
                                

                                $('.del').click(function(e){
                                    // cegah aksi dari link
                                    // console.log($(this).attr('data-id'));

                                    // munculin modal
                                    Swal.fire({
                                        title: 'Anda yakin ingin menghapus ini?',
                                        text: "Tindakan ini tidak dapat di pulihkan!",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Yakin, dong!',
                                        cancelButtonText: 'Gak jadi deh!'
                                    }).then((result) => {

                                        // kalo dikonfirm eksekusi
                                        if (result.isConfirmed) {
                                            let dataid = $(this).attr('data-id');
                                            
                                            $.ajax({
                                                url: '<?= base_url('admin/hapus/') ?>',
                                                method: 'POST',
                                                data: { id: dataid },
                                                success: function(response) {
                                                    // location.reload(true);
                                                    Swal.fire({
                                                        title: 'Dihapus!',
                                                        text: 'Record telah dihapus dari Database!',
                                                        icon: 'success',
                                                        confirmButtonText: 'Oke, Makasih!'
                                                    }).then((result) => {
                                                        if(result.isConfirmed) {
                                                            location.reload(true);     
                                                        }
                                                        
                                                    });
                                                }
                                                
                                            });
                                            
                                        }
                                    });
                                    
                                });
                            });
                        </script>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Keterangan</th>
                            <th>Jumlah</th>
                            <th>Tanggal</th>
                            <th>Opsi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <script>
        $('#pengeluaran').DataTable();
    </script>

    <!-- <div class="konten-footer">
						<img src="img/duitdompet-logo.png">
						<h5>Kelompok 7 &copy; <script>document.write(today.getFullYear());</script></h5>
						<h5>Hak Cipta dilindungi Undang-undang.</h5>
					</div> -->
</div>