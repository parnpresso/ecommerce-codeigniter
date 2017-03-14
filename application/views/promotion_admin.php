Promotion</br>

Features</br>
- Add, Delete, Edit, View promotion</br>
- Categories</br>
- Search by Categories and Name</br>
- Show 10 promotions of each page</br>
- Add, Delete, View Email with status [sended or not yet]</br>

<div class="container">

  <div class="row">
  <div class="col-lg-6">

      <h3>จัดการโปรโมชั่น</h3>

  </div><!-- /.col-lg-6 -->
  <div class="col-lg-6">
    <div class="input-group pull-right">
      <form class="navbar-form " action="<?php echo base_url('admin/search_promotion');?>" method="post">
      <input type="text" class="form-control" id="username" name="name" placeholder="ค้นหาโปรโมชั่น..." required="">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit">ค้นหา</button>
      </span>
    </form>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->
</br>

      <div class="panel panel-default panel-table">
         <div class="panel-heading">
            <div class="row">
               <div class="col col-xs-3">
                  <!--h3 class="panel-title">Products</h3-->
               </div>

               <div class="col col-xs-9 text-right">
                  <a href="<?php echo base_url('admin/add_product'); ?>"><button type="button" class="btn btn-sm btn-success btn-create">เพิ่มโปรโมชั่น</button></a>
               </div>
            </div>
         </div>

         <div class="panel-body">

            <form method="post" name="frm">
               <table class="table" align="center" border="0">
                  <thead class="thead-default">
                     <tr style="text-align:center">
                        <th>ID</th>
                        <th>ชื่อ</th>
                        <th>รายละเอียก</th>
                        <th>วันที่</th>
                        <th>รูปภาพ</th>
                        <th><center>Update</center></th>
                     </tr>
                  </thead>
                    <?php
                      for ($x = 0; $x <= sizeof($promotionlist)-1; $x++) {
                        echo '<tr>';
                        echo '<td>'. $promotionlist[$x]->id .'</td>';
                        echo '<td>'. $promotionlist[$x]->pro_name .'</td>';
                        echo '<td>'. $promotionlist[$x]->pro_detail .'</td>';
                        echo '<td>'. $promotionlist[$x]->pro_date .'</td>';
                        echo '<td><img width="100px"src="'. public_url()."image/promotion/".$promotionlist[$x]->pro_image .'"/></td>';
                        echo '<td align="center">
                                <a href="'. base_url("admin/view_product/"). $promotionlist[$x]->id .'" class="btn btn-default"><em class="fa fa-eye"></em></a>
                                <a href="'. base_url("admin/edit_product/"). $promotionlist[$x]->id .'" class="btn btn-default"><em class="fa fa-pencil"></em></a>
                                <a href="'. base_url("admin/delete_product/"). $promotionlist[$x]->id .'" onClick="return confirm(\'Are you sure you want to delete?\')" class="btn btn-danger"><em class="fa fa-trash"></em></a>
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
