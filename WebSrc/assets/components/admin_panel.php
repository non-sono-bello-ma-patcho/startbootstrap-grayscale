<?php
echo '<div class="tab-pane fade" id="admin" role="tabpanel" aria-labelledby="admin">
        <h3 class="text-muted mt-3">Admin Panel</h3>
        <div class="row py-3">
            <button class="btn custom-btn mx-auto" data-toggle="modal" data-target="#addproduct">Add product</button>
            <%=require("./addProduct_modal_component.html")%> 
        </div>
        <div class="row py-3">
            <button class="btn custom-btn mx-auto" data-toggle="modal" data-target="#editproduct">Edit product</button>
            <%=require("./editProduct_modal_component.html")%>
        </div>
        <div class="row py-3">
            <button class="btn custom-btn mx-auto" data-toggle="modal" data-target="#adduser">Add administrator</button>
            <%=require("./addAdmin_modal_component.html")%>
        </div>
      </div>';
