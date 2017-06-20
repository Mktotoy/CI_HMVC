
        <h2>Ci_nav_inmenu List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>KeyID</th>
		<th>MenuID</th>
		<th>ItemID</th>
		<th>LinkWeight</th>
		
            </tr><?php
            foreach ($ci_nav_inmenu_data as $ci_nav_inmenu)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $ci_nav_inmenu->KeyID ?></td>
		      <td><?php echo $ci_nav_inmenu->MenuID ?></td>
		      <td><?php echo $ci_nav_inmenu->ItemID ?></td>
		      <td><?php echo $ci_nav_inmenu->LinkWeight ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
   