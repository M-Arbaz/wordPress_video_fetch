<php?
function get_first_five_video_thumbnails() {
    $documentory_page_id = "page id"; 
    $content = get_post_field('post_content', $documentory_page_id);

    if (preg_match_all('/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:watch\?v=|embed\/|v\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $content, $matches)) {
        $video_ids = $matches[1]; 
        $output = '';

        for ($i = 0; $i < min(6, count($video_ids)); $i++) {
            $video_id = $video_ids[$i];
            $thumbnail_url = "https://img.youtube.com/vi/$video_id/0.jpg"; 

            $output .= '<a href="' . get_permalink($documentory_page_id) . '">
                            <img src="' . esc_url($thumbnail_url) . '" alt="Documentory Video Thumbnail">
                        </a>';
        }

        return $output; 
    }

    return 'No videos found.';
}
add_shortcode('first_five_video_thumbnails', 'get_first_five_video_thumbnails');
