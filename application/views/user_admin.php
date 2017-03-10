User</br>

Features</br>
- Add, Delete, Edit, View products</br>
- Search by  Name</br>
- Show 10 users of each page</br>
- View order log</br>

<?php //var_dump($userlist);?>
<br>
<div class="container">

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

      <?php
        $amount = sizeof($userlist);
        $allpage = floor($amount/10) + 1;
      ?>
      <div class="panel-footer">
        <div class="row">
          <div class="col col-xs-4"><?php echo 'Page '. $amount .' of '. $allpage;?>
          </div>
          <div class="col col-xs-8">
            <ul class="pagination hidden-xs pull-right">
              <?php
                for($x = 1; $x <= $allpage; $x++){
                  echo '<li><a href="#">'. $x .'</a></li>';
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
