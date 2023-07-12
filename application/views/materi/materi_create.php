<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Tambah Data Persyaratan </h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('home') ?>" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('materi') ?>" class="breadcrumb-link">Materi</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        Tambah Data materi
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group row">
                                <label for="judul_materi" class="col-md-2">Judul</label>
                                <div class="col-md-10">
                                    <input type="text" name="judul_materi" required placeholder="judul_materi" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="deskripsi_materi" class="col-md-2">deskripsi</label>
                                <div class="col-md-10">
                                    <input type="text" name="deskripsi_materi" required placeholder="deskripsi_materi" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="link" class="col-md-2">link</label>
                                <div class="col-md-10">
                                    <input type="text" name="link" required placeholder="link" class="form-control">
                                </div>
                            </div>
                            <a href="<?= base_url('materi') ?>" class="btn btn-sm btn-danger float-right">Batal</a>
                            <button type="submit" name="create" class="btn btn-sm btn-info float-right mr-1">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>