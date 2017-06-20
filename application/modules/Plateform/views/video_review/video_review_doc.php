
        <h2>Video_review List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Video ReviewId</th>
		<th>VideoId</th>
		<th>Login</th>
		<th>Video ReviewText</th>
		
            </tr><?php
            foreach ($video_review_data as $video_review)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $video_review->video_reviewId ?></td>
		      <td><?php echo $video_review->videoId ?></td>
		      <td><?php echo $video_review->login ?></td>
		      <td><?php echo $video_review->video_reviewText ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
   