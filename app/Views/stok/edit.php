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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Data Stok Darah</h3></div>
                                    <div class="card-body">

            <form action="/stok/update/<?= $stok_darah['id']; ?>" method="post">
            <?= csrf_field(); ?>
            <input type="hidden" name="slug" value="<?= $stok_darah['slug']; ?>">
  <div class="form-group row">
    <label for="gol_darah" class="col-sm-5 col-form-label">Golongan Darah</label>
    <div class="col-sm-12">
      <input type="text" class="form-control <?= ($validation->hasError('gol_darah')) ? 
      'is-invalid' : ''; ?>" id="gol_darah" name="gol_darah" autofocus value="<?= (old('gol_darah')) ? old('gol_darah') : $stok_darah['gol_darah'] ?>">
      <div class="invalid-feedback">
        <?= $validation->getError('gol_darah'); ?>
        </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="slug" class="col-sm-5 col-form-label">Slug</label>
    <div class="col-sm-12">
      <input type="text" class="form-control <?= ($validation->hasError('slug')) ? 
      'is-invalid' : ''; ?>" id="slug" name="slug" autofocus value="<?= (old('slug')) ? old('slug') : $stok_darah['slug'] ?>">
      <div class="invalid-feedback">
        <?= $validation->getError('slug'); ?>
        </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="rhesus_pos" class="col-sm-5 col-form-label">Rhesus Positif</label>
    <div class="col-sm-12">
      <input type="text" class="form-control <?= ($validation->hasError('rhesus_pos')) ?
      'is-invalid' : ''; ?>" id="rhesus_pos" name="rhesus_pos" value="<?= (old('rhesus_pos')) ? old('rhesus_pos') : $stok_darah['rhesus_pos'] ?>">
      <div class="invalid-feedback">
        <?= $validation->getError('rhesus_pos'); ?>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="rhesus_neg" class="col-sm-5 col-form-label">Rhesus Negatif</label>
    <div class="col-sm-12">
      <input type="text" class="form-control <?= ($validation->hasError('rhesus_neg')) ?
      'is-invalid' : ''; ?>" id="rhesus_neg" name="rhesus_neg" value="<?= (old('rhesus_neg')) ? old('rhesus_neg') : $stok_darah['rhesus_neg'] ?>">
      <div class="invalid-feedback">
        <?= $validation->getError('rhesus_neg'); ?>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Edit Data</button>
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
    </div>
</div>

<?= $this->endSection('content'); ?>