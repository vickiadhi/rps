<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <div class="tab-content">
        <div id="headerrps" class="container tab-pane active"><br>
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('user/editMateri/') . $datamateri['id_materi']; ?>" method="POST">
                            <div class="mb-3">
                                <label for="sel1">Pertemuan (select one):</label>
                                <select class="form-control" name="pertemuan" id="sel1">
                                    <?php foreach (['Pertemuan 1', 'Pertemuan 2', 'Pertemuan 3', 'Pertemuan 4', 'Pertemuan 5', 'Pertemuan 6', 'Pertemuan 7'] as $option) : ?>
                                        <option value="<?= $option ?>" <?= ($datamateri['pertemuan'] == $option) ? 'selected' : '' ?>>
                                            <?= $option ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="my-3">
                                <label for="text1" class="form-label">Kemampuan Akhir</label>
                                <input class="form-control" id="text3" type="text" name="kemampuan_akhir" value="<?= $datamateri['kemampuan_akhir']; ?>" />
                            </div>
                            <div class="mb-3">
                                <label for="text2" class="form-label">Indikator</label>
                                <input class="form-control" id="text3" type="text" name="indikator" value="<?= $datamateri['indikator']; ?>" />
                            </div>
                            <div class="mb-3">
                                <label for="text3" class="form-label">Topik</label>
                                <input class="form-control" id="text3" type="text" name="topik" value="<?= $datamateri['topik']; ?>" />
                            </div>
                            <div class="mb-3">
                                <label for="text3" class="form-label">Aktivitas</label>
                                <input class="form-control" id="text3" type="text" name="aktivitas" value="<?= $datamateri['aktivitas']; ?>" />
                            </div>
                            <div class="mb-3">
                                <label for="text3" class="form-label">Waktu</label>
                                <input class="form-control" id="text3" type="text" name="waktu" value="<?= $datamateri['waktu']; ?>" />
                            </div>
                            <div class="mb-3">
                                <label for="text3" class="form-label">Penilaian</label>
                                <input class="form-control" id="text3" type="text" name="penilaian" value="<?= $datamateri['penilaian']; ?>" />
                            </div>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <tr>
                                        <!--bikin tombol daftar-->
                                        <td colspan="2">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        <td></td>
                                    </tr>
                                </div>
                                <div>
                                    <a href="<?= base_url('user/listMateri'); ?>" class="btn btn-secondary">Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>