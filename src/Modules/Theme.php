<?php

namespace Sitepilot\Modules;

use Sitepilot\Module;

class Theme extends Module
{
    /**
     * Initialize the theme module.
     * 
     * @return void
     */
    public function init(): void
    {
        add_action('acf/init', [$this, 'action_register_acf_options']);
    }

    /**
     * Returns the module's settings.
     *
     * @return array
     */
    protected function settings(): array
    {
        return apply_filters('sp_theme_settings', [
            'taxonomy_featured_image_enabled' => apply_filters('sp_taxonomy_featured_image_enabled', get_theme_support('sp-taxonomy-featured-image'))
        ]);
    }

    /**
     * Returns the real post title. 
     *
     * @return string
     */
    public function title(): string
    {
        if (is_home()) {
            $title = get_the_title(get_option('page_for_posts'));
        } elseif (function_exists('is_shop') && is_shop()) {
            $title = get_the_title(get_option('woocommerce_shop_page_id'));
        } elseif ($object = get_queried_object()) {
            $title = $object->name;
        }

        return !empty($title) ? $title : get_the_title();
    }

    /**
     * Returns image sizes by image ID.
     *
     * @param int|null $image_id
     * @param string|int $default
     * @return array|null
     */
    public function img($image_id, $default = null, array $classes = []): ?array
    {
        if (!$image_id && is_numeric($default)) {
            $image_id = $default;
        }

        if ($image['full'] = wp_get_attachment_url($image_id)) {
            foreach (get_intermediate_image_sizes() as $size) {
                $image[$size] = wp_get_attachment_image_url($image_id, $size);
            }

            $image['html'] = '<img src="' . $image['full'] . '" srcset="' . wp_get_attachment_image_srcset($image_id) . '" class="' . implode(" ", $classes) . '" />';

            return $image;
        } elseif (filter_var($default, FILTER_VALIDATE_URL)) {
            $image['full'] = $default;

            foreach (get_intermediate_image_sizes() as $size) {
                $image[$size] = $image['full'];
            }

            $image['html'] = '<img src="' . $image['full'] . '" class="' . implode(" ", $classes) . '" />';

            return $image;
        }

        return null;
    }

    /**
     * Returns the real post featured image ID.
     *
     * @return integer|null
     */
    public function featured_img_id(): ?int
    {
        if (is_home()) {
            $id = get_post_thumbnail_id(get_option('page_for_posts'));
        } elseif (function_exists('is_shop') && is_shop()) {
            $id = get_post_thumbnail_id(get_option('woocommerce_shop_page_id'));
        } elseif (function_exists('get_field') && $object = get_queried_object()) {
            $id = get_field('sp_featured_img', $object);
        }

        return !empty($id) ? $id : get_post_thumbnail_id();
    }

    /**
     * Returns the real post featured image.
     *
     * @param string|int $default
     * @param array $classes
     * @return array|null
     */
    public function featured_img($default = null, array $classes = []): ?array
    {
        return $this->img($this->featured_img_id(), $default, $classes);
    }

    /**
     * Returns the content of a post.
     *
     * @param string|int $id
     * @param string $post_type
     * @return string
     */
    public function post_content($id, string $post_type = 'post'): string
    {
        if (is_numeric($id)) {
            $post_args['include'] = [$id];
        } else {
            $post_args['name'] = $id;
        }

        $post_args = array_merge($post_args, [
            'post_type'   => $post_type,
            'post_status' => 'publish',
            'numberposts' => 1
        ]);

        $posts = get_posts($post_args);

        return do_shortcode(do_blocks($posts[0]->post_content ?? ''));
    }

    /**
     * Returns the content of a reusable block.
     *
     * @param string|int $id
     * @return string
     */
    public function block_content($id): string
    {
        return $this->post_content($id, 'wp_block');
    }

    /**
     * Returns the content of a page.
     *
     * @param string|int $id
     * @return string
     */
    public function page_content($id): string
    {
        return $this->post_content($id, 'page');
    }

    /**
     * Returns the current date.
     *
     * @param string $format
     * @return string
     */
    public function date(string $format = null): string
    {
        if (!$format) {
            $format = get_option('date_format');
        }

        return current_time($format);
    }

    /**
     * Json encode data for use in html.
     *
     * @param mixed $data
     * @return string
     */
    public function html_encode($data): string
    {
        return esc_html(wp_json_encode($data));
    }

    /**
     * Render a Gutenberg block.
     *
     * @param string $id
     * @param array $data
     * @return string
     */
    public function render_block(string $id, array $data = [], string $content = ''): string
    {
        $config = [
            'name' => $id,
            'id' => 'block_' . uniqid()
        ];

        if (strpos($id, 'acf/') !== false) {
            $config['data'] = $data;
        } else {
            $config = array_merge($config, $data);
        }

        if (empty($content)) {
            $html = "<!-- wp:$id " .  wp_json_encode($config) . " /-->";
        } else {
            $html = "<!-- wp:$id " .  wp_json_encode($config) . " -->$content<!-- /wp:$id -->";
        }

        return do_blocks($html);
    }

    /**
     * Register option groups.
     *
     * @return void
     */
    public function action_register_acf_options(): void
    {
        if (function_exists('acf_add_local_field_group')) {
            if ($this->get_setting('taxonomy_featured_image_enabled')) {
                acf_add_local_field_group(array(
                    'key' => 'group_60b77aad4e409',
                    'title' => 'Sitepilot',
                    'fields' => array(
                        array(
                            'key' => 'field_60b77aae2ad48',
                            'label' => __('Featured Image', 'sitepilot'),
                            'name' => 'sp_featured_img',
                            'type' => 'image',
                            'return_format' => 'id',
                            'preview_size' => 'medium',
                        ),
                    ),
                    'location' => array(
                        array(
                            array(
                                'param' => 'taxonomy',
                                'operator' => '==',
                                'value' => 'all',
                            ),
                        ),
                    )
                ));
            }
        }
    }
}
