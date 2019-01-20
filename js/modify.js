function loadname() {
    var full_path =$('#inputGroupFile01').val();
    var filename = full_path.substring(full_path.lastIndexOf('\\')+1, full_path.length);
    $('#inputGroupFile01label').text(filename);
    console.log("got filename: "+filename+"\n");
}

function loadDiv(doc, target){
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", doc, true);
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById(target).innerHTML =
                this.responseText;
        }
    };
    xhttp.send();
}

function displayPreview(input){
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#preview')
                .attr('src', e.target.result)
                .width(115)
                .height(115);
        };

        reader.readAsDataURL(input.files[0]);
    }
}