<?php //var_dump($orders); ?>
<div class="container">

  <div class="row">
  <div class="col-lg-6">

      <h3>จัดการใบสั่งสินค้า</h3>

  </div><!-- /.col-lg-6 -->
  <div class="col-lg-6">
    <div class="input-group pull-right">
      <form class="navbar-form " action="<?php echo base_url('admin/search_order');?>" method="post">
      <input type="text" class="form-control" id="username" name="username" placeholder="ค้นหาใบสั่งสินค้า..." required="">
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

               <!--div class="col col-xs-9 text-right">
                  <a href="<?php echo base_url('admin/add_product'); ?>"><button type="button" class="btn btn-sm btn-success btn-create">เพิ่มสินค้า</button></a>
               </div-->
            </div>
         </div>

         <div class="panel-body">

            <form method="post" name="frm">
               <table class="table" align="center" border="0">
                  <thead class="thead-default">
                     <tr style="text-align:center">
                        <th>รหัสใบสั่งซื้อ</th>
                        <th>วันที่</th>
                        <th>ผู้สั่ง</th>
                        <th>ราคาทั้งหมด</th>
                        <!--th><center>Update</center></th-->
                     </tr>
                  </thead>

                    <?php
                      for ($x = 0; $x <= sizeof($orders)-1; $x++) {
                        $totalprice = 0;
                        for ($y = 0; $y <= sizeof($orders[$x])-1; $y++) {
                          $totalprice += $orders[$x][$y]->product_quantity * $orders[$x][$y]->product_price;
                        }
                        echo '<tr>';

                        echo '<td><a href="view_order/'. $orders[$x][0]->order_id .'">'. $orders[$x][0]->order_id .'</a></td>';
                        echo '<td>'. $orders[$x][0]->date .'</td>';
                        echo '<td>'. $orders[$x][0]->username .'</td>';
                        echo '<td>฿'. $totalprice .'</td>';
                        /*echo '<td align="center">
                                <a href="'. base_url("admin/view_product/"). $orders[$x]->id .'" class="btn btn-default"><em class="fa fa-eye"></em></a>
                                <a href="'. base_url("admin/edit_product/"). $orders[$x]->id .'" class="btn btn-default"><em class="fa fa-pencil"></em></a>
                                <a href="'. base_url("admin/delete_product/"). $orders[$x]->id .'" onClick="return confirm(\'Are you sure you want to delete?\')" class="btn btn-danger"><em class="fa fa-trash"></em></a>
                              </td>';*/
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
