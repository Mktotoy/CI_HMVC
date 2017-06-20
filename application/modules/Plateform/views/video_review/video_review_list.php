
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Video_review List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('video_review/create'), 'Create', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('video_review/excel'), 'Excel', 'class="btn btn-success"'); ?>
		<?php echo anchor(site_url('video_review/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th>No</th>
		    <th>Video ReviewId</th>
		    <th>VideoId</th>
		    <th>Login</th>
		    <th>Video ReviewText</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($video_review_data as $video_review)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
			<td><?php echo $video_review->video_reviewId ?></td>
			<td><?php echo $video_review->videoId ?></td>
			<td><?php echo $video_review->login ?></td>
			<td><?php echo $video_review->video_reviewText ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('video_review/read/'.$video_review->video_reviewId),'Read',array('class' => 'btn btn-xs btn-primary')); 
			echo ' | '; 
			echo anchor(site_url('video_review/update/'.$video_review->video_reviewId),'Update',array('class' => 'btn btn-xs btn-success')); 
			echo ' | '; 
			echo anchor(site_url('video_review/delete/'.$video_review->video_reviewId),'Delete',array('class' => 'btn btn-xs btn-danger','onclick="javasciprt: return confirm(\'Are You Sure ?\')"')); 
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
  