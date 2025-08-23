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

	<div class="entry-content" style="text-align: center">
		<?php $image = get_field( 'picture' ); ?>
		<div class="individual-image">
			<?php if ( ! empty( $image ) ) : ?>
				<img class="avatar" src="<?php echo esc_url( $image['sizes']['medium-640'] ); ?>" width="<?php echo esc_attr( $image['sizes']['medium-640-width'] / 2 ); ?>" height="<?php echo esc_attr( $image['sizes']['medium-640-height'] / 2 ); ?>">
			<?php else : ?>
				<img class="avatar" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/default-avatar.png" width="320" height="320" />
			<?php endif; ?>
		</div>

		<?php $job_title = get_field( 'job_title' ); ?>
		<?php if ( ! empty( $job_title ) ) : ?>
			<div class="individual-job-title">
				<?php echo esc_html( $job_title ); ?>
			</div>
		<?php endif; ?>

		<?php $about = get_field( 'about' ); ?>
		<?php if ( ! empty( $about ) ) : ?>
			<div class="individual-about">
				<?php /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>
				<?php echo $about; ?>
			</div>
		<?php endif; ?>

		<?php $appearances = get_field( 'appearances' ); ?>
		<?php if ( ! empty( $appearances ) ) : ?>
			<div class="individual-appearances">
				<h3><?php esc_html_e( 'Appearances', 'the-ball-v2' ); ?></h3>
				<?php /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>
				<?php echo $appearances; ?>
			</div>
		<?php endif; ?>

		<?php $goals = get_field( 'goals' ); ?>
		<?php if ( ! empty( $goals ) ) : ?>
			<div class="individual-goals">
				<h3><?php esc_html_e( 'Goals', 'the-ball-v2' ); ?></h3>
				<?php /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>
				<?php echo $goals; ?>
			</div>
		<?php endif; ?>

		<?php $on_the_pitch = get_field( 'on_the_pitch' ); ?>
		<?php if ( ! empty( $on_the_pitch ) ) : ?>
			<div class="individual-on_the_pitch">
				<h3><?php esc_html_e( 'On The Pitch', 'the-ball-v2' ); ?></h3>
				<?php /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>
				<?php echo $on_the_pitch; ?>
			</div>
		<?php endif; ?>

		<?php $teams = get_field( 'teams' ); ?>
		<?php if ( ! empty( $teams ) ) : ?>
			<div class="individual-teams">
				<h3><?php esc_html_e( 'Teams', 'the-ball-v2' ); ?></h3>
				<?php /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>
				<?php echo $teams; ?>
			</div>
		<?php endif; ?>

		<?php $achievements = get_field( 'achievements' ); ?>
		<?php if ( ! empty( $achievements ) ) : ?>
			<div class="individual-achievements">
				<h3><?php esc_html_e( 'Achievements', 'the-ball-v2' ); ?></h3>
				<?php /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>
				<?php echo $achievements; ?>
			</div>
		<?php endif; ?>

		<?php
		$social_links = [];
		foreach ( [ 'facebook', 'instagram', 'twitter', 'tiktok', 'snapchat', 'youtube', 'vimeo', 'tumblr', 'pinterest', 'github', 'wordpress' ] as $selector ) :
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
					<li class="jetpack-social-widget-item individual-social-link individual-<?php echo esc_attr( $selector ); ?>">
						<a href="<?php echo esc_url( $social_link ); ?>" target="_self">
							<span class="screen-reader-text"><?php echo esc_html( ucfirst( $selector ) ); ?></span>
							<svg class="icon icon-<?php echo esc_attr( $selector ); ?>" aria-hidden="true" role="presentation">
								<use href="#icon-<?php echo esc_attr( $selector ); ?>" xlink:href="#icon-<?php echo esc_attr( $selector ); ?>"></use>
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
				<a href="<?php echo esc_url( $website ); ?>"><?php esc_html_e( 'Main website', 'the-ball-v2' ); ?></a>
			</div>
		<?php endif; ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php /* the_ball_v2_entry_footer(); */ ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-->
