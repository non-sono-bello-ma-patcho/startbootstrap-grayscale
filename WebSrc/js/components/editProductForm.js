$('#edit_product_searchbtn').click(function () {
    let product = $('#eID').val();
    $.post("php/rest.php", { param : product, op : "searchproduct" },function(response){
        let product_info = JSON.parse(response);
        if(product_info.length <= 0) {
            $('#eID').toggleClass('is-invalid', true);
        }
        else{
            $('#eID').toggleClass('is-invalid', false);

            console.log("loading placeholders");
            // load placeholders dynamically
            for(var key in product_info){
                if(key!=="description" && product_info.hasOwnProperty(key))
                    $("#e"+key).attr("placeholder", product_info[key]);
                else
                    $("#edescription").html(product_info[key]);
            }
        }
    });
});