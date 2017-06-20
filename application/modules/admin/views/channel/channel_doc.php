
        <h2>Channel List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>ChannelID</th>
		<th>ChannelName</th>
		<th>ChannelKeywords</th>
		<th>ChannelLastUpdate</th>
		<th>ChannelType</th>
		<th>ChannelThumbnail</th>
		
            </tr><?php
            foreach ($channel_data as $channel)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $channel->channelID ?></td>
		      <td><?php echo $channel->channelName ?></td>
		      <td><?php echo $channel->channelKeywords ?></td>
		      <td><?php echo $channel->channelLastUpdate ?></td>
		      <td><?php echo $channel->channelType ?></td>
		      <td><?php echo $channel->channelThumbnail ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
   