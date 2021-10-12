<div class="row">
    <div class="col-md-12 offset-8">
        <p>Ambil Gambar</p>
        <div id="camera">Capture</div>
        <form id="kirim">
            <div id="webcam">
                <input type=button value="Capture" onClick="preview()">
            </div>
            <div id="simpan" style="display:none">
                <input type=button value="Remove" onClick="ulang()">
                <input type=submit value="Save" onClick="simpan()" style="font-weight:bold;">
            </div>
            <div>
                <input type="submit" value="kirim">
            </div>
        </form>
    </div>
</div>

<script>
    // konfigursi webcam
    Webcam.set({
        width: 320,
        height: 240,
        image_format: 'jpg',
        jpeg_quality: 100
    });
    Webcam.attach('#camera');

    function preview() {
        // untuk preview gambar sebelum di upload
        Webcam.freeze();
        // ganti display webcam menjadi none dan simpan menjadi terlihat
        document.getElementById('webcam').style.display = 'none';
        document.getElementById('simpan').style.display = '';
    }

    function ulang() {
        // batal preview
        Webcam.unfreeze();

        // ganti display webcam dan simpan seperti semula
        document.getElementById('webcam').style.display = '';
        document.getElementById('simpan').style.display = 'none';
    }

    $('#kirim').on('submit', function(event) {
        event.preventDefault();
        var image = '';
        var id_karyawan = $('#id_karyawan').val();
        var nama_karyawan = $('#nama_karyawan').val();
        var password = $('#password').val();
        Webcam.snap(function(data_uri) {
            image = data_uri;
        });
        $.ajax({
            url: '<?php echo base_url("absen/dami"); ?>',
            type: 'POST',
            dataType: 'json',
            data: {
                username: username,
                email: email,
                password: password,
                image: image
            },
        })
    });
    // function simpan() {
    //     // ambil foto
    //     Webcam.snap(function(data_uri) {

    //         // upload foto
    //         Webcam.upload(data_uri, 'upload.php', function(code, text) {});

    //         // tampilkan hasil gambar yang telah di ambil
    //         document.getElementById('hasil').innerHTML =
    //             '<p>Hasil : </p>' +
    //             '<img src="' + data_uri + '"/>';

    //         Webcam.unfreeze();

    //         document.getElementById('webcam').style.display = '';
    //         document.getElementById('simpan').style.display = 'none';
    //     });
    // }
</script>