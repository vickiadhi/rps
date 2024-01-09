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
                    <a class="nav-link active" data-bs-toggle="tab" href="<?= base_url('user/list'); ?>">Mata Kuliah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="<?= base_url('user/listMateri'); ?>">Materi</a>
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
                        <th scope="col">Program Studi</th>
                        <th scope="col">Kode Matkul</th>
                        <th scope="col">Mata Kuliah</th>
                        <th scope="col">Bobot SKS</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Semester</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody style="background-color: white;">
                    <?php $i = 1; ?>
                    <?php foreach ($datarps as $rps) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $rps['program_studi']; ?></td>
                            <td><?= $rps['kode_matkul']; ?></td>
                            <td><?= $rps['nama_matkul']; ?></td>
                            <td><?= $rps['sks']; ?></td>
                            <td><?= $rps['deskripsi']; ?></td>
                            <td><?= $rps['semester']; ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('user/viewRps/') . $rps['id_data']; ?>" class="badge badge-warning">View</a>
                                <a href="<?= base_url('user/editMatkul/') . $rps['id_data']; ?>" class="badge badge-success">Edit</a>
                                <a href="<?= base_url('user/delete/') . $rps['id_data']; ?>" class="badge badge-danger">Delete</a>
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