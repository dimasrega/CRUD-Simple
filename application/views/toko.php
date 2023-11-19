<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>

    <!-- Begin Page Content -->
    <div class="container mt-4">

        <!-- Page Heading -->


        <div class="row">
            <div class="col-lg">

                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                <?php endif; ?>

                <?= $this->session->flashdata('message') ?>

                <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#newsubMenuModal">add new
                    submenu</button>

                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                        Logout
                    </button>
                    <div class="dropdown-menu">
                        <button class="dropdown-item" type="button">Logout</button>
                    </div>
                </div>


                <table class="table table-hover" id="table_id">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Nama Toko</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">NO telp</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($toko as $sm) : ?>
                            <tr>
                                <th scope="row">
                                    <?= $i; ?>
                                </th>
                                <td>
                                    <?= $sm['nama_toko']; ?>
                                </td>
                                <td>
                                    <?= $sm['no_telp']; ?>
                                </td>
                                <td>
                                    <?= $sm['alamat']; ?>
                                </td>
                                <td>
                                    <button class="badge badge-warning" data-toggle="modal" data-target="#modaledit<?php echo $sm['id']; ?>">edit</button>
                                    <button class="badge badge-info" data-toggle="modal" data-target="#modaldetail<?php echo $sm['id']; ?>">Detail</button>
                                    <a href="<?php echo base_url('auth/hapus/') . $sm['id']; ?>" class="badge badge-danger">delete</a>

                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    <!-- End of Main Content -->



    <!-- Modal -->
    <div class="modal fade" id="newsubMenuModal" tabindex="-1" aria-labelledby="newsubMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="newsubMenuModalLabel">Add new sub menu</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('Auth/index'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama_toko" name="nama_toko" placeholder="nama_toko">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="No telepon">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!-- Modal edit -->
    <?php $no = 0;
    foreach ($toko as $sm) : $no++; ?>
        <div class="modal fade" id="modaledit<?php echo $sm['id']; ?>" tabindex="-1" aria-labelledby="modaleditLabel" aria-hidden="true">
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


    <!-- Modal detail -->
    <?php $no = 0;
    foreach ($toko as $sm) : $no++; ?>
        <div class="modal fade" id="modaldetail<?php echo $sm['id']; ?>" tabindex="-1" aria-labelledby="modaldetailLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modaldetailLabel">modal detail</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('Auth/edit/' . $sm['id']); ?>" method="post">
                        <div class="modal-body" <?php echo form_open_multipart('Auth/edit'); ?> <div class="form-group">
                            <input type="text" readonly class="form-control" id="nama_toko" name="nama_toko" value="<?= $sm['nama_toko']; ?>">
                            <!-- </div> -->
                            <div class="form-group">
                                <input type="text" readonly class="form-control" id="no_telp" name="no_telp" value="<?= $sm['no_telp']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" readonly class="form-control" id="alamat" name="alamat" value="<?= $sm['alamat']; ?>">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                </div>
                <?php echo form_close() ?>
                </form>
            </div>
        </div>
        </div>
    <?php endforeach; ?>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>