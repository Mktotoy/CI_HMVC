
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">User List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('user/create'), 'Create', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th>No</th>
		    <th>Login</th>
		    <th>Lastname</th>
		    <th>Firstname</th>
		    <th>Mail</th>
		    <th>MailConfirmed</th>
		    <th>Password</th>
		    <th>Role</th>
		    <th>Createdat</th>
		    <th>Thumbnail</th>
		    <th>Lastip</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($user_data as $user)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
			<td><?php echo $user->login ?></td>
			<td><?php echo $user->lastname ?></td>
			<td><?php echo $user->firstname ?></td>
			<td><?php echo $user->mail ?></td>
			<td><?php echo $user->mailConfirmed ?></td>
			<td><?php echo $user->password ?></td>
			<td><?php echo $user->role ?></td>
			<td><?php echo $user->createdat ?></td>
			<td><?php echo $user->thumbnail ?></td>
			<td><?php echo $user->lastip ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('user/read?login='.$user->login),'Read',array('class' => 'btn btn-xs btn-primary')); 
				echo ' | '; 
				echo anchor(site_url('user/update?login='.$user->login),'Update',array('class' => 'btn btn-xs btn-success')); 
				echo ' | '; 
				echo anchor(site_url('user/delete?login='.$user->login),'Delete',array('class' => 'btn btn-xs btn-danger','onclick="javasciprt: return confirm(\'Are You Sure ?\')"')); 
				?>
			</td>
	        </tr>
                <?php
            }
            ?>
            </tbody><tfoot id="filters">
                <td>No</td>
		    <td>Login</td>
		    <td>Lastname</td>
		    <td>Firstname</td>
		    <td>Mail</td>
		    <td>MailConfirmed</td>
		    <td>Password</td>
		    <td>Role</td>
		    <td>Createdat</td>
		    <td>Thumbnail</td>
		    <td>Lastip</td>
		    <td>Action</td>
            </tfoot></table>
        <div class="col-lg-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> User

                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="linechart"></div>
                        </div>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        
  