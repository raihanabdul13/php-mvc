<div class="container mt-5">
    <div class="card" style="width: 24rem;">
      <div class="card-body">
        <h5 class="card-title">Kode Mata kuliah : <?= $data['mk']['kode_mk']; ?></h5>
        <h6 class="card-subtitle mb-2 text-muted">Matakuliah : <?= $data['mk']['nama_mk']; ?></h6>
        <p class="card-text">SKS : <?= $data['mk']['sks']; ?></p>
        <a href="<?= BASEURL; ?>/matakuliah" class="card-link badge badge-primary">Kembali</a>
      </div>
    </div>

</div>