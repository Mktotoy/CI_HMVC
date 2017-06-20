
        <h2>Usergroupnavigation List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>IDUsergroupnav</th>
		<th>IDUserGroup</th>
		<th>MenuID</th>
		<th>Position</th>
		
            </tr><?php
            foreach ($usergroupnavigation_data as $usergroupnavigation)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $usergroupnavigation->IDUsergroupnav ?></td>
		      <td><?php echo $usergroupnavigation->IDUserGroup ?></td>
		      <td><?php echo $usergroupnavigation->MenuID ?></td>
		      <td><?php echo $usergroupnavigation->Position ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
   