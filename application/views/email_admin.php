<?php //var_dump($categories);
//break; ?>

<div class="container">

  <div class="row">
    <div class="col-lg-6">

      <h3>ส่งโปรโมชั่น</h3>

    </div><!-- /.col-lg-6 -->
    <!--div class="col-lg-6">
      <div class="input-group pull-right">
        <form class="navbar-form " action="<?php echo base_url('admin/search_promotion');?>" method="post">
          <input type="text" class="form-control" id="username" name="name" placeholder="ค้นหาโปรโมชั่น..." required="">
          <span class="input-group-btn">
            <button class="btn btn-default" type="submit">ค้นหา</button>
          </span>
        </form>
      </div><!-- /input-group -->
    <!--/div><!-- /.col-lg-6 -->
  </div><!-- /.row -->
</br>

<form method="post" action="<?php echo base_url('admin/send');?>">
<div class="row">
  <div class="col col-md-3">
    <label for="sel1">เลือกประเภทโปรโมชั่นที่ต้องการส่ง</label>
    <select class="form-control" id="promotion" name="promotion">
      <?php
        for ($x = 0; $x <= sizeof($categories)-1; $x++) {
          echo '<option value="'.$categories[$x]->id.'">'.$categories[$x]->name.'</option>';
        }
      ?>

    </select>
  </div>


  <div class="col col-md-3">
      <button type="submit" class="btn btn-sm btn-success btn-create"><h4>ส่ง</h4></button>
  </div>
</div>
</form>


<div class="panel panel-default panel-table">
  <div class="panel-heading">
    <div class="row">
      <div class="col col-xs-3">
        <!--h3 class="panel-title">Products</h3-->
      </div>
    </div>
  </div>

  <div class="panel-body">

    <form method="post" name="frm">
      <table class="table" align="center" border="0">
        <thead class="thead-default">
          <tr style="text-align:center">
            <th>ID</th>
            <th>อีเมล</th>
            <th><center>Update</center></th>
          </tr>
        </thead>
        <?php
        for ($x = 0; $x <= sizeof($emaillist)-1; $x++) {
          echo '<tr>';
          echo '<td>'. $emaillist[$x]->id .'</td>';
          echo '<td>'. $emaillist[$x]->gen_email .'</td>';
          echo '<td align="center">
          <a href="'. base_url("admin/delete_email/"). $emaillist[$x]->id .'" onClick="return confirm(\'Are you sure you want to delete?\')" class="btn btn-danger"><em class="fa fa-trash"></em></a>
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
