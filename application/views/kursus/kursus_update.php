<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Perbaharui kursus </h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('home') ?>" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('kursus') ?>" class="breadcrumb-link">Judul</a></li>
                                <li class=" breadcrumb-item active" aria-current="page">Perbaharui Data kursus</li>
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
                        Perbaharui Data  kursus
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group row">
                                <input type="hidden" name="id" value="<?= $kursus->id ?>">
                                <label for="judul" class="col-md-2">Judul</label>
                                <div class="col-md-10">
                                    <input type="text" name="kursus" required placeholder="judul" value="<?= $kursus->judul ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="deskripsi" class="col-md-2">deskripsi</label>
                                <div class="col-md-10">
                                    <input type="text" name="deskripsi" required placeholder="deskripsi" value="<?= $kursus->deskripsi ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="durasi" class="col-md-2">durasi</label>
                                <div class="col-md-10">
                                    <input type="text" name="durasi" required placeholder="durasi" value="<?= $kursus->durasi ?>" class="form-control">
                                </div>
                            </div>
                            <a href="<?= base_url('kursus') ?>" class="btn btn-sm btn-danger float-right">Batal</a>
                            <button type="submit" name="update" class="btn btn-sm btn-info float-right mr-1">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>