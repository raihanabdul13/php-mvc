<div class="container mt-3">
    <div class="row">
      <div class="col-lg-6">
        <?php Flasher::flash(); ?>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-lg-6">
        <button type="button" class="btn btn-primary tombolTambahDataMKMHS" data-toggle="modal" data-target="#formModal">
          Tambah Data Mata Kuliah Mahasiswa
        </button>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-lg-6">
        <form action="<?= BASEURL; ?>/mkmhs/cari" method="post">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="cari mata kuliah mahasiswa.." name="keyword" id="keyword" autocomplete="off">
            <div class="input-group-append">
              <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  
    <div class="row">
        <div class="col-lg-12">
          <h3>Daftar Mata Kuliah Mahasiswa</h3>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">NRP</th>
                    <th scope="col">Mahasiswa</th>
                    <th scope="col">Kode Mata Kuliah</th>
                    <th scope="col">Mata Kuliah</th>
                    <th scope="col">Nilai</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i=1; foreach( $data['mkmhs'] as $mkmhs ) : ?>
                    <tr>
                    <th scope="row"><?= $i++;?></th>
                    <td><?= $mkmhs['nrp']?></td>
                    <td><?= $mkmhs['nama']?></td>
                    <td><?= $mkmhs['kode_mk']?></td>
                    <td><?= $mkmhs['nama_mk']?></td>
                    <td><?= $mkmhs['nilai']?></td>
                    <td>
                        <a href="<?= BASEURL; ?>/mkmhs/hapus/<?= $mkmhs['id']; ?>" class="badge badge-danger float-left" onclick="return confirm('yakin menghapus ?');">hapus</a>
                        <a href="<?= BASEURL; ?>/mkmhs/ubah/<?= $mkmhs['id']; ?>" class="badge badge-success float-left tampilModalUbahMKMHS" data-toggle="modal" data-target="#formModal" data-id="<?= $mkmhs['id']; ?>">ubah</a>
                    </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>   
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah Data Mata Kuliah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/mkmhs/tambah" method="post">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label for="id_mhs">Mahasiswa :</label>
            <select class="form-control" id="id_mhs" name="id_mhs" required>
                <?php $i=1; foreach( $data['mahasiswa'] as $mhs ) : ?>
                    <option value="<?=$mhs['id']?>"><?=$i++?>. <?=$mhs['nama']?></option>
                <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="id_mk">Mata Kuliah :</label>
            <select class="form-control" id="id_mk" name="id_mk" required>
                <?php $i=1; foreach( $data['matakuliah'] as $mk ) : ?>
                    <option value="<?=$mk['id']?>"><?=$i++?>. <?=$mk['nama_mk']?></option>
                <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="nilai">Nilai :</label>
            <input type="number" class="form-control" id="nilai" name="nilai" required>
          </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>




