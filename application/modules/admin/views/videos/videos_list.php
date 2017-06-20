
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Videos List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('videos/create'), 'Create', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('videos/excel'), 'Excel', 'class="btn btn-success"'); ?>
		<?php echo anchor(site_url('videos/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th>No</th>
		    <th>VideoId</th>
		    <th>VideoDate</th>
		    <th>VideoTitle</th>
		    <th>VideoDescription</th>
		    <th>VideoRessourceId</th>
		    <th>VideoState</th>
		    <th>ChannelID</th>
		    <th>VideoThumbnail</th>
		    <th>Pertinent</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($videos_data as $videos)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
			<td><?php echo $videos->videoId ?></td>
			<td><?php echo $videos->videoDate ?></td>
			<td><?php echo $videos->videoTitle ?></td>
			<td><?php echo $videos->videoDescription ?></td>
			<td><?php echo $videos->videoRessourceId ?></td>
			<td><?php echo $videos->videoState ?></td>
			<td><?php echo $videos->channelID ?></td>
			<td><?php echo $videos->videoThumbnail ?></td>
			<td><?php echo $videos->pertinent ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('videos/read/'.$videos->videoId),'Read',array('class' => 'btn btn-xs btn-primary')); 
			echo ' | '; 
			echo anchor(site_url('videos/update/'.$videos->videoId),'Update',array('class' => 'btn btn-xs btn-success')); 
			echo ' | '; 
			echo anchor(site_url('videos/delete/'.$videos->videoId),'Delete',array('class' => 'btn btn-xs btn-danger','onclick="javasciprt: return confirm(\'Are You Sure ?\')"')); 
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
  