import "../common";
import "./fontawesome";
import {addCard, addSpinner, removeSpinner} from "../common";

let $idSearch = $('#admin-search');
let $searchBtn = $('#search-admin-btn');
let $targetContainer = $('#user-list-container');
let $addAdminBtn = $('#add-admin-submit');
$idSearch.keyup(()=>$idSearch.removeClass('is-invalid'));

$searchBtn.click(()=>{
    let $data = { username : $idSearch.val()};

    addSpinner($searchBtn);
    $addAdminBtn.attr('disabled', true).addClass('disabled');
    // search users
    $.ajax({
        contentType : "application/json",
        data : JSON.stringify($data),
        type : 'POST',
        processData: false,
        url : `rest/listUsers.php`
    }).done((response)=>{
        if(response.length === 0) {
            $idSearch.addClass('is-invalid');
        }
        else
        {
            $targetContainer.empty();
            let promises = [];
            response.forEach((item) => promises.push(addCard(item, $targetContainer, 'user')));
            $targetContainer.hide();
            Promise.all(promises).then(()=>{
                $targetContainer.fadeIn('slow');
            });
        }
    })
    .fail(()=>console.log('couldn\'t load user information...'))
    .always(() => removeSpinner($searchBtn));
});

$(document).on('click', '.user-card .slider', () => $addAdminBtn.attr('disabled', false).removeClass('disabled'));