
        <h2>Userrole List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id</th>
		<th>Name</th>
		
            </tr><?php
            foreach ($userrole_data as $userrole)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $userrole->id ?></td>
		      <td><?php echo $userrole->name ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
   