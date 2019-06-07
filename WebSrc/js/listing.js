import '../scss/listing.scss';

import "./common";
import "./components/searchForm";
import "./components/private_card";
import {getCookie} from "./common";

try{

    let filters = JSON.parse(getCookie("filters"));
    console.log(filters);
    Object.keys(filters).forEach((key, index)=> {
        if(key !== 'level'){
            console.log(`${key} : ${filters[key]}`);
            let $input = $(`input[name=${key}]`);
            if($input.attr('type')==='checkbox')
                $input.prop("checked", true);
            else
                $input.val(filters[key]);
        }
        else {
            let $option = $(`select[name=${key}] option[value=${filters[key]}]`);

            $option.each((i, elem)=>{
                $(elem).prop('selected', true);
                let _text = $(elem).text();
                let _class = _text === "select"? "primary" : _text;
                $(elem).parent().trigger("change", [_class, _text]);
            });
        }
    });
} catch (e) {
    console.error("no filters to load");
}