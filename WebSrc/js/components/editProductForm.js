$('.search-input-group input').on("change", function () {
    if($(this).val()!=="")
        $(this).parent().toggle('collapse');
});

$('#edit-search-btn').click(()=>{
    let $searchInput = $('#product-edit');
    let $data = { 'code' : $searchInput.val()};

    console.log(`looking for ${$searchInput.val()} information`);
    $.ajax({
        contentType : "application/json",
        data : JSON.stringify($data),
        type : 'POST',
        processData: false,
        url : `rest/getProductInfo.php`
    }).done((response)=>{
        console.log(`got response: ${response}`);
        // se la richiesta va a buon fine carico i place holder, se il risultato è vuoto, attivo la classe invalid sull'input testuale
        if(response.length === 0){
            // display empty message
            $searchInput.addClass('is-invalid');
        }
        else{
            console.log(`loading placeholders`);
            // load all promise
            for(let key in response){
                console.log(`loading placeholder for input: ${key}`);
                let $target = $(`#e${key}`);

                switch(key){
                    case 'description':
                        if(response.hasOwnProperty(key))
                            $target.html(response[key]);
                        break;
                    case 'guide':
                    case 'housing':
                        if(response.hasOwnProperty(key) && response[key]) $target.attr('checked');
                           break;
                    default:
                        if(response.hasOwnProperty(key) && response[key]!==null)
                            $target.val(response[key]);
                        // valori di tipo testuale o numerico
                }
            }
        }
    }).fail(()=>$searchInput.addClass('is-invalid'));
});

    /*function () {
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
}*/