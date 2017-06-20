
        <h2>User_userrole List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Login</th>
		<th>Role Id</th>
		
            </tr><?php
            foreach ($user_userrole_data as $user_userrole)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $user_userrole->login ?></td>
		      <td><?php echo $user_userrole->role_id ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
   