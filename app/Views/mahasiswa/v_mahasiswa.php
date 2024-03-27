<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Mahasiswa</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Master</a></li>
            <li class="breadcrumb-item active">Mahasiswa</li>
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
              <?php if (session()->has('success')) : ?>
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i><?= session('success'); ?></h5>
                </div>
              <?php endif; ?>
              <?php if (session()->has('error')) : ?>
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><?= session('error'); ?></h5>
                </div>
              <?php endif; ?>
              <table class="table table-bordered ">
                <thead class="text-center">
                  <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $nom = 1;
                  foreach ($mahasiswa as $mhs) : ?>
                    <tr>
                      <td><?= $nom++ ?></td>
                      <td><?= $mhs['nim'] ?></td>
                      <td><?= $mhs['nama']; ?></td>
                      <td><?= $mhs['jenkel']; ?></td>
                      <td><?= $mhs['alamat']; ?></td>
                      <td class="text-center"><span><button type="button" class="btn btn-warning mr-2 edit-data" data-toggle="modal" data-target="#edit" data-nim="<?= $mhs['nim'] ?>" data-nama="<?= $mhs['nama'] ?>" data-alamat="<?= $mhs['alamat'] ?>" data-jenkel="<?= $mhs['jenkel'] ?>" data-prodi="<?= $mhs['kode_prodi'] ?>" data-jurusan="<?= $mhs['id_jurusan'] ?>">Edit</button>
                          <button type="button" class="btn btn-danger hapus-data" data-toggle="modal" data-target="#hapus" data-nim="<?= $mhs['nim'] ?>">Delete</button></span></td>
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
            <h4 class="modal-title">Input Data Mahasiswa</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?= base_url() ?>mahasiswa/tambahdata ?>" method="post">
            <div class="modal-body">
              <div class="form-group">
                <label for="exampleInputEmail1">NIM</label>
                <input type="text" class="form-control" name="nim" id="exampleInputEmail1" placeholder="Masukkan NIM">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" class="form-control" name="nama" id="exampleInputEmail1" placeholder="Masukkan Nama">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Alamat</label>
                <input type="text" class="form-control" name="alamat" id="exampleInputEmail1" placeholder="Alamat">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Jenis Kelamin</label>
                <select class="form-control" aria-label="Default select example" name="jenkel" id="inputGroupSelect01">
                  <option selected disabled>--PILIH--</option>
                  <option value="Pria">Pria</option>
                  <option value="Wanita">Wanita</option>
                </select>
              </div>
              <label for="prodi">Prodi</label>
              <select class="form-control" name="prodi" aria-label="Default select example">
                <option selected disabled>--PILIH--</option>
                <?php foreach ($prodi as $prd) { ?>
                  <option value="<?= $prd['id_jurusan'] . '-' . $prd['kode_program_studi'] ?>"><?= $prd['nama_jurusan'] . '-' . $prd['nama_program_studi'] ?></option>
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

    <!-- Modal Edit -->
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
                <label for="exampleInputEmail1">NIM</label>
                <input type="text" class="form-control" id="nim-e" name="nim-e"">
              </div>
              <div class=" form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
              </div>
              <div class=" form-group">
                <label for="exampleInputEmail1">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat">
              </div>
              <div class=" form-group">
                <label for="exampleInputEmail1">Jenis Kelamin</label>
                <select class="custom-select" id="jenkel" name="jenkel">
                  <option selected disabled>Pilih</option>
                  <option value="Pria">Pria</option>
                  <option value="Wanita">Wanita</option>
                </select>
              </div>
              <div class="form-group">
                <label for="prodi">Prodi</label>
                <select class="form-control" name="prodi" id="prodi" aria-label="Default select example">
                  <option selected disabled>--PILIH--</option>
                  <?php foreach ($prodi as $prd) { ?>
                    <option value="<?= $prd['id_jurusan'] . '-' . $prd['kode_program_studi'] ?>"><?= $prd['nama_jurusan'] . '-' . $prd['nama_program_studi'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class=" modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Modal Hapus -->
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
                <input type="text" id="nim" name="nim" readonly>
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