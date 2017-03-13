<br>
<div class="container">

  <div class="row">
  <div class="col-lg-6">

      <!--h4>ผู้ใช้ทั้งหมด</h4-->

  </div><!-- /.col-lg-6 -->
  <div class="col-lg-6">
    <div class="input-group pull-right">
      <form class="navbar-form " action="<?php echo base_url('admin/search_user');?>" method="post">
      <input type="text" class="form-control" id="username" name="username" placeholder="ค้นหาผู้ใช้..." required="">
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
          <h3 class="panel-title">User</h3>
        </div>

        <div class="col col-xs-9 text-right">
          <a href="<?php echo base_url('admin/add_user'); ?>"><button type="button" class="btn btn-sm btn-success btn-create">Create New</button></a>
        </div>
      </div>
    </div>

    <div class="panel-body">
      <table class="table table-striped table-bordered table-list">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th><center><em class="fa fa-cog"></em></center></th>
          </tr>
        </thead>
        <tbody>
          <?php
            for ($x = 0; $x <= sizeof($userlist)-1; $x++) {
              echo '<tr>';
              echo '<td>'. $userlist[$x]->id .'</td>';
              echo '<td>'. $userlist[$x]->username_cus .'</td>';
              echo '<td>'. $userlist[$x]->email_cus .'</td>';
              echo '<td>'. $userlist[$x]->fname_cus .'</td>';
              echo '<td>'. $userlist[$x]->lname_cus .'</td>';
              echo '<td align="center">
                      <a href="'. base_url("admin/view_user/"). $userlist[$x]->id .'" class="btn btn-default"><em class="fa fa-eye"></em></a>
                      <a href="'. base_url("admin/edit_user/"). $userlist[$x]->id .'" class="btn btn-default"><em class="fa fa-pencil"></em></a>
                      <a href="'. base_url("admin/delete_user/"). $userlist[$x]->id .'" onClick="return confirm(\'Are you sure you want to delete?\')" class="btn btn-danger"><em class="fa fa-trash"></em></a>
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
