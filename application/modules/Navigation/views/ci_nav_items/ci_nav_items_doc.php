
        <h2>Ci_nav_items List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>ItemID</th>
		<th>ItemName</th>
		<th>ItemHumanName</th>
		<th>ItemLink</th>
		<th>ParentItem</th>
		
            </tr><?php
            foreach ($ci_nav_items_data as $ci_nav_items)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $ci_nav_items->ItemID ?></td>
		      <td><?php echo $ci_nav_items->ItemName ?></td>
		      <td><?php echo $ci_nav_items->ItemHumanName ?></td>
		      <td><?php echo $ci_nav_items->ItemLink ?></td>
		      <td><?php echo $ci_nav_items->ParentItem ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
   