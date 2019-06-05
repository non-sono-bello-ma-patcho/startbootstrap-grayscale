import '../scss/listing.scss';

import "./common";
import "./components/searchForm";
import "./components/private_card";
import {getCookie} from "./common";

let filters = JSON.parse(getCookie("filters"));
console.log(filters);
Object.keys(filters).forEach((key, index)=> {
    console.log(`${key} : ${filters[key]}`);
    $(`input[name=${key}]`).val(filters[key]);
});