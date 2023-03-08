<?php
/**
 * Template part for displaying an Individual.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<!-- content-individual.php -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header"<?php the_ball_v2_feature_image_style(); ?>>
		<?php if ( is_single() ) : ?>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php else : ?>
			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		<?php endif; ?>
		<?php the_ball_v2_feature_image_caption(); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php $image = get_field( 'picture' ); ?>
		<div class="individual-image">
			<?php if ( ! empty( $image ) ) : ?>
				<img class="avatar" src="<?php echo $image['sizes']['medium-640']; ?>" width="<?php echo ( $image['sizes']['medium-640-width'] / 2 ); ?>" height="<?php echo ( $image['sizes']['medium-640-height'] / 2 ); ?>">
			<?php else : ?>
				<img class="avatar" src="<?php echo get_template_directory_uri(); ?>/assets/images/default-avatar.png" width="320" height="320" />
			<?php endif; ?>
		</div>

		<?php $job_title = get_field( 'job_title' ); ?>
		<?php if ( ! empty( $job_title ) ) : ?>
			<div class="individual-job-title">
				<?php echo $job_title; ?>
			</div>
		<?php endif; ?>

		<?php $about = get_field( 'about' ); ?>
		<?php if ( ! empty( $about ) ) : ?>
			<div class="individual-about">
				<?php echo $about; ?>
			</div>
		<?php endif; ?>

		<?php
		$social_links = [];
		foreach ( [ 'facebook', 'instagram', 'twitter', 'tiktok', 'youtube' ] as $selector ) :
			$field = get_field( $selector );
			if ( ! empty( $field ) ) :
				$social_links[ $selector ] = $field;
			endif;
		endforeach;
		?>

		<?php if ( ! empty( $social_links ) ) : ?>
			<div class="jetpack_widget_social_icons individual-social-links">
				<ul class="jetpack-social-widget-list size-large">
				<?php foreach ( $social_links as $selector => $social_link ) : ?>
					<li class="jetpack-social-widget-item individual-social-link individual-<?php echo $selector; ?>">
						<a href="<?php echo $social_link; ?>" target="_self">
							<span class="screen-reader-text"><?php echo ucfirst( $selector ); ?></span>
							<svg class="icon icon-<?php echo $selector; ?>" aria-hidden="true" role="presentation">
								<use href="#icon-<?php echo $selector; ?>" xlink:href="#icon-<?php echo $selector; ?>"></use>
							</svg>
						</a>
					</li>
				<?php endforeach; ?>
				</ul>
			</div>
		<?php endif; ?>

		<?php $website = get_field( 'website' ); ?>
		<?php if ( ! empty( $website ) ) : ?>
			<div class="individual-website">
				<a href="<?php echo $website; ?>"><?php esc_html_e( 'Main website', 'the-ball-v2' ); ?></a>
			</div>
		<?php endif; ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php /* the_ball_v2_entry_footer(); */ ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-->
