<div class="container">

  <div class="row">
  <div class="col-lg-6">

      <h3>จัดการสินค้า</h3>

  </div><!-- /.col-lg-6 -->
  <div class="col-lg-6">
    <div class="input-group pull-right">
      <form class="navbar-form " action="<?php echo base_url('admin/search_product');?>" method="post">
      <input type="text" class="form-control" id="username" name="username" placeholder="ค้นหาสินค้า..." required="">
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
                  <a href="<?php echo base_url('admin/add_product'); ?>"><button type="button" class="btn btn-sm btn-success btn-create">เพิ่มสินค้า</button></a>
               </div>
            </div>
         </div>

         <div class="panel-body">

            <form method="post" name="frm">
               <table class="table" align="center" border="0">
                  <thead class="thead-default">
                     <tr style="text-align:center">
                        <th>ชื่อ</th>
                        <th>น้ำหนัก</th>
                        <th>ขนาด</th>
                        <th>ประเภทสินค้า</th>
                        <th>ราคา</th>
                        <th>หน่วย</th>
                        <th><center>Update</center></th>
                     </tr>
                  </thead>
                    <?php
                      for ($x = 0; $x <= sizeof($productlist)-1; $x++) {
                        echo '<tr>';
                        echo '<td><a href="view_product/'. $productlist[$x]->id .'">'. $productlist[$x]->name .'</a></td>';
                        echo '<td>'. $productlist[$x]->weight .'</td>';
                        echo '<td>'. $productlist[$x]->size .'</td>';
                        //echo '<td><img src="'. public_url() .'image/product/'. $productlist[$x]->image .'" style="width:100px;height:100px" /></td>';
                        echo '<td>'. $productlist[$x]->cate_name .'</td>';
                        echo '<td>'. $productlist[$x]->price .'</td>';
                        echo '<td>'. $productlist[$x]->unit .'</td>';
                        echo '<td align="center">
                                <a href="'. base_url("admin/view_product/"). $productlist[$x]->id .'" class="btn btn-default"><em class="fa fa-eye"></em></a>
                                <a href="'. base_url("admin/edit_product/"). $productlist[$x]->id .'" class="btn btn-default"><em class="fa fa-pencil"></em></a>
                                <a href="'. base_url("admin/delete_product/"). $productlist[$x]->id .'" onClick="return confirm(\'Are you sure you want to delete?\')" class="btn btn-danger"><em class="fa fa-trash"></em></a>
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
