@php
// Redirect to the news-and-press page
wp_redirect(get_permalink(get_page_by_title('News and Press')->ID));
