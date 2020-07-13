<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get extends MY_Controller {
	public function rss() {
		$feed = $this->input->get('feed');
    echo $feed;
	}
}
