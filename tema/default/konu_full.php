<div class="konu">
				<div class="solBaslik">
					<h2>
						<a href="<?php echo $link; ?>"><?php echo $baslik; ?></a>
					</h2>
				</div>
				<div class="konuUst">
					<span class="kaKategori"><a href="<?php echo $katlink; ?>"><?php echo $kategori; ?></a></span>
					<span class="kaOkunma"><?php echo $okunma; ?> Görüntülenme</span>
					<span class="kaTarih"><?php echo $tarih; ?></span>
				</div>
				<div class="konuIc">
									
					<div class="konuAc">
					<?php echo $konu; ?>
					</div>
					
					<div class="clear"></div>
					<?php if($etiketler){ ?>
					<div class="konuEtiketler">
					<?php 
					konu_etiketler($etiketler);
					?>
					</div>
					<?php }?>

				
				</div>
			</div>
			
			<center>


      <div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'cizikcd'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
    


</center>