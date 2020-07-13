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
    $post1 = $this->wprest->get('/posts', [
      // '_fields' => 'id,slug,title,content,excerpt,meta,author'
      'categories' => [2],
      'slug' => 'hello-world'
    ]);
    echo '<pre>';
    // echo var_export($post1, true);
    // echo $post1['title']['rendered'];
    $teachers = $this->wprest->get('/teachers', [
      'filter' => [
        'metaquery' => [
          [
            
          ]
        ]
      ]
    ]);
    echo var_export($teachers, true);
  }
}
