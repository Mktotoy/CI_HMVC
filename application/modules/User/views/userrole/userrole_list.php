
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Userrole List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('userrole/create'), 'Create', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('userrole/excel'), 'Excel', 'class="btn btn-success"'); ?>
		<?php echo anchor(site_url('userrole/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th>No</th>
		    <th>Id</th>
		    <th>Name</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($userrole_data as $userrole)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
			<td><?php echo $userrole->id ?></td>
			<td><?php echo $userrole->name ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('userrole/read/'.$userrole->id),'Read',array('class' => 'btn btn-xs btn-primary')); 
			echo ' | '; 
			echo anchor(site_url('userrole/update/'.$userrole->id),'Update',array('class' => 'btn btn-xs btn-success')); 
			echo ' | '; 
			echo anchor(site_url('userrole/delete/'.$userrole->id),'Delete',array('class' => 'btn btn-xs btn-danger','onclick="javasciprt: return confirm(\'Are You Sure ?\')"')); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
  