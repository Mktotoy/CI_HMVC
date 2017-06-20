
        <h2 style="margin-top:0px">Ci_nav_items List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('ci_nav_items/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('ci_nav_items/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('ci_nav_items'); ?>" class="btn btn-default">Reset</a>
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
		<th>ItemID</th>
		<th>ItemName</th>
		<th>ItemHumanName</th>
		<th>ItemLink</th>
		<th>ParentItem</th>
		<th>Action</th>
            </tr><?php
            foreach ($ci_nav_items_data as $ci_nav_items_line)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $ci_nav_items_line->ItemID ?></td>
			<td><?php echo $ci_nav_items_line->ItemName ?></td>
			<td><?php echo $ci_nav_items_line->ItemHumanName ?></td>
			<td><?php echo $ci_nav_items_line->ItemLink ?></td>
			<td><?php echo isset($ci_nav_items[$ci_nav_items_line->ParentItem])?$ci_nav_items[$ci_nav_items_line->ParentItem]:''; ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('ci_nav_items/read/'.$ci_nav_items_line->ItemID),'Read',array('class' => 'btn btn-xs btn-primary'));
				echo ' | '; 
				echo anchor(site_url('ci_nav_items/update/'.$ci_nav_items_line->ItemID),'Update',array('class' => 'btn btn-xs btn-success'));
				echo ' | '; 
				echo anchor(site_url('ci_nav_items/delete/'.$ci_nav_items_line->ItemID),'Delete',array('class' => 'btn btn-xs btn-danger','onclick="javascript: return confirm(\'Are You Sure ?\')"'));
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
		<?php echo anchor(site_url('ci_nav_items/excel'), 'Excel', 'class="btn btn-success"'); ?>
		<?php echo anchor(site_url('ci_nav_items/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
   