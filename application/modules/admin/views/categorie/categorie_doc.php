
        <h2>Categorie List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Name</th>
		<th>Icon</th>
		
            </tr><?php
            foreach ($categorie_data as $categorie)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $categorie->name ?></td>
		      <td><?php echo $categorie->icon ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
   