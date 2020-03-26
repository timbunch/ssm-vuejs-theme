<?php

add_filter('the_content', 'ssm_content_filter', 99);

function ssm_content_filter($content)
{
	$pattern = "/<p[^>]*><\\/p[^>]*>/";
	$content = str_replace('&nbsp;', '', $content);
	return preg_replace($pattern, '', trim($content));
}
