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
            "components/travel_card.php",
            fullfilled,
            (response) => {
                console.log(response);
                $('#card-container').append(response);
            }
        );
    }).catch(function (error) {
        console.log(error.message);
    });
}

addCard("asdf");
addCard("ciao");