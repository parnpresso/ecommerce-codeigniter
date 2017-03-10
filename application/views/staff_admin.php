Staff</br>

Features</br>
- Add, Delete, Edit, View Staff</br>
- Search by Name</br>
- Show 10 staffs of each page</br>

<?php //var_dump($stafflist);?>
<br>
<div class="container">

  <div class="panel panel-default panel-table">
    <div class="panel-heading">
      <div class="row">
        <div class="col col-xs-3">
          <h3 class="panel-title">Staff</h3>
        </div>

        <div class="col col-xs-9 text-right">
          <a href="<?php echo base_url('admin/add_staff'); ?>"><button type="button" class="btn btn-sm btn-success btn-create">Create New</button></a>
        </div>
      </div>
    </div>

    <div class="panel-body">
      <table class="table table-striped table-bordered table-list">
        <thead>
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th><center><em class="fa fa-cog"></em></center></th>
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
              echo '<td align="center">
                      <a href="'. base_url("admin/view_user/"). $stafflist[$x]->user_id .'" class="btn btn-default"><em class="fa fa-eye"></em></a>
                      <a href="'. base_url("admin/edit_user/"). $stafflist[$x]->user_id .'" class="btn btn-default"><em class="fa fa-pencil"></em></a>
                      <a href="'. base_url("admin/delete_user/"). $stafflist[$x]->user_id .'" onClick="return confirm(\'Are you sure you want to delete?\')" class="btn btn-danger"><em class="fa fa-trash"></em></a>
                    </td>';
              echo '</tr>';
            }
          ?>

          </tbody>
        </table>
      </div>

      <div class="panel-footer">
        <div class="row">
          <div class="col col-xs-4">Page 1 of 5
          </div>
          <div class="col col-xs-8">
            <ul class="pagination hidden-xs pull-right">
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
            </ul>
            <ul class="pagination visible-xs pull-right">
              <li><a href="#">«</a></li>
              <li><a href="#">»</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
