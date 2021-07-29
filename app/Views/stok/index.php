<?= $this->extend('layout/templateadmin') ?>

<?= $this->section('content') ?>

<div id="layoutSidenav_content">         
<main>
   
            <div class="container-fluid">
<div class="container">
<div class="row">
    <div class="col">
    <h1 class="mt-2"> Daftar Stok Darah </h1>
    <form action="" method="post">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search" name="keyword">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit" name="submit">Search</button>
            </div>
        </div>
        </form>
    </div>
</div>
    <div class="row">
        <div class="col">
        <!-- <h1 class="mt-2"> Daftar Event Donor Darah </h1> -->
        <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
          <?= session()->getFlashdata('pesan'); ?>
        </div>
        <?php endif; ?>
        <!-- <a href="/darah/create" class="btn btn-primary mb-3"> Tambah Data Event </a> -->
        <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Golongan Darah</th>
      <th scope="col">Rhesus Positif</th>
      <th scope="col">Rhesus Negatif</th>
      <th scoope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php $i = 1; ?>
      <?php foreach ($stok_darah as $s) : ?>
    <tr>
      <th scope="row"><?= $i++; ?></th>
      <td> <?= $s['gol_darah']; ?> </td>
      <td> <?= $s['rhesus_pos']; ?> </td>
      <td> <?= $s['rhesus_neg']; ?> </td>
      <td>
          <a href="/stok/edit/<?= $s['slug']; ?>" class="btn btn-warning">Edit</a>

          <!-- <a href="" class="btn btn-danger">Delete</a> -->
      </td>
    </tr>
        <?php endforeach; ?>
  </tbody>
</table>

        </div>
    </div>
    </main>
    </div>
</div>


<?= $this->endSection() ?>