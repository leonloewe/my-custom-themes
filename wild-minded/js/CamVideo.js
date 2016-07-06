
function create_stream(){
    var video = document.getElementById('video'),
        canvas = document.getElementById('canvas'),
        context = canvas.getContext('2d'),
       // photo = document.getElementById('photo'),
        save = document.getElementById('cam_img_save'),
        vendorUrl = window.URL || window.webkitURL;
    navigator.getMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
    navigator.getMedia({
        video: true,
        audio: false
    }, function(stream) {
        video.src = vendorUrl.createObjectURL(stream);
        video.play();
    }, function(error) {
        alert('Error! Something went wrong, try later.');
    });
    var i = 0;
    document.getElementById('capture').addEventListener('click', function() {
    i++;
        if(!($(this).hasClass('fa-pause-circle-o'))){
            context.drawImage(video, 0, 0, 400, 300);
           // photo.setAttribute('src', canvas.toDataURL('image/png'));
           save.setAttribute('href', canvas.toDataURL('image/png'));
            $("#video").slideUp();
            $("#cam_content_canvas").slideDown();
            $("#capture").toggleClass('fa-pause-circle-o fa-dot-circle-o');
            create_edit ( canvas.toDataURL('image/png'),i);
        }else{
            $("#video").slideDown();
            $("#cam_content_canvas").slideUp();
            $("#capture").toggleClass('fa-pause-circle-o fa-dot-circle-o');

        }

    });
}

function create_edit (url, i){

    var canvas = document.createElement('CANVAS');
    var canvasid = "canvas"+i;
    canvas.id = canvasid;

    console.log( $("#cam_content_canvas").children().length);
    if( $("#cam_content_canvas").children().length>=1){
        $("#cam_content_canvas").find('canvas').remove();
    }
    document.getElementById('cam_content_canvas').appendChild(canvas); // adds the canvas to #someBox


    var savea = document.getElementById('cam_img_save');
    var ctx = canvas.getContext('2d');
    /* Enable Cross Origin Image Editing */


    var img = new Image();
    img.crossOrigin = '';
    img.src = url;

    img.onload = function() {
        canvas.width = img.width;
        canvas.height = img.height;
        ctx.drawImage(img, 0, 0, img.width, img.height);
    }

    var $reset = $('#resetbtn');


    /* As soon as slider value changes call applyFilters */
    $('input[type=range]').change(applyFilters);

    function applyFilters() {
        var hue = parseInt($('#hue').val());
        var cntrst =parseInt($('#contrast').val());;
        var vibr = 0;
        var sep = 0;

        Caman('#'+canvasid, img, function() {
            this.revert(false);
            console.log(this);
            this.hue(hue).contrast(cntrst).vibrance(vibr).sepia(sep).render(function() {
                var editedImg = this.toBase64();
                savea.setAttribute('href', editedImg);
            });
        });
    }

    /* Creating custom filters */
    Caman.Filter.register("oldpaper", function() {
        this.pinhole();
        this.noise(10);
        this.orangePeel();
        this.render();
    });

    Caman.Filter.register("pleasant", function() {
        this.colorize(60, 105, 218, 10);
        this.contrast(10);
        this.sunrise();
        this.hazyDays();
        this.render();
    });

    $reset.on('click', function(e) {
        $('input[type=range]').val(0);
        Caman('#canvasn', img, function() {
            this.revert(false);
            this.render();
        });
    });






}
