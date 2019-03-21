<?php
echo
'
<div class="modal fade" id="addproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form  name ="addProduct" action="php/addProduct.php" enctype="multipart/form-data" method="post">
                    <div class="form-row">
                        <div class="col-md-4">
                            <input type="hidden" name="addproductform">
                            <label class="text-muted" for="ID">Product ID</label>
                            <input type="text" name="Productid" id="ID" placeholder="insert product ID..." class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label class="text-muted" for="name">Product Name</label>
                            <input type="text" name="Productname" id="name" placeholder="insert product Name..." class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label class="text-muted" for="price">Product Price</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2">$</span>
                                </div>
                                <input type="text" name="Productprice"  pattern= "[0-9]+" class="form-control" id="price" placeholder="1000" aria-describedby="inputGroupPrepend2" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row px-1 mt-2">
                        <label for="desc" class="text-muted">Product Description</label>
                        <textarea class="form-control" name="Productdescription" id="desc" cols="30"
                                  rows="5">Insert Description...</textarea>
                    </div>
                    <div class="form-row px-1 mt-2">
                        <label for="image" class="text-muted">Product Image</label>
                        <div class="custom-file">
                            <input type="file" name="Productimg" class="custom-file-input" id="image" lang="en" required>
                            <label class="custom-file-label">Select Image</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit"  value="Add" form="addProduct" class="btn btn-primary">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
';