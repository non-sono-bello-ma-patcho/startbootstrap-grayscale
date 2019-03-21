<?php
echo '<div class="tab-pane fade" id="admin" role="tabpanel" aria-labelledby="admin">
        <h3 class="text-muted mt-3">Admin Panel</h3>
        <div class="row py-3">
            <button class="btn custom-btn mx-auto" data-toggle="modal" data-target="#addproduct">Add product</button>';
echo get_include('addProduct_modal.php');
echo '  </div>
        <div class="row py-3">
            <button class="btn custom-btn mx-auto" data-toggle="modal" data-target="#editproduct">Edit product</button>';
echo get_include('editProduct_modal.php');
echo '  </div>
        <div class="row py-3">
            <button class="btn custom-btn mx-auto" data-toggle="modal" data-target="#adduser">Add administrator</button>';
echo get_include('addAdmin_modal.php');
echo '  </div>
      </div>';


function get_include($file){
    ob_start();
    require_once $file;
    return ob_get_clean();
}