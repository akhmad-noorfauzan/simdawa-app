<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Data materi </h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('home') ?>" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('materi') ?>" class="breadcrumb-link">materi</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data materi</li>
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
                        <a href="<?= base_url('materi/tambah') ?>" class="btn btn-sm btn-success float-right"><i class="fas fa-plus">Tambah Data</i></a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="mytabel">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>judul</th>
                                    <th>deskripsi</th>
                                    <th>link</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($materi as $a) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $a->judul_materi ?></td>
                                        <td><?= $a->deskripsi_materi ?></td>
                                        <td><a href="<?= $a->link ?>"><?= $a->link ?></a></td>
                                        <td>
                                            <a href="<?= base_url('materi/ubah/' . $a->id) ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"> Ubah</i></a>
                                            <a href="<?= base_url('materi/hapus/' . $a->id) ?>" class="btn btn-sm btn-danger" onclick='return confirm("Ingin hapus data ini?")'><i class="fas fa-trash"> Hapus</i></a>
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