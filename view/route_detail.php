<article class="hreview open special">
	<table class="table">
    <tr>
      <th>Home</th>
      <td><?= $homebase ?>
    </tr>
		<?php if (isset($duration)) { ?>
			<tr>
				<th>Via</th>
				<td><?= $via ?>
			</tr>
		<?php } ?>
    <tr>
      <th>Dauer</th>
      <td><?= $duration ?>
    </tr>
	</table>
  <?php if ($user->signedIn) { ?>
    <h5>Erfasse einen Kommentar:</h5>
    <form action="/Route/create" method="post">
      <textarea class="form-control" name="rt-comment" rows="8"></textarea>
      <input type="hidden" value="<?= $route ?>" name="rt-route">
      <input class="btn btn-primary rt-btn" type="submit">
    </form>
  <?php } else { ?>
    <h5><a href="/User/login">Anmelden</a>, um einen Kommentar zu erfassen.</h5>
  <?php }

		while ($row = $comments->fetch_object()) {
			?>
			<div class="comment">
				<?= $row->email ?> schrieb:<br><br>
				<?= str_replace("\n", "<br>", $row->bewertung) ?>
			</div>
			<?php
		}
	?>
</article>
