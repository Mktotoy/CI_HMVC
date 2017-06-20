
        <h2>Badge List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>BadgeId</th>
		<th>BadgeTitle</th>
		<th>BadgeText</th>
		<th>BadgeThumbnail</th>
		
            </tr><?php
            foreach ($badge_data as $badge)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $badge->badgeId ?></td>
		      <td><?php echo $badge->badgeTitle ?></td>
		      <td><?php echo $badge->badgeText ?></td>
		      <td><?php echo $badge->badgeThumbnail ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
   