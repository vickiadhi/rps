<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

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
                    <a class="nav-link active" data-bs-toggle="tab" href="#headerrps">Header RPS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#menu2">Gambaran Umum</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#menu3">Capaian Pembelajaran</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#menu4">Prasyarat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#menu5">Unit-Unit Pembelajaran</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#menu6">Tugas/Aktivitas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#menu7">Referensi</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <form action="<?= base_url('user/editMatkul/') . $datarps['id_data']; ?>" method="POST">
                <div class="tab-content">
                    <div id="headerrps" class="container tab-pane active"><br>
                        <div class="container">
                            <div class="card">
                                <div class="card-header bg-gradient-success" style="color: white;">
                                    <h5 class="card-title">INFORMASI HEADER RPS</h5>
                                </div>
                                <div class="card-body">
                                    <label for="sel1">Program Studi (select one):</label>
                                    <select class="form-control" name="program_studi" id="sel1">
                                        <?php foreach (['D3 Teknik Informatika', 'D3 Manajemen Informatika', 'S1 Informatika', 'S1 Sistem Informasi'] as $option) : ?>
                                            <option value="<?= $option ?>" <?= ($datarps['program_studi'] == $option) ? 'selected' : '' ?>>
                                                <?= $option ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="my-3">
                                        <label for="text1" class="form-label">Kode Matkul</label>
                                        <input class="form-control" id="text3" type="text" name="kode_matkul" placeholder="Kode Mata Kuliah" value="<?= $datarps['kode_matkul']; ?>" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="text2" class="form-label">Nama Mata Kuliah</label>
                                        <input class="form-control" id="text3" type="text" name="nama_matkul" placeholder="Nama Mata Kuliah" value="<?= $datarps['nama_matkul']; ?>" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="sel1">Bobot SKS (select one):</label>
                                        <select class="form-control" name="sks" id="sel1">
                                            <?php foreach (['2T', '2P', '2T 2P'] as $option) : ?>
                                                <option value="<?= $option ?>" <?= ($datarps['sks'] == $option) ? 'selected' : '' ?>>
                                                    <?= $option ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea5" class="form-label">Deskripsi</label>
                                        <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea5" rows="3"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="sel1">Semester (select one):</label>
                                        <select class="form-control" name="semester" id="sel1">
                                            <?php foreach (['Ganjil', 'Genap'] as $option) : ?>
                                                <option value="<?= $option ?>" <?= ($datarps['semester'] == $option) ? 'selected' : '' ?>>
                                                    <?= $option ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu2" class="container tab-pane fade"><br>
                        <div class="container">
                            <div class="card">
                                <div class="card-header bg-gradient-success" style="color: white;">
                                    <h5>INFORMASI GAMBARAN UMUM</h5>
                                </div>
                                <div class="card-body">
                                    <label for="exampleFormControlTextarea1" class="form-label">Gambaran Umum</label>
                                    <textarea class="form-control" name="gambaran_umum" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu3" class="container tab-pane fade"><br>
                        <div class="container">
                            <div class="card">
                                <div class="card-header bg-gradient-success" style="color: white;">
                                    <h5>INFORMASI CAPAIAN PEMBELAJARAN</h5>
                                </div>
                                <div class="card-body">
                                    <label for="exampleFormControlTextarea2" class="form-label">Capaian Pembelajaran</label>
                                    <textarea class="form-control" name="capaian_pembelajaran" id="exampleFormControlTextarea2" rows="3" value="<?= $datarps['capaian_pembelajaran']; ?>"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu4" class="container tab-pane fade"><br>
                        <div class="container">
                            <div class="card">
                                <div class="card-header bg-gradient-success" style="color: white;">
                                    <h5>INFORMASI PRASYARAT RPS</h5>
                                </div>
                                <div class="card-body">
                                    <label for="exampleFormControlTextarea3" class="form-label">Prasyarat dan Pengetahuan Awal</label>
                                    <textarea class="form-control" name="prasyarat" id="exampleFormControlTextarea3" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu5" class="container tab-pane fade"><br>
                        <div class="container">
                            <div class="card">
                                <div class="card-header bg-gradient-success" style="color: white;">
                                    <h5>INFORMASI UNIT-UNIT PEMBELAJARAN RPS</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="text2" class="form-label">Kemampuan Akhir yang Diharapkan</label>
                                        <input type="text" class="form-control" id="text1" name="kemampuan" value="<?= $datarps['kemampuan']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="text2" class="form-label">Indikator</label>
                                        <input type="text" class="form-control" id="text1" name="indikator" value="<?= $datarps['indikator']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="text2" class="form-label">Bahan Kajian</label>
                                        <input type="text" class="form-control" id="text1" name="bahan_kajian" value="<?= $datarps['bahan_kajian']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="text2" class="form-label">Metode Pembelajaran</label>
                                        <input type="text" class="form-control" id="text1" name="metode_pembelajaran" value="<?= $datarps['metode_pembelajaran']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="text2" class="form-label">Waktu</label>
                                        <input type="text" class="form-control" id="text1" name="waktu" value="<?= $datarps['waktu']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="text2" class="form-label">Metode Penilaian</label>
                                        <input type="text" class="form-control" id="text1" name="metode_penilaian" value="<?= $datarps['metode_penilaian']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="text2" class="form-label">Bahan Ajar</label>
                                        <input type="text" class="form-control" id="text1" name="bahan_ajar" value="<?= $datarps['bahan_ajar']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu6" class="container tab-pane fade"><br>
                        <div class="container">
                            <div class="card">
                                <div class="card-header bg-gradient-success" style="color: white;">
                                    <h5>INFORMASI TUGAS/AKTIVITAS</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="text2" class="form-label">Tugas/Aktivitas</label>
                                        <input type="text" class="form-control" id="text1" name="aktivitas" value="<?= $datarps['aktivitas']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="text2" class="form-label">Waktu Tugas</label>
                                        <input type="text" class="form-control" id="text1" name="waktu_tugas" value="<?= $datarps['waktu_tugas']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="text2" class="form-label">Bobot</label>
                                        <input type="text" class="form-control" id="text1" name="bobot" value="<?= $datarps['bobot']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="text2" class="form-label">Kriteria Penilaian</label>
                                        <input type="text" class="form-control" id="text1" name="kriteria" value="<?= $datarps['kriteria']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="text2" class="form-label">Indikator Penilaian</label>
                                        <input type="text" class="form-control" id="text1" name="indikator_penilaian" value="<?= $datarps['indikator_penilaian']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu7" class="container tab-pane fade"><br>
                        <div class="container">
                            <div class="card">
                                <div class="card-header bg-gradient-success" style="color: white;">
                                    <h5>INFORMASI REFERENSI</h5>
                                </div>
                                <div class="card-body">
                                    <label for="exampleFormControlTextarea4" class="form-label">Referensi</label>
                                    <textarea class="form-control" name="referensi" id="exampleFormControlTextarea4" rows="3"></textarea>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="<?= base_url('user/list'); ?>" class="btn btn-secondary">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="script.js"></script>
<script>
    document.getElementById("exampleFormControlTextarea1").value = "<?= $datarps['gambaran_umum']; ?>";
    document.getElementById("exampleFormControlTextarea2").value = "<?= $datarps['capaian_pembelajaran']; ?>";
    document.getElementById("exampleFormControlTextarea3").value = "<?= $datarps['prasyarat']; ?>";
    document.getElementById("exampleFormControlTextarea4").value = "<?= $datarps['referensi']; ?>";
    document.getElementById("exampleFormControlTextarea5").value = "<?= $datarps['deskripsi']; ?>";
</script>