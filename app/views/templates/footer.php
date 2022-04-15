<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="<?= BASEURL; ?>/js/bootstrap.js"></script>
<script>
    $(function() {

        $('.tombolTambahData').on('click', function() {
            $('#formModalLabel').html('Tambah Data Mahasiswa');
            $('.modal-footer button[type=submit]').html('Tambah Data');
            $('#nama').val('');
            $('#nrp').val('');
            $('#email').val('');
            $('#jurusan').val('');
            $('#id').val('');
        });
        //Modal Create Mata kuliah
        $('.tombolTambahDataMK').on('click', function() {
            $('#formModalLabel').html('Tambah Data Mata Kuliah');
            $('.modal-footer button[type=submit]').html('Tambah Data');
            $('#kode_mk').val('');
            $('#nama_mk').val('');
            $('#sks').val('');
            $('#id').val('');
        });
        //Modal Create Mata kuliah Mahasiswa
        $('.tombolTambahDataMKMHS').on('click', function() {
            $('#formModalLabel').html('Tambah Data Mata Kuliah Mahasiswa');
            $('.modal-footer button[type=submit]').html('Tambah Data');
            $('#id_mk').val('');
            $('#id_mhs').val('');
            $('#nilai').val('');
            $('#id').val('');
        });

        $('.tampilModalUbah').on('click', function() {

            $('#formModalLabel').html('Ubah Data Mahasiswa');
            $('.modal-footer button[type=submit]').html('Ubah Data');
            $('.modal-body form').attr('action', '<?= BASEURL; ?>/mahasiswa/ubah');

            const id = $(this).data('id');

            $.ajax({
                url: '<?= BASEURL; ?>/mahasiswa/getubah',
                data: {
                    id: id
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    $('#nama').val(data.nama);
                    $('#nrp').val(data.nrp);
                    $('#email').val(data.email);
                    $('#jurusan').val(data.jurusan);
                    $('#id').val(data.id);
                }
            });

        });
        //Modal update Mata kuliah
        $('.tampilModalUbahMK').on('click', function() {

            $('#formModalLabel').html('Ubah Data Mata Kuliah');
            $('.modal-footer button[type=submit]').html('Ubah Data');
            $('.modal-body form').attr('action', '<?= BASEURL; ?>/matakuliah/ubah');

            const id = $(this).data('id');

            $.ajax({
                url: '<?= BASEURL; ?>/matakuliah/getubah',
                data: {
                    id: id
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    $('#kode_mk').val(data.kode_mk);
                    $('#nama_mk').val(data.nama_mk);
                    $('#sks').val(data.sks);
                    $('#id').val(data.id);
                }
            });

        });
        //Modal update Mata kuliah Mahasiswa
        $('.tampilModalUbahMKMHS').on('click', function() {
            $('#formModalLabel').html('Ubah Data Mata Kuliah Mahasiswa');
            $('.modal-footer button[type=submit]').html('Ubah Data');
            $('.modal-body form').attr('action', '<?= BASEURL; ?>/mkmhs/ubah');

            const id = $(this).data('id');

            $.ajax({
                url: '<?= BASEURL; ?>/mkmhs/getubah',
                data: {
                    id: id
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    $('#id_mhs').val(data.id_mhs);
                    $('#id_mk').val(data.id_mk);
                    $('#nilai').val(data.nilai);
                    $('#id').val(data.id);
                }
            });

        });

    });
</script>
</body>

</html>