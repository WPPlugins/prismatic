<?php // Prismatic - Enqueue Resources

if (!defined('ABSPATH')) exit;

function prismatic_enqueue_front() {
	
	global $prismatic_options_general;
	
	$library = (isset($prismatic_options_general['library'])) ? $prismatic_options_general['library'] : 'none';
	
	if ($library === 'prism') {
		
		prismatic_prism_enqueue_front();
		
	} elseif ($library === 'highlight') {
		
		prismatic_highlight_enqueue_front();
	
	}
	
}

function prismatic_enqueue_admin() {
	
	$screen = get_current_screen();
	
	if (!property_exists($screen, 'id')) return;
	
	if ($screen->id === 'settings_page_prismatic') {
		
		wp_enqueue_style('prismatic-font-icons', PRISMATIC_URL .'css/styles-font-icons.css', array(), null);
		
		wp_enqueue_style('prismatic-settings', PRISMATIC_URL .'css/styles-settings.css', array(), null);
		
		wp_enqueue_style('wp-jquery-ui-dialog');
		
		$js_deps = array('jquery', 'jquery-ui-core', 'jquery-ui-dialog');
		
		wp_enqueue_script('prismatic-settings', PRISMATIC_URL .'js/scripts-settings.js', $js_deps, null);
		
		$data = prismatic_get_vars_admin();
		
		wp_localize_script('prismatic-settings', 'prismatic_settings', $data);
		
	}
	
}

function prismatic_get_vars_admin() {
	
	$data = array(
		
		'reset_title'   => __('Confirm Reset',            'prismatic'),
		'reset_message' => __('Restore default options?', 'prismatic'),
		'reset_true'    => __('Yes, make it so.',         'prismatic'),
		'reset_false'   => __('No, abort mission.',       'prismatic'),
		
	);
	
	return $data;
	
}

function prismatic_prism_enqueue_front() {
	
	global $prismatic_options_prism;
	
	if (isset($prismatic_options_prism['singular_only']) && $prismatic_options_prism['singular_only'] && !is_singular()) return;
	
	$languages = prismatic_active_languages('prism');
	
	$languages = array_filter($languages);
	
	if (!empty($languages)) {
		
		$theme = (isset($prismatic_options_prism['prism_theme'])) ? $prismatic_options_prism['prism_theme'] : 'default';
		
		wp_enqueue_style('prismatic-prism', PRISMATIC_URL .'lib/prism/css/theme-'. $theme .'.css', array(), null, 'all');
		
		wp_enqueue_script('prismatic-prism', PRISMATIC_URL .'lib/prism/js/prism-core.js', array(), null, true);
		
		
		
		if (isset($prismatic_options_prism['line_highlight']) && $prismatic_options_prism['line_highlight']) {
			
			wp_enqueue_script('prismatic-prism-line-highlight', PRISMATIC_URL .'lib/prism/js/plugin-line-highlight.js', array('prismatic-prism'), null, true);
			
		}
		
		if (isset($prismatic_options_prism['line_numbers']) && $prismatic_options_prism['line_numbers']) {
			
			wp_enqueue_script('prismatic-prism-line-numbers', PRISMATIC_URL .'lib/prism/js/plugin-line-numbers.js', array('prismatic-prism'), null, true);
			
		}
		
		if (isset($prismatic_options_prism['show_language']) && $prismatic_options_prism['show_language']) {
			
			wp_enqueue_script('prismatic-prism-show-language', PRISMATIC_URL .'lib/prism/js/plugin-show-language.js', array('prismatic-prism'), null, true);
			
		}
		
		
		
		$prefix = array('lang-', 'language-');
		
		foreach ($languages as $language) {
			
			$language = str_replace($prefix, '', $language);
			
			$file = PRISMATIC_DIR . 'lib/prism/js/lang-'. $language .'.js';
			
			if (file_exists($file)) {
				
				wp_enqueue_script('prismatic-prism-'. $language, PRISMATIC_URL .'lib/prism/js/lang-'. $language .'.js', array('prismatic-prism'), null, true);
				
			}
			
		}
		
	}
	
}

function prismatic_highlight_enqueue_front() {
	
	global $prismatic_options_highlight;
	
	if (isset($prismatic_options_highlight['singular_only']) && $prismatic_options_highlight['singular_only'] && !is_singular()) return;
	
	$always_load = (isset($prismatic_options_highlight['noprefix_classes']) && $prismatic_options_highlight['noprefix_classes']) ? true : false;
	
	$languages = prismatic_active_languages('highlight');
	
	$languages = array_filter($languages);
	
	if (!empty($languages) || $always_load) {
		
		$theme = (isset($prismatic_options_highlight['highlight_theme'])) ? $prismatic_options_highlight['highlight_theme'] : 'default';
		
		wp_enqueue_style('prismatic-highlight', PRISMATIC_URL .'lib/highlight/css/'. $theme .'.css', array(), null, 'all');
		
		wp_enqueue_script('prismatic-highlight', PRISMATIC_URL .'lib/highlight/js/highlight-core.js', array(), null, true);
		
		$init = (isset($prismatic_options_highlight['init_javascript'])) ? $prismatic_options_highlight['init_javascript'] : false;
		
		if ($init) {
			
			wp_add_inline_script('prismatic-highlight', $init, 'after');
			
		}
		
	}
	
}

function prismatic_active_languages($library) {
	
	global $posts, $post;
	
	if (is_singular()) {
		
		$excerpt = $post->post_excerpt;
		
		$content = $post->post_content;
		
		$comments = ($post->comment_count) ? get_comments(array('post_id' => $post->ID, 'status' => 'approve')) : array();
		
		$languages = prismatic_active_languages_loop($library, $excerpt, $content, $comments);
		
	} else {
		
		foreach ($posts as $post) {
			
			$excerpt = $post->post_excerpt;
			
			$content = $post->post_content;
			
			$comments = array();
			
			$langs_array[] = prismatic_active_languages_loop($library, $excerpt, $content, $comments);
			
		}
		
		foreach($langs_array as $key => $value) {
			
			foreach ($value as $k => $v) {
				
				$languages[] = $v;
				
			}
			
		}
		
	}
	
	return $languages;
	
}

function prismatic_active_languages_loop($library, $excerpt, $content, $comments) {
	
	$languages = array();
	
	$classes = ($library === 'prism') ? prismatic_prism_classes() : prismatic_highlight_classes();
	
	foreach ($classes as $class) {
		
		foreach($class as $cls) {
			
			if (strpos($excerpt, $cls) !== false) {
				
				$languages[] = $cls;
				
			}
			
			if (strpos($content, $cls) !== false) {
				
				$languages[] = $cls;
				
			}
			
			foreach ($comments as $comment) {
				
				if (strpos($comment->comment_content, $cls) !== false) {
					
					$languages[] = $cls;
					
				}
				
			}
			
		}
		
	}
	
	$languages = array_unique($languages);
	
	return $languages;
	
}

function prismatic_prism_classes() {
	
	$classes = array(
		
		array(
			'language-apacheconf', 
			'language-applescript', 
			'language-bash', 
			'language-c', 
			'language-csharp', 
			'language-cpp', 
			'language-clike', 
			'language-coffeescript', 
			'language-css', 
			'language-diff', 
			'language-git', 
			'language-graphql', 
			'language-groovy', 
			'language-http', 
			'language-ini', 
			'language-java', 
			'language-javascript', 
			'language-json', 
			'language-kotlin', 
			'language-makefile', 
			'language-markdown', 
			'language-markup', 
			'language-nginx', 
			'language-objectivec', 
			'language-perl', 
			'language-php', 
			'language-powershell', 
			'language-python', 
			'language-ruby', 
			'language-sass', 
			'language-scss', 
			'language-sql', 
			'language-swift', 
			'language-twig',
			'language-typescript', 
			'language-yaml',
		),
		
		array(
			'lang-apacheconf', 
			'lang-applescript', 
			'lang-bash', 
			'lang-c', 
			'lang-csharp', 
			'lang-cpp', 
			'lang-clike', 
			'lang-coffeescript', 
			'lang-css', 
			'lang-diff', 
			'lang-git', 
			'lang-graphql',
			'lang-groovy',
			'lang-http', 
			'lang-ini', 
			'lang-java', 
			'lang-javascript', 
			'lang-json', 
			'lang-kotlin',
			'lang-makefile', 
			'lang-markdown', 
			'lang-markup', 
			'lang-nginx', 
			'lang-objectivec', 
			'lang-perl', 
			'lang-php', 
			'lang-powershell',
			'lang-python', 
			'lang-ruby', 
			'lang-sass', 
			'lang-scss', 
			'lang-sql', 
			'lang-swift',
			'lang-twig',
			'lang-typescript',
			'lang-yaml',
		)
		
	);
	
	return $classes;
	
}

function prismatic_highlight_classes() {
	
	$classes = array(
			
		array(
			'language-'
		),
		
		array(
			'lang-', 
		)
		
	);
	
	return $classes;
	
}
