<?php
/**
 * Template for displaying a list of files with thumbnails, titles, and sizes.
 *
 * @package cb-firma2025
 */

if ( have_rows( 'files' ) ) {
	?>
<section class="file_list">
	<div class="container-xl py-5">
		<div class="row">
			<div class="col-12">
				<div class="row g-5 justify-content-center">
					<?php
					while ( have_rows( 'files' ) ) {
						the_row();
						$file = get_sub_field( 'file' );

						if ( ! $file ) {
							continue;
						}

						$url        = esc_url( $file['url'] );
						$file_title = esc_html( $file['title'] );
						$size       = size_format( $file['filesize'], 2 );
						$icon_url   = wp_mime_type_icon( $file['ID'] ); // gets the icon for the file.
						$thumbnail  = wp_get_attachment_image_src( $file['ID'], 'medium' );

						?>
						<div class="col-sm-6 col-md-4">
							<a href="<?= esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer" class="file_list__card">
								<div class="file_list__inner">
									<?php
									if ( $thumbnail ) {
										echo '<img src="' . esc_url( $thumbnail[0] ) . '" alt="' . esc_attr( $file['title'] ) . '" loading="lazy" class="file_list__image">';
									} else {
										echo '<img src="' . esc_url( wp_mime_type_icon( $file['ID'] ) ) . '" alt="" width="132" height="132" class="file_list__image">';
									}
									?>
									<div class="h4"><?= esc_html( $file_title ); ?></div>
									<span class="text-muted fs-100">(<?= esc_html( $size ); ?>)</span>
								</div>
							</a>
							</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
</section>
	<?php
}
