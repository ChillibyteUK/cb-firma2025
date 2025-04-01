<?php
/**
 * Template for displaying a list of files with thumbnails, titles, and sizes.
 *
 * @package cb-firma2025
 */

if ( have_rows( 'files' ) ) {
	?>
	<div class="container-xl">
		<div class="row">
			<div class="col-12">
				<h2 class="text-center">Files</h2>
				<ul class="list-unstyled">
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
						$icon_url   = wp_mime_type_icon( $file['ID'] ); // gets the icon for the file
						$thumbnail  = wp_get_attachment_image_src( $file['ID'], 'medium' );

						
						?>
						<li class="d-flex align-items-center gap-2 mb-3">
							<a href="<?= esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer">
								<?php
								if ( $thumbnail ) {
									echo '<img src="' . esc_url( $thumbnail[0] ) . '" alt="' . esc_attr( $file['title'] ) . '" loading="lazy">';
								} else {
									echo '<img src="' . esc_url( wp_mime_type_icon( $file['ID'] ) ) . '" alt="" width="32" height="32">';
								}
								?>
								<?= esc_html( $file_title ); ?>
							</a>
							<span class="text-muted ms-2 small">(<?= esc_html( $size ); ?>)</span>
						</li>
						<?php
					}
					?>
				</ul>
			</div>
		</div>
	</div>
	<?php
}
