</div>
</div>


<div id='add' class='modal'>
    <div class='modal-container'>
        <div class='modal-head'>
            Tambah Data Transaksi
            <a class='close-btn' href='javascript:void'><i class='ti ti-close'></i></a>
        </div>
        <div class='modal-body'>
            <form id='modal-form' action='<?= base_url('admin/simpan'); ?>' method='post'>
                <h1>Tambah Data Transaksi</h1>
                <div class='grup'>
                    <label>Jenis Transaksi</label>
                    <div class='input'>
                        <select name='jenis_transaksi'>
                            <option value=''>Pilih Salah Satu ...</option>
                            <?php foreach($jenis_transaksi as $tr) : ?>
                                <option value='<?= $tr['id']; ?>'> <?= $tr['nama_transaksi']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class='grup-horizontal'>
                    <div class='grup'>
                        <label>Keterangan</label>
                        <div class='input'>
                            <input name='keterangan'>
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
                        <input name='nominal' type='number' placeholder="Nominal">
                    </div>
                </div>
                <hr>
                <button class='btn simpan'>Simpan Data</button>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type='text/javascript'>
function setDef()
{
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
    $('[name="tanggal"]').val(today);
}


$('#modal-form').submit(function(e){
    e.preventDefault();
    let url = '<?= base_url('admin/simpan'); ?>';
    $.ajax({   
        type: 'POST',   
        url: url,   
        data: $('#modal-form').serialize(),
        success: function(response) {

            console.log($.parseJSON(response));
            // Terus Tutup Modal

            if($.parseJSON(response).status == 'success')
            {
                console.log('Log : Tutup Modal');
                $('#add').removeClass('show');
        
                setTimeout(() => {
                    $('#add').css('opacity', 0);
                }, 500);
                
                // Reset Form terus setDefault Tanggal
                $('#modal-form').trigger('reset');
                // setDef();
                Swal.fire({
                    title: 'Data Anda Telah Disimpan',
                    icon: 'success',
                    text: 'Tenang! Data anda sudah disimpan dengan aman...',
                    confirmButtonText: 'OK, Terima Kasih!'
                }).then((result) => {
                    if(result.isConfirmed) {
                        location.reload(true);
                    }
                });
            } else {
                response = $.parseJSON(response);
                console.log(response);
                Swal.fire({
                    title: 'Data Anda Gagal Disimpan',
                    icon: 'error',
                    text: `Maaf! Data anda gagal disimpan dengan baik, Silahkan coba lagi dan ${response.pesan}`,
                    confirmButtonText: 'OK, Terima Kasih!'
                });
            }
            
        }
    }); 
});


$('.close-btn').click(function() {
    console.log('Log : Tutup Modal');
    $('#modal-form').trigger('reset');
    // setDef();

    $('#add').removeClass('show');

    setTimeout(() => {
        $('#add').css('opacity', 0);
    }, 500);
    
    
})

// window.onclick = function(e) {
//     if(e.target == document.querySelector('#add'))
//     {
//         $('#modal-form').trigger('reset');
//         setDef();


//         console.log('Log : Tutup Modal');
//         $('#add').removeClass('show');

//         setTimeout(() => {
//             $('#add').css('opacity', 0);
//         }, 500);
        
//     }
// }
</script>
</body>

</html>