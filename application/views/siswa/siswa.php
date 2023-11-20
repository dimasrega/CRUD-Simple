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

                <a class="btn btn-primary mb-3" role="button" href=" <?= base_url('siswa/tambah'); ?>">Tambah siswa</a>

                <table class="table table-hover" id="table_id">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Username</th>
                            <th scope="col">Nama</th>
                            <th scope="col">nisn</th>
                            <th scope="col">alamat</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($siswa as $sm) : ?>
                            <tr>
                                <th scope="row">
                                    <?= $i; ?>
                                </th>
                                <td>
                                    <?= $sm['username']; ?>
                                </td>
                                <td>
                                    <?= $sm['nama']; ?>
                                </td>
                                <td>
                                    <?= $sm['nisn']; ?>
                                </td>
                                <td>
                                    <?= $sm['alamat']; ?>
                                </td>

                                <td>
                                    <a class="badge badge-success" data-toggle="modal" href="<?php echo base_url('siswa/edit') . $sm['id_pemilih']; ?>">edit</a>
                                    <a href="<?php echo base_url('auth/hapus/') . $sm['id_pemilih']; ?>" class="badge badge-danger">delete</a>

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


</body>

</html>
</body>

</html>