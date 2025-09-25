<?php /* Template Name: Front page */ ?>
<?php get_header(); ?>

<main class="main">
		<section class="hero-banner" style="background-image: url(<?= get_template_directory_uri(); ?>/img/hero-bg.jpg);">
			<div class="centered-container">
				<h1 class="hero-banner__title">Smile Gallery</h1>
			</div>
		</section>
		<section class="default-content">
			<div class="centered-container">
				<div class="default-content__wrapper">
					<h2>Your Transformations</h2>
					<p>Our smile gallery showcases real transformations from our Chorley dental practice, highlighting
						how we've helped patients rediscover their confidence through bespoke cosmetic dentistry. </p>
					<p>Each case represents a unique journey, combining artistic vision with precise clinical expertise
						to create natural-looking, lasting results.</p>
				</div>

			</div>
		</section>
		<section class="images-filter">
    <div class="centered-container">
        <div class="images-filter__heading">
            <a href="#" class="active" data-filter="all">All</a>
            <?php
            $filter_categories = get_terms(array(
                'taxonomy' => 'filter_category',
                'hide_empty' => false,
            ));
            
            if (!empty($filter_categories) && !is_wp_error($filter_categories)) {
                foreach ($filter_categories as $category) {
                    echo '<a href="#" data-filter="' . esc_attr($category->term_id) . '">' . esc_html($category->name) . '</a>';
                }
            }
            ?>
        </div>
        <div class="images-filter__wrapper" id="images-container">
            <?php
            
            $args = array(
                'post_type' => 'images_filter',
                'posts_per_page' => 6,
                'post_status' => 'publish'
            );
            
            $images_query = new WP_Query($args);
            
            if ($images_query->have_posts()) {
                while ($images_query->have_posts()) {
                    $images_query->the_post();
                    $categories = get_the_terms(get_the_ID(), 'filter_category');
                    $category_classes = '';
                    if ($categories && !is_wp_error($categories)) {
                        $category_ids = array();
                        foreach ($categories as $category) {
                            $category_ids[] = 'cat-' . $category->term_id;
                        }
                        $category_classes = implode(' ', $category_ids);
                    }
                    ?>
                    <div class="images-filter__wrapper__item <?php echo esc_attr($category_classes); ?>">
                        <a href="<?php echo get_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium', array('alt' => get_the_title())); ?>
                            <?php else : ?>
                                <img src="<?= get_template_directory_uri(); ?>/img/image-filter.webp" alt="<?php echo esc_attr(get_the_title()); ?>">
                            <?php endif; ?>
                        </a>
                    </div>
                    <?php
                }
                wp_reset_postdata();
            }
            ?>
        </div>
        
        <div class="pagination-wp" id="pagination-container" <?php if($images_query->found_posts <= 6) echo 'style="display:none;"'; ?>>
    <?php
    $total_pages = $images_query->max_num_pages;
    if ($total_pages > 1) {
        echo '<span class="active" data-page="1">1</span>';
        for ($i = 2; $i <= $total_pages; $i++) {
            echo '<a href="#" data-page="' . $i . '">' . $i . '</a>';
        }
    }
    ?>
</div>
    </div>
</section>
		<section class="review-slider">
			<div class="centered-container">
				<h2>What Our Patients Say</h2>
				<div class="owl-slider">
				<div class="review-slider__wrapper owl-carousel" id="carousel">

					<div class="review-slider__wrapper__item item">
						<div class="review-slider__wrapper__item__top-info">
							<span class="reviewer-logo">J</span>
							<div class="reviewer-details">
								<h3>Jane D.</h3>
								<img src="<?= get_template_directory_uri(); ?>/img/rating.svg" alt="rating">
							</div>
						</div>
						<div class="review-slider__wrapper__item__description">
							Flexible payment plans and finance options are all part of the You Dental and Aesthetics
							Experience. We’ll work with you to find a plan that suits your budget—so nothing stands in
							the way of the care you deserve.
						</div>
					</div>

					<div class="review-slider__wrapper__item item">
						<div class="review-slider__wrapper__item__top-info">
							<span class="reviewer-logo">M</span>
							<div class="reviewer-details">
								<h3>Mark S.</h3>
								<img src="<?= get_template_directory_uri(); ?>/img/rating.svg" alt="rating">
							</div>
						</div>
						<div class="review-slider__wrapper__item__description">
							Flexible payment plans and finance options are all part of the You Dental and Aesthetics
							Experience. We’ll work with you to find a plan that suits your budget—so nothing stands in
							the way of the care you deserve.
						</div>
					</div>

					<div class="review-slider__wrapper__item item">
						<div class="review-slider__wrapper__item__top-info">
							<span class="reviewer-logo">A</span>
							<div class="reviewer-details">
								<h3>Anna K.</h3>
								<img src="<?= get_template_directory_uri(); ?>/img/rating.svg" alt="rating">
							</div>
						</div>
						<div class="review-slider__wrapper__item__description">
							Flexible payment plans and finance options are all part of the You Dental and Aesthetics
							Experience. We’ll work with you to find a plan that suits your budget—so nothing stands in
							the way of the care you deserve.
						</div>
					</div>

					<div class="review-slider__wrapper__item item">
						<div class="review-slider__wrapper__item__top-info">
							<span class="reviewer-logo">J</span>
							<div class="reviewer-details">
								<h3>Jane D.</h3>
								<img src="<?= get_template_directory_uri(); ?>/img/rating.svg" alt="rating">
							</div>
						</div>
						<div class="review-slider__wrapper__item__description">
							Flexible payment plans and finance options are all part of the You Dental and Aesthetics
							Experience. We’ll work with you to find a plan that suits your budget—so nothing stands in
							the way of the care you deserve.
						</div>
					</div>

					<div class="review-slider__wrapper__item item">
						<div class="review-slider__wrapper__item__top-info">
							<span class="reviewer-logo">M</span>
							<div class="reviewer-details">
								<h3>Mark S.</h3>
								<img src="<?= get_template_directory_uri(); ?>/img/rating.svg" alt="rating">
							</div>
						</div>
						<div class="review-slider__wrapper__item__description">
							Flexible payment plans and finance options are all part of the You Dental and Aesthetics
							Experience. We’ll work with you to find a plan that suits your budget—so nothing stands in
							the way of the care you deserve.
						</div>
					</div>

					<div class="review-slider__wrapper__item item">
						<div class="review-slider__wrapper__item__top-info">
							<span class="reviewer-logo">A</span>
							<div class="reviewer-details">
								<h3>Anna K.</h3>
								<img src="<?= get_template_directory_uri(); ?>/img/rating.svg" alt="rating">
							</div>
						</div>
						<div class="review-slider__wrapper__item__description">
							Flexible payment plans and finance options are all part of the You Dental and Aesthetics
							Experience. We’ll work with you to find a plan that suits your budget—so nothing stands in
							the way of the care you deserve.
						</div>
					</div>
				</div>
				</div>
			</div>
		</section>
	</main>


<?php get_footer(); ?>