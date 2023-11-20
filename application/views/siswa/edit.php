<!-- Modal edit -->
<?php $no = 0;
foreach ($toko as $sm) : $no++; ?>
    <div class="container" id="<?php echo $sm['id']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modaleditLabel">modal edit</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('Auth/edit/' . $sm['id']); ?>" method="post">
                    <div class="modal-body" <?php echo form_open_multipart('Auth/edit'); ?> <div class="form-group">
                        <input type="text" class="form-control" id="nama_toko" name="nama_toko" value="<?= $sm['nama_toko']; ?>">
                        <!-- </div> -->
                        <div class="form-group">
                            <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $sm['no_telp']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $sm['alamat']; ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
            </div>
            <?php echo form_close() ?>
            </form>
        </div>
    </div>
    </div>
<?php endforeach; ?>