
<?php get_header()?>

<section class="page-wrap">
	<div class="container">

    <h2>Novi Oglas</h2>
			<form method='post'>
			 	<div class="form-group">
	 		 		<label>Naziv Oglasa: </label>
	 				<input type="text" name="naziv" class="form-control" id="naziv" placeholder="Upišite naziv oglasa" required>
			    <label>Opis: </label>
			    <textarea class="form-control" name="opis" rows="3" id="content" placeholder="Kratak opis" required></textarea>
	 		 		<label>Vaše Ime: </label>
	 				<input type="text" class="form-control" name="ime_autora" id="author" placeholder="Upišite Ime" required>
	 		 		<label>Vaš E-mail:  </label>
	 				<input type="text" class="form-control" name="email" id="email" placeholder="Vaša e-mail adresa" required>
 				</div>

				<div class="custom-file">
				  <input type="file" class="custom-file-input" name="slika">
				  <label class="custom-file-label" for="customFile">Odaberi Sliku</label>
				</div>
				<p>
					<div>
						<button type="submit" class="btn btn-success" name='submitbtn' id='submitbtn'>Objavi Oglas</button>
					</div>
				</p>
	</div>
</section>

<?php get_footer()?>
