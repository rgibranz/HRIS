    <form method="POST" action="<?= base_url('absen/add') ?>">
        <div class="row justify-content-center">
            <div class="col-md-6 mx-auto">
                <div id="my_camera"></div>
                <br />
                <input type=button value="Take Snapshot" onClick="take_snapshot()">
                <input type="hidden" name="image" class="image-tag">
                <input type="text" name="status" value="pulang" hidden readonly>
            </div>
            <div class="col-md-6 mx-auto">
                <div id="results"></div>
            </div>
            <div class="col-md-12 text-center">
                <br />
                <button class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>

    <script language="JavaScript">
        Webcam.set({
            width: 490,
            height: 390,
            image_format: 'jpeg',
            jpeg_quality: 90
        });

        Webcam.attach('#my_camera');

        function take_snapshot() {
            Webcam.snap(function(data_uri) {
                $(".image-tag").val(data_uri);
                document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
            });
        }
    </script>