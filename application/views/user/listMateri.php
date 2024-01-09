<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <div class="col-lg text-dark bg-opacity-10 mb-3">
        <div class="container">
            <ul class="nav nav-pills" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="<?= base_url('user/list'); ?>">Mata Kuliah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="<?= base_url('user/listMateri'); ?>">Materi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="<?= base_url('user/createMateri'); ?>">Tambah Materi</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="col-lg">
        <div class="container">
            <table class="table table-hover">
                <thead class="card-header bg-gradient-primary text-center" style="color: white;">
                    <tr class="tr">
                        <th class="satu">No</th>
                        <th scope="col">Pertemuan</th>
                        <th scope="col">Kemampuan Akhir</th>
                        <th scope="col">Indikator</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Penilaian</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody style="background-color: white;">
                    <?php $i = 1; ?>
                    <?php foreach ($datamateri as $mhs) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $mhs['pertemuan']; ?></td>
                            <td><?= $mhs['kemampuan_akhir']; ?></td>
                            <td><?= $mhs['indikator']; ?></td>
                            <td><?= $mhs['waktu']; ?></td>
                            <td><?= $mhs['penilaian']; ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('user/editMateri/') . $mhs['id_materi']; ?>" class="badge badge-success">Edit</a>
                                <a href="<?= base_url('user/deleteMateri/') . $mhs['id_materi']; ?>" class="badge badge-danger">Delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->