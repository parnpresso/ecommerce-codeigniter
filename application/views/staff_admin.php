</br>
<div class="container">

  <div class="row">
  <div class="col-lg-6">

      <h3>จัดการผู้ใช้งานระบบ</h3>

  </div><!-- /.col-lg-6 -->
  <div class="col-lg-6">
    <div class="input-group pull-right">
      <form class="navbar-form " action="<?php echo base_url('admin/search_staff');?>" method="post">
      <input type="text" class="form-control" id="username" name="username" placeholder="ค้นหาผู้ใช้งานระบบ..." required="">
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
          <!--h3 class="panel-title">Staff</h3-->
        </div>

        <div class="col col-xs-9 text-right">
          <a href="<?php echo base_url('admin/add_staff'); ?>"><button type="button" class="btn btn-sm btn-success btn-create">เพิ่มผู้ใช้งานระบบ</button></a>
        </div>
      </div>
    </div>

    <div class="panel-body">
      <table class="table table-striped table-bordered table-list">
        <thead>
          <tr>
            <th>ID</th>
            <th>ชื่อบัญชี</th>
            <th>อีเมล</th>
            <th>ชื่อจริง</th>
            <th>นามสกุล</th>
            <th>สิทธิ์การใช้งาน</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
            for ($x = 0; $x <= sizeof($stafflist)-1; $x++) {
              echo '<tr>';
              echo '<td>'. $stafflist[$x]->user_id .'</td>';
              echo '<td>'. $stafflist[$x]->username_staff .'</td>';
              echo '<td>'. $stafflist[$x]->email_staff .'</td>';
              echo '<td>'. $stafflist[$x]->fname_staff .'</td>';
              echo '<td>'. $stafflist[$x]->lname_staff .'</td>';
              echo '<td>'. $stafflist[$x]->Status .'</td>';
              echo '<td align="center">
                      <a href="'. base_url("admin/view_staff/"). $stafflist[$x]->user_id .'" class="btn btn-default"><em class="fa fa-eye"></em></a>
                      <a href="'. base_url("admin/edit_staff/"). $stafflist[$x]->user_id .'" class="btn btn-default"><em class="fa fa-pencil"></em></a>
                      <a href="'. base_url("admin/delete_staff/"). $stafflist[$x]->user_id .'" onClick="return confirm(\'Are you sure you want to delete?\')" class="btn btn-danger"><em class="fa fa-trash"></em></a>
                    </td>';
              echo '</tr>';
            }
          ?>

          </tbody>
        </table>
      </div>

      <div class="panel-footer">
        <div class="row">
          <div class="col col-xs-4">
          </div>
          <div class="col col-xs-8">
            <ul class="pagination hidden-xs pull-right">
              <?php
                if(isset($pagination)) {
                  echo $pagination;
                }
              ?>
            </ul>
            <ul class="pagination visible-xs pull-right">
              <li><a href="#">«</a></li>
              <li><a href="#">»</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
