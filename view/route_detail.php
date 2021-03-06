<section class="searchcontainer">
  <div class="container no-limits">
		<?php require_once "../model/Connection.php"; ?>
		<article class="hreview open special">
			<table class="table">
		    <tr>
		      <th>Home</th>
		      <td><?= $homebase ?>
		    </tr>
				<tr>
					<th>Via</th>
					<td><?= $via ?>
				</tr>
        <?php if (strlen($departure) != 0) { ?>
        <tr>
					<th>Abfahrt</th>
					<td><?= $departure ?>
				</tr>
        <?php } ?>
        <?php if (strlen($arrival) != 0) { ?>
        <tr>
					<th>Ankunft</th>
					<td><?= $arrival ?>
				</tr>
        <?php } ?>
				<?php if (strlen($duration) != 0) { ?>
					<tr>
						<th>Dauer</th>
						<td><?= Connection::getDurationFormatted($duration) ?>
					</tr>
				<?php } ?>
        <?php if (strlen($platform) != 0) { ?>
					<tr>
						<th>Umstiegsgleise</th>
						<td><?= $platform ?>
					</tr>
				<?php } ?>
        <?php if (strlen($arrivalVia) != 0 && strlen($departureVia) != 0) { ?>
          <tr>
            <th>Umstiegszeiten</th>
            <td><?= $arrivalVia . " / " . $departureVia ?>
          </tr>
        <?php } ?>


			</table>
		  <?php if ($user->signedIn) { ?>
		    <h5>Erfasse einen Kommentar:</h5>
		    <form action="/Route/create" method="post">
		      <textarea class="form-control" name="rt-comment" rows="8" id="createtext" onchange="cmdcreateCheck()"></textarea>
		      <input type="hidden" value="<?= $route ?>" name="rt-route">
					<div class="rt-validation" id="createerrortext">
					<?= $validationerror ?>
				</div>
		      <input class="btn btn-primary rt-btn" type="submit" id="buttonlower">
		    </form>

		  <?php } else { ?>
		    <h5 class="signoninfo"><a href="/User/login">Anmelden</a>, um einen Kommentar zu erfassen.</h5>
		  <?php }

				while ($row = $comments->fetch_object()) {
					?>
					<div class="comment">
						<strong><?= $row->email ?> schrieb:<br><br></strong>
						<?= str_replace("\n", "<br>", $row->bewertung) ?>
						<?php if($user->signedIn && $user->email == $row->email) {
							?>
								<hr><a href="/Comment/edit?id=<?= $row->id ?>">Bearbeiten</a> | <a href="/Comment/delete?id=<?= $row->id ?>">Löschen</a>
							<?php
						} ?>
					</div>
					<?php
				}
			?>
		</article>
	</div>
</section>
