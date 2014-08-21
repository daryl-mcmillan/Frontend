<?php

require 'common.php';
require 'service-helpers.php';

$data = get_json('https://api.github.com/orgs/octokit/repos');

send_json( array(
	'name' => $data[0]->name,
	'tags' => ['github','octokit']
) );

?>
