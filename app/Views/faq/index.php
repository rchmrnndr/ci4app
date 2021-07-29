<?= $this->extend('layout/templateadmin') ?>

<?= $this->section('content') ?>

<div id="layoutSidenav_content">         
<main>
   
            <div class="container-fluid">

<div class="container">
    <div class="row">
    <div class="col">
    <h1 class="mt-2"> Daftar FAQ </h1>
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
        <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Lengkap</th>
      <th scope="col">FAQ</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php $i = 1 + (5 * ($currentPage - 1)); ?>
      <?php foreach ($faq as $f) : ?>
    <tr>
      <th scope="row"><?= $i++; ?></th>
      <td> <?= $f['nama']; ?> </td>
      <td> <?= $f['komen']; ?> </td>
      <td>
          <form action="/faq/delete/<?= $f['id']; ?>" method="post" class="d-inline">
        
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?');">Delete</button>
            </form>
      </td>
    </tr>
        <?php endforeach; ?>
  </tbody>
</table>
<?= $pager->links('faq', 'faq_pagination'); ?>
        </div>
    </div>
    </main>
    </div>
</div>


<?= $this->endSection() ?>