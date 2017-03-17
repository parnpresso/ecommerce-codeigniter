<div class="container">

  <div class="row">
    <div class="col-lg-6">

      <h3>จัดการหน้าหลัก</h3>

    </div><!-- /.col-lg-6 -->
    <div class="col-lg-6">

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
        <!--a href="<?php echo base_url('admin/add_promotion'); ?>"><button type="button" class="btn btn-sm btn-success btn-create">เพิ่มโปรโมชั่น</button></a-->
      </div>
    </div>
  </div>

  <div class="panel-body">

    <form method="post" name="frm">
      <table class="table" align="center" border="0">
        <thead class="thead-default">
          <tr style="text-align:center">
            <th>ID</th>
            <th>หัวเรื่อง</th>
            <th>รายละเอียด</th>
            <th>วันที่</th>
            <th>รูปภาพ</th>
            <th><center>แก้ไข</center></th>
          </tr>
        </thead>
        <?php
        for ($x = 0; $x <= sizeof($contents)-1; $x++) {
          echo '<tr>';
          echo '<td>'. $contents[$x]->id .'</td>';
          echo '<td>'. $contents[$x]->topic .'</td>';
          echo '<td>'. $contents[$x]->detail .'</td>';
          echo '<td>'. $contents[$x]->created .'</td>';
          echo '<td><img width="100px"src="'. public_url()."image/contents/".$contents[$x]->image .'"/></td>';
          echo '<td align="center">
          <a href="'. base_url("admin/edit_home/"). $contents[$x]->id .'" class="btn btn-default"><em class="fa fa-pencil"></em></a>
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
