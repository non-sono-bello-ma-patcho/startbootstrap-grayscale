import {readURL} from "../common";

$("#image").change(function() {
    readURL(this);
});