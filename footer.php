<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Shop Isle
 */
?>
<?php do_action( 'shop_isle_before_footer' ); ?>

	<?php do_action( 'shop_isle_footer' ); ?>

	</div>
	<!-- Wrapper end -->
	<!-- Scroll-up -->
	<div class="scroll-up">
		<a href="#totop"><i class="arrow_carrot-2up"></i></a>
	</div>

	<?php do_action( 'shop_isle_after_footer' ); ?>

	<div class="cookies" id="cookies">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<p>Como todos los sitios web, nosotros también <a href="https://klismos.es/aviso-legal/" target="blank" title="Aviso legal - Klismos.es">usamos cookies</a> para garantizar una experiencia satisfactoria a todos los usuarios. </p>
					<div class="close" id="close_cookies">x</div>
				</div>
			</div>
		</div>
	</div>

<?php wp_footer(); ?>

</body>
</html>
