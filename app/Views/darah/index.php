<?= $this->extend('layout/templateadmin') ?>

<?= $this->section('content') ?>

<div id="layoutSidenav_content">         
<main>
   
            <div class="container-fluid">
<div class="container">
<div class="row">
    <div class="col">
    <h1 class="mt-2"> Daftar Event Donor </h1>
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
        
        <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Event</th>
      <th scope="col">Deskripsi</th>
      <th sope="col">Tanggal</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php $i = 1 + (5 * ($currentPage - 1)); ?>
      <?php foreach ($event as $e) : ?>
    <tr>
      <th scope="row"><?= $i++; ?></th>
      <td> <?= $e['event']; ?> </td>
      <td> <?= $e['desc']; ?> </td>
      <td> <?= $e['tanggal']; ?> </td>
      <td>
          <a href="/darah/edit/<?= $e['slug']; ?>" class="btn btn-warning">Edit</a>

          <form action="/darah/delete/<?= $e['id']; ?>" method="post" class="d-inline">
        
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?');">Delete</button>
            </form>
          <!-- <a href="" class="btn btn-danger">Delete</a> -->
      </td>
    </tr>
        <?php endforeach; ?>
  </tbody>
</table>
<?= $pager->links('event', 'ev_pagination'); ?>
        </div>
    </div>
    </div>
    </main>
    </div>
</div>




<?= $this->endSection() ?>