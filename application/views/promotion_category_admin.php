<div class="container">
  <div class="row">
  <div class="col-lg-6">

      <h3>จัดการประเภทโปรโมชั่น</h3>

  </div><!-- /.col-lg-6 -->
  <div class="col-lg-6">
    <!--div class="input-group pull-right">
      <form class="navbar-form " action="<?php echo base_url('admin/search_user');?>" method="post">
      <input type="text" class="form-control" id="username" name="username" placeholder="ค้นหาผู้ใช้..." required="">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit">ค้นหา</button>
      </span>
    </form>
  </div--><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  </div><!-- /.row -->
  </br>
            <div class="panel panel-default panel-table">
               <div class="panel-heading">
                  <div class="row">
                     <div class="col col-xs-3">
                        <!--h3 class="panel-title">Categories</h3-->
                     </div>

                     <div class="col col-xs-9 text-right">
                        <a href="<?php echo base_url('admin/add_promotion_category'); ?>"><button type="button" class="btn btn-sm btn-success btn-create">เพิ่มประเภทโปรโมชั่น</button></a>
                     </div>
                  </div>
               </div>

               <div class="panel-body">

                  <form method="post" name="frm">
                     <table class="table" align="center" border="0">
                        <thead class="thead-default">
                           <tr style="text-align:center">
                              <th>รหัสประเภทโปรโมชั่น</th>
                              <th>ชื่อประเภทโปรโมชั่น</th>

                           </tr>
                        </thead>
                          <?php
                            for ($x = 0; $x <= sizeof($promotioncategorylist)-1; $x++) {
                              echo '<tr>';
                              echo '<td>'. $promotioncategorylist[$x]->codename .'</td>';
                              echo '<td>'. $promotioncategorylist[$x]->name .'</td>';
                              echo '<td align="center">
                                      <a href="'. base_url("admin/edit_promotion_category/"). $promotioncategorylist[$x]->id .'" class="btn btn-default"><em class="fa fa-pencil"></em></a>
                                      <a href="'. base_url("admin/delete_promotion_category/"). $promotioncategorylist[$x]->id .'" onClick="return confirm(\'Are you sure you want to delete?\')" class="btn btn-danger"><em class="fa fa-trash"></em></a>
                                    </td>';
                              echo '</tr>';
                            }

                          ?>

                        </table>
                     </form>
                  </div>

                  <div class="panel-footer">

                     <nav style="text-align:right">
                        <ul class="pagination">
                           <?php
                            if (isset($pagination)) echo $pagination;

                           ?>
                           </ul>
                        </nav>
                     </div>
                  </div>
