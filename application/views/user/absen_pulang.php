<div class="">

    <video autoplay id="video-webcam">
        Izinkan untuk Mengakses Webcam untuk Demo
    </video>
    <input type="hidden" name="image" class="image-tag">
    <input type="text" name="status" value="masuk" hidden readonly>

    <button onclick="takeSnapshot()">Ambil Gambar</button>

    <button class="btn btn-success">Submit</button>

</div>

<script>
    var video = document.querySelector("#video-webcam");

    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;

    if (navigator.getUserMedia) {
        navigator.getUserMedia({
            video: true
        }, handleVideo, videoError);
    }

    function handleVideo(stream) {
        video.src = window.URL.createObjectURL(stream);
        console.log(stream);
    }

    function videoError(e) {
        // do something
        alert("Izinkan menggunakan webcam untuk demo!")
    }

    function takeSnapshot() {
        var img = document.createElement('img');
        var context;
        var width = video.offsetWidth,
            height = video.offsetHeight;

        canvas = document.createElement('canvas');
        canvas.width = width;
        canvas.height = height;

        context = canvas.getContext('2d');
        context.drawImage(video, 0, 0, width, height);

        img.src = canvas.toDataURL('image/png');
        document.body.appendChild(img);
    }
</script>