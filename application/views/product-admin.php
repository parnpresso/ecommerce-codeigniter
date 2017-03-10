Features</br>
[-] Add product [Upload image]</br>
[X] Edit product [URL param change problem]//30MIN</br>
[X] View product</br>
[X] Delete Product</br>
[X] Add Category//</br>
[X] Edit Category//</br>
[X] Delete Category//1HR</br>
[-] Search by Categories and Name</br>
[-] Show 10 product of each page</br>

<div class="container">
      <div class="panel panel-default panel-table">
         <div class="panel-heading">
            <div class="row">
               <div class="col col-xs-3">
                  <h3 class="panel-title">Products</h3>
               </div>

               <div class="col col-xs-9 text-right">
                  <a href="<?php echo base_url('admin/add_product'); ?>"><button type="button" class="btn btn-sm btn-success btn-create">Create New</button></a>
               </div>
            </div>
         </div>

         <div class="panel-body">

            <form method="post" name="frm">
               <table class="table" align="center" border="0">
                  <thead class="thead-default">
                     <tr style="text-align:center">
                        <th>Name</th>
                        <th>Detail</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Update</th>
                     </tr>
                  </thead>
                    <?php
                      for ($x = 0; $x <= sizeof($productlist)-1; $x++) {
                        echo '<tr>';
                        echo '<td><a href="view_product/'. $productlist[$x]->id .'">'. $productlist[$x]->name .'</a></td>';
                        echo '<td>'. $productlist[$x]->detail .'</td>';
                        echo '<td><img src="'. public_url() .'image/product/'. $productlist[$x]->image .'" style="width:100px;height:100px" /></td>';
                        echo '<td>'. $productlist[$x]->cate_name .'</td>';
                        echo '<td>'. $productlist[$x]->price .'</td>';
                        echo '<td><a href="'. base_url("admin/edit_product/"). $productlist[$x]->id .'">Edit</a> | <a href="'. base_url("admin/delete_product/"). $productlist[$x]->id .'" onClick="return confirm(\'Are you sure you want to delete?\')">Delete</a></td>';
                        echo '</tr>';
                      }

                    ?>

                  </table>
               </form>
            </div>

            <div class="panel-footer">

               <nav style="text-align:right">
                  <ul class="pagination">
                     <li>
                        <a href="admin_product.php?page=1" aria-label="Previous">
                           <span aria-hidden="true">&laquo;</span>
                        </a>
                     </li>
                        <li><a href="admin_product.php?page=">1</a></li>

                        <li>
                           <a href="admin_product.php?page=" aria-label="Next">
                              <span aria-hidden="true">&raquo;</span>
                           </a>
                        </li>
                     </ul>
                  </nav>
               </div>
            </div>

          </br>
            <div class="panel panel-default panel-table">
               <div class="panel-heading">
                  <div class="row">
                     <div class="col col-xs-3">
                        <h3 class="panel-title">Categories</h3>
                     </div>

                     <div class="col col-xs-9 text-right">
                        <a href="<?php echo base_url('admin/add_category'); ?>"><button type="button" class="btn btn-sm btn-success btn-create">Create New</button></a>
                     </div>
                  </div>
               </div>

               <div class="panel-body">

                  <form method="post" name="frm">
                     <table class="table" align="center" border="0">
                        <thead class="thead-default">
                           <tr style="text-align:center">
                              <th>ID</th>
                              <th>Codename</th>
                              <th>Name</th>
                              <th>Update</th>
                           </tr>
                        </thead>
                          <?php
                            for ($x = 0; $x <= sizeof($categorylist)-1; $x++) {
                              echo '<tr>';
                              echo '<td>'. $categorylist[$x]->id .'</td>';
                              echo '<td>'. $categorylist[$x]->codename .'</td>';
                              echo '<td>'. $categorylist[$x]->name .'</td>';
                              echo '<td><a href="'. base_url("admin/edit_category/"). $categorylist[$x]->id .'">Edit</a> | <a href="'. base_url("admin/delete_category/"). $categorylist[$x]->id .'" onClick="return confirm(\'Are you sure you want to delete?\')">Delete</a></td>';
                              echo '</tr>';
                            }

                          ?>

                        </table>
                     </form>
                  </div>

                  <div class="panel-footer">

                     <nav style="text-align:right">
                        <ul class="pagination">
                           <li>
                              <a href="admin_product.php?page=1" aria-label="Previous">
                                 <span aria-hidden="true">&laquo;</span>
                              </a>
                           </li>
                              <li><a href="admin_product.php?page=">1</a></li>

                              <li>
                                 <a href="admin_product.php?page=" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                 </a>
                              </li>
                           </ul>
                        </nav>
                     </div>
                  </div>
