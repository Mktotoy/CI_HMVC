
        <h2>Ci_nav_menus List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>MenuID</th>
		<th>MenuName</th>
		
            </tr><?php
            foreach ($ci_nav_menus_data as $ci_nav_menus)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $ci_nav_menus->MenuID ?></td>
		      <td><?php echo $ci_nav_menus->MenuName ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
   