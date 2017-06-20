
        <h2>Video_categorie List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>VideoId</th>
		<th>Name</th>
		
            </tr><?php
            foreach ($video_categorie_data as $video_categorie)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $video_categorie->videoId ?></td>
		      <td><?php echo $video_categorie->name ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
   