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
                        <tr>
                            <td>1</td>
                            <td>Pembayaran Hutang</td>
                            <td>Rp. 12.000.000,-</td>
                            <td>2011/05/20</td>
                            <td class='btn-grup'>
                                <a href="#" class='btn'><i class='ti ti-pencil'></i></a>
                                <a href="#" class='btn'><i class='ti ti-trash'></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Pembayaran Listrik</td>
                            <td>Rp. 150.000,-</td>
                            <td>2011/05/20</td>
                            <td class='btn-grup'>
                                <a href="#" class='btn'><i class='ti ti-pencil'></i></a>
                                <a href="#" class='btn'><i class='ti ti-trash'></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Pembayaran Telpon</td>
                            <td>Rp. 75.000,-</td>
                            <td>2011/06/20</td>
                            <td class='btn-grup'>
                                <a href="#" class='btn'><i class='ti ti-pencil'></i></a>
                                <a href="#" class='btn'><i class='ti ti-trash'></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Pembayaran Wifi</td>
                            <td>Rp. 75.000,-</td>
                            <td>2011/06/20</td>
                            <td class='btn-grup'>
                                <a href="#" class='btn'><i class='ti ti-pencil'></i></a>
                                <a href="#" class='btn'><i class='ti ti-trash'></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Pembayaran Pajak</td>
                            <td>Rp. 75.000,-</td>
                            <td>2011/06/20</td>
                            <td class='btn-grup'>
                                <a href="#" class='btn'><i class='ti ti-pencil'></i></a>
                                <a href="#" class='btn'><i class='ti ti-trash'></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Pembayaran Hutang</td>
                            <td>Rp. 12.000.000,-</td>
                            <td>2011/05/20</td>
                            <td class='btn-grup'>
                                <a href="#" class='btn'><i class='ti ti-pencil'></i></a>
                                <a href="#" class='btn'><i class='ti ti-trash'></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Pembayaran Listrik</td>
                            <td>Rp. 150.000,-</td>
                            <td>2011/05/20</td>
                            <td class='btn-grup'>
                                <a href="#" class='btn'><i class='ti ti-pencil'></i></a>
                                <a href="#" class='btn'><i class='ti ti-trash'></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Pembayaran Telpon</td>
                            <td>Rp. 75.000,-</td>
                            <td>2011/06/20</td>
                            <td class='btn-grup'>
                                <a href="#" class='btn'><i class='ti ti-pencil'></i></a>
                                <a href="#" class='btn'><i class='ti ti-trash'></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Pembayaran Wifi</td>
                            <td>Rp. 75.000,-</td>
                            <td>2011/06/20</td>
                            <td class='btn-grup'>
                                <a href="#" class='btn'><i class='ti ti-pencil'></i></a>
                                <a href="#" class='btn'><i class='ti ti-trash'></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Pembayaran Pajak</td>
                            <td>Rp. 75.000,-</td>
                            <td>2011/06/20</td>
                            <td class='btn-grup'>
                                <a href="#" class='btn'><i class='ti ti-pencil'></i></a>
                                <a href="#" class='btn'><i class='ti ti-trash'></i></a>
                            </td>
                        </tr>

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