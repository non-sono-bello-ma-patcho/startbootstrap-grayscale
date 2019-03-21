<?php
echo '
<div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="adminmodal">Add Administrator <span class="glyphicon glyphicon-user"></span></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- from here -->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label class="text-muted" for="newusername">Search by username</label>
                                                                <div class="input-group">
                                                                    <input type="text" name="userID" id="newusername" placeholder="Type a username..." class="form-control rightcorners" style="border-top-right-radius: 0 !important; border-bottom-right-radius: 0 !important;">
                                                                    <div class="input-group-append">
                                                                        <a onclick="searchUserbyUsername()">
                                                                            <span class="input-group-text glyphicon glyphicon-search" style="top: 0!important; border-top-left-radius: 0; border-bottom-left-radius: 0;"></span>
                                                                        </a>
                                                                    </div>
                                                                    <div class="invalid-feedback" id="adminufb">No user found</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <form action="php/addAdmin.php" name="addadminform" method = "post" id="addPrivileges" >
                                                        <input type="hidden" name="addadminform">
                                                        <hr>
                                                        <div id="resultlist" class="custom-hidden d-none">
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit"  value="Add Admin" id="adduserbtn" class="btn custom-btn disabled" form="addPrivileges" disabled="disabled">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
';