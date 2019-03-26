function addCard(product_id){
    let productInfo;
    new Promise((resolve, reject)=>{
         $.get(
            "php/formUtility.php",
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
                $('#card-container').append(response);
            }
        );
    }).catch(function (error) {
        console.log(error.message);
    });
}

function addtoCart(elem){
    console.log("Ugh it work, code_product: "+$(elem).attr('id'));
    $(elem).toggleClass('far').toggleClass('fas')
}

addCard("asdf");
addCard("ABC-100");