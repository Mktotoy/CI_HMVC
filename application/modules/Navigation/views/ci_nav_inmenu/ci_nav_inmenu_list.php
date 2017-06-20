
        <h2 style="margin-top:0px">Ci_nav_inmenu List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('ci_nav_inmenu/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('ci_nav_inmenu/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('ci_nav_inmenu'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>KeyID</th>
		<th>MenuID</th>
		<th>ItemID</th>
		<th>LinkWeight</th>
		<th>Action</th>
            </tr><?php
            foreach ($ci_nav_inmenu_data as $ci_nav_inmenu)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $ci_nav_inmenu->KeyID ?></td>
			<td><?php echo $ci_nav_menus[$ci_nav_inmenu->MenuID] ?></td>
			<td><?php echo $ci_nav_items[$ci_nav_inmenu->ItemID] ?></td>
			<td><?php echo $ci_nav_inmenu->LinkWeight ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('ci_nav_inmenu/read/'.$ci_nav_inmenu->KeyID),'Read',array('class' => 'btn btn-xs btn-primary'));
				echo ' | '; 
				echo anchor(site_url('ci_nav_inmenu/update/'.$ci_nav_inmenu->KeyID),'Update',array('class' => 'btn btn-xs btn-success'));
				echo ' | '; 
				echo anchor(site_url('ci_nav_inmenu/delete/'.$ci_nav_inmenu->KeyID),'Delete',array('class' => 'btn btn-xs btn-danger','onclick="javascript: return confirm(\'Are You Sure ?\')"'));
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('ci_nav_inmenu/excel'), 'Excel', 'class="btn btn-success"'); ?>
		<?php echo anchor(site_url('ci_nav_inmenu/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
   