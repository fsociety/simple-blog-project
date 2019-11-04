<?php !defined("ADMIN") ? die("Hacking?") : null; ?>

		<article class="module width_full">
		<form action="" method="post">
			<header><h3>HIGHLIGHTER</h3></header>	

				<?php


				if($_POST){

				$kod = p("kod");
				echo '<div style="padding:20px;">';
				highlight_string(ss($kod));
				echo '</div>';
				}


				?>
			
				<div class="module_content">
						<fieldset>
							<label></label>
							<textarea rows="10" name="kod"></textarea>
						</fieldset>
						
						<div class="clear"></div>
				</div>
				
			<footer>
				<div class="submit_link">
					<input type="submit" value="Kaydet" class="alt_btn">
				</div>
			</footer>
			</form>
		</article><!-- end of post new article -->
		
		