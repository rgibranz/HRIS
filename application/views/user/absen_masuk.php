        <div class="col-md-12">
            <form method="POST" action="<?= base_url('absen/add') ?>">

                <div class="row">
                    <div class="col-md-6">
                        <div id="my_camera"></div>
                        <br />
                        <input type=button value="Take Snapshot" onClick="take_snapshot()">
                        <input type="hidden" name="image" class="image-tag">
                        <input type="text" name="status" value="masuk" hidden readonly>
                    </div>

                    <div class="col-md-6">
                        <div class="card-mx-auto"></div>
                        <div id="results"></div>
                        <br />
                    </div>
                </div>


                <div class="col-md-12 text-center">
                    <br />
                    <button class="btn btn-success">Submit</button>
                </div>
            </form>

        </div>

        <script language="JavaScript">
            Webcam.set({
                width: 320,
                height: 240,
                image_format: 'jpeg',
                jpeg_quality: 90,

            });

            Webcam.attach('#my_camera');

            function take_snapshot() {
                Webcam.snap(function(data_uri) {
                    $(".image-tag").val(data_uri);
                    document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
                });
            }
        </script>