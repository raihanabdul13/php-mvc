<div class="container mt-5">
    
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title"><?= $data['mhs']['nama']; ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?= $data['mhs']['nrp']; ?></h6>
        <p class="card-text"><?= $data['mhs']['email']; ?></p>
        <p class="card-text"><?= $data['mhs']['jurusan']; ?></p>
        <a href="<?= BASEURL; ?>/mahasiswa" class="card-link">Kembali</a>
      </div>
    </div>
    <h2>Daftar Mata Kuliah</h2>
    <div class="row">
      <?php foreach( $data['mkmhs'] as $mkmhs ) : ?>
        <div class="col-md-4">
          <div class="card" style="width: auto;">
            <div class="card-body">
              <h5 class="card-title"><?= $mkmhs['nama_mk']; ?></h5>
              <h6 class="card-subtitle mb-2 text-muted">Kode MK : <?= $mkmhs['kode_mk'] ?></h6>
              <p class="card-text">Nilai : <b> <?= $mkmhs['nilai']; ?> </b></p>
              <a href="<?= BASEURL; ?>/mahasiswa" class="card-link">Kembali</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

</div>