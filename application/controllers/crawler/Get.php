<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get extends MY_Controller {
	public function rest() {
		// $api = $this->input->get('api');
    // echo $api;
    $this->load->library('curl');
    $this->load->model('wprest');
    $this->wprest->setCurl($this->curl);
    $this->wprest->setEndpoint('http://gsmwp.com/wp-json/wp/v2');
    echo '<pre>';
    echo json_encode ($this->wprest->get('/posts/1', [
      '_fields' => 'id,slug,title,content,excerpt,meta,author'
    ]), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_LINE_TERMINATORS);
  }
}
