<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Data kursus </h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('home') ?>" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('kursus') ?>" class="breadcrumb-link">kursus</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data kursus</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <?php
                $this->load->view('template/notifikasi')
                ?>
                <div class="card">
                    <div class="card-header">
                        <a href="<?= base_url('kursus/tambah') ?>" class="btn btn-sm btn-success float-right"><i class="fas fa-plus">Tambah Data</i></a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="mytabel">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>judul</th>
                                    <th>deskripsi</th>
                                    <th>durasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($kursus as $a) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $a->judul ?></td>
                                        <td><?= $a->deskripsi ?></td>
                                        <td><?= $a->durasi ?></td>
                                        <td>
                                            <a href="<?= base_url('kursus/ubah/' . $a->id) ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"> Ubah</i></a>
                                            <a href="<?= base_url('kursus/hapus/' . $a->id) ?>" class="btn btn-sm btn-danger" onclick='return confirm("Ingin hapus data ini?")'><i class="fas fa-trash"> Hapus</i></a>
                                            <a href="<?= base_url('materi/index/' . $a->id) ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"> Materi</i></a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>