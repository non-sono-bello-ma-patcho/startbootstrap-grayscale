let username = document.cookie.match(/user=([a-zA-Z0-9]+)/)[1];

console.log(username);

function addCard(product_id, target){
    let productInfo;
    return new Promise((resolve, reject)=>{
         $.get(
            "php/rest.php",
            { param : product_id, op : "searchproduct"},
            (response) => {
                if(response !== "[]"){
                    productInfo = JSON.parse(response);
                    resolve(productInfo);
                }
                else{
                    reject(new Error("Couldn't load product"));
                }
            }
        );
    }).then((fullfilled) => { // in fullfilled c'è la robaccia che ho settato prima;
        $.get(
            "components/private_card.php",
            fullfilled,
            (response) => {
                target.append(response);
            }
        );
        console.log("appended");
    }).catch(function (error) {
        console.log(error.message);
    });
}

$(document).on('click', '.manage-cart', function(e){
    let btn = $(this);
    let id = btn.data('id');
    let cmd = btn.data('cmd')+'_to_cart';

    console.log("calling rest with: "+id+", "+cmd+", "+username);

    $.post(
        'php/rest.php',
        {
            param : cmd ,
            id : id,
            username : username,
            op : cmd
        },
        (response, status) => {
            console.log("status: "+status);
        }
    );

});

function addtoCart(elem){
    console.log("Ugh it work, code_product: "+$(elem).attr('id'));
    if($(this).is(':checked')) $(this).toggleClass('far').toggleClass('fas');
/*    var attr = $(elem).attr('id').match(/add_([a-zA-Z0-9]+)/);
    console.log(attr);
    var prod_code = attr ? attr[1] : "none";
    console.log("got prod_code: "+prod_code);
    $(elem).closest("#remove_"+prod_code).toggleClass('d-none', false);
    console.log("class toggled");*/
}

