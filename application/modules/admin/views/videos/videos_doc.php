
        <h2>Videos List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>VideoId</th>
		<th>VideoDate</th>
		<th>VideoTitle</th>
		<th>VideoDescription</th>
		<th>VideoRessourceId</th>
		<th>VideoState</th>
		<th>ChannelID</th>
		<th>VideoThumbnail</th>
		<th>Pertinent</th>
		
            </tr><?php
            foreach ($videos_data as $videos)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $videos->videoId ?></td>
		      <td><?php echo $videos->videoDate ?></td>
		      <td><?php echo $videos->videoTitle ?></td>
		      <td><?php echo $videos->videoDescription ?></td>
		      <td><?php echo $videos->videoRessourceId ?></td>
		      <td><?php echo $videos->videoState ?></td>
		      <td><?php echo $videos->channelID ?></td>
		      <td><?php echo $videos->videoThumbnail ?></td>
		      <td><?php echo $videos->pertinent ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
   