<?= $this->extend('layout/templateadmin'); ?>

<?= $this->section('content'); ?>

<br>
<div id="layoutSidenav_content">   
<div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Tambah Data Event</h3></div>
                                    <div class="card-body">
            <form action="/darah/save" method="post">
            <?= csrf_field(); ?>
  <div class="form-group row">
    <label for="event" class="col-sm-5 col-form-label">Nama Event</label>
    <div class="col-sm-12">
      <input type="text" class="form-control <?= ($validation->hasError('event')) ? 
      'is-invalid' : ''; ?>" id="event" name="event" autofocus value="<?= old('event'); ?>">
      <div class="invalid-feedback">
        <?= $validation->getError('event'); ?>
        </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="desc" class="col-sm-5 col-form-label">Deskripsi</label>
    <div class="col-sm-12">
      <input type="text" class="form-control <?= ($validation->hasError('desc')) ?
      'is-invalid' : ''; ?>" id="desc" name="desc" value="<?= old('desc'); ?>">
      <div class="invalid-feedback">
        <?= $validation->getError('desc'); ?>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="tanggal" class="col-sm-5 col-form-label">Tanggal</label>
    <div class="col-sm-12">
      <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= old('tanggal'); ?>">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Tambah Data</button>
    </div>
  </div>
</form>
</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
                </div>

<?= $this->endSection('content'); ?>