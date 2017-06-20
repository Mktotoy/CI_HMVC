
        <h2>Usergroup List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>IDUserGroup</th>
		<th>Libelle</th>
		
            </tr><?php
            foreach ($usergroup_data as $usergroup)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $usergroup->IDUserGroup ?></td>
		      <td><?php echo $usergroup->Libelle ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
   