<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <div class="col-lg text-dark bg-opacity-10">
        <div class="container">
            <ul class="nav nav-pills" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="<?= base_url('user/listMateri'); ?>">Materi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#menu7">Tambah Materi</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div id="headerrps" class="container tab-pane active"><br>
                    <div class="container">
                        <div class="card">
                            <div class="card-body">
                                <form action="<?= base_url('user/createMateri'); ?>" method="POST">
                                    <div class="mb-3">
                                        <label for="sel1">Minggu/Pertemuan (select one):</label>
                                        <select class="form-control" name="pertemuan" id="sel1">
                                            <option>Pertemuan 1</option>
                                            <option>Pertemuan 2</option>
                                            <option>Pertemuan 3</option>
                                            <option>Pertemuan 4</option>
                                            <option>Pertemuan 5</option>
                                            <option>Pertemuan 6</option>
                                            <option>Pertemuan 7</option>
                                        </select>
                                    </div>
                                    <div class="my-3">
                                        <label for="text1" class="form-label">Kemampuan Akhir yang Diharapkan</label>
                                        <input class="form-control" id="text3" type="text" name="kemampuan_akhir" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="text2" class="form-label">Indikator</label>
                                        <input class="form-control" id="text3" type="text" name="indikator" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="text3" class="form-label">Topik dan Sub Topik</label>
                                        <input class="form-control" id="text3" type="text" name="topik" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="text3" class="form-label">Aktivitas dan Strategi Pembelajaran</label>
                                        <input class="form-control" id="text3" type="text" name="aktivitas" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="text3" class="form-label">Waktu</label>
                                        <input class="form-control" id="text3" type="text" name="waktu" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="text3" class="form-label">Penilaian</label>
                                        <input class="form-control" id="text3" type="text" name="penilaian" />
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <tr>
                                                <!--bikin tombol daftar-->
                                                <td colspan="2">
                                                    <button type="submit" class="btn btn-primary">Create</button>
                                                <td></td>
                                            </tr>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->