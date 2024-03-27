<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Program Studi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Master</a></li>
                        <li class="breadcrumb-item active">Prodi</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">Tambah</button>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php if (session()->getFlashdata('success')) : ?>
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h5><i class="icon fas fa-check"></i><?= session('success') ?></h5>
                                </div>
                            <?php endif; ?>
                            <table class="table table-bordered ">
                                <thead class="text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Prodi</th>
                                        <th>Nama Prodi</th>
                                        <th>Jurusan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($prodi as $key => $prd) : ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $prd['kode_program_studi'] ?></td>
                                            <td><?= $prd['nama_program_studi'] ?></td>
                                            <td><?= $prd['nama_jurusan']; ?></td>
                                            <td><span><button type="button" class="btn btn-warning mr-2" data-toggle="modal" data-target="#edit" data-kode_prodi="<?= $prd['kode_program_studi'] ?>" data-nama_prodi="<?= $prd['nama_program_studi'] ?>" data-jurusan="<?= $prd['id_jurusan'] ?>">Edit</button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus">Delete</button></span></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modals -->
        </div>
        <!-- Modals -->
        <div class="modal fade" id="tambah">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Input Data Prodi</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url() ?>prodi/tambahdata ?>" method="post">
                        <div class="modal-body">
                            <label for="jurusan">Jurusan</label>
                            <select class="form-control mb-3" name="jurusan" aria-label="Default select example">
                                <option selected disabled>--PILIH--</option>
                                <?php foreach ($jurusan as $jrsn) { ?>
                                    <option value="<?= $jrsn['id'] ?>"><?= $jrsn['nama_jurusan'] ?></option>
                                <?php } ?>
                            </select>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kode Prodi</label>
                                <input type="number" class="form-control" name="kode_prodi" id="kode_prodi" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Prodi</label>
                                <input type="text" class="form-control" name="nama_prodi" id="nama_prodi" autocomplete="off">
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Mahasiswa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url() ?>mahasiswa/updatedata" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Prodi</label>
                        <input type="number" class="form-control" name="kode_prodi" id="exampleInputEmail1" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Prodi</label>
                        <input type="text" class="form-control" name="prodi" id="exampleInputEmail1" autocomplete="off">
                    </div>
                    <label for="jurusan">Jurusan</label>
                    <select class="form-control" name="jurusan" aria-label="Default select example">
                        <option selected disabled>--PILIH--</option>
                        <?php foreach ($jurusan as $jrsn) { ?>
                            <option value="<?= $jrsn['id'] ?>"><?= $jrsn['nama_jurusan'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="hapus">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data Mahasiswa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url() ?>mahasiswa/hapusdata" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <p>Apakah anda yakin ingin menghapus data ini</p>
                        <input type="hidden" id="nim" name="nim">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {
        $(document).on('click', '.edit-data', function() {
            var nim = $(this).data('nim');
            var nama = $(this).data('nama');
            var alamat = $(this).data('alamat');
            var jenkel = $(this).data('jenkel');
            var kode_prodi = $(this).data('prodi');
            var id_jurusan = $(this).data('jurusan');
            console.log(jenkel)
            $('#edit .modal-body #nim-e').val(nim);
            $('#edit .modal-body #nama').val(nama);
            $('#edit .modal-body #alamat').val(alamat);
            $('#edit .modal-body #jenkel').val(jenkel);
            $('#edit .modal-body #prodi').val(`${id_jurusan}-${kode_prodi}`);

        });
    });

    $(document).on('click', '.hapus-data', function() {

        var nim = $(this).data('nim');
        $('#hapus .modal-body #nim').val(nim);
        $('#confirm-text').html('Yakin ingin menghapus data mahasiswa ' + nim + ' ?');
    })
</script>
<?= $this->endSection(); ?>