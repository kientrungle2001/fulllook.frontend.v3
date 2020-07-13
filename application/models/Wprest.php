<?php
class Wprest {
  public $endpoint;
  public $curl;

  public function setCurl($curl) {
    $this->curl = $curl;
  }

  public function setEndpoint($endpoint) {
    $this->endpoint = $endpoint;
    return $this;
  }

  public function get($url, $vars) {
    return json_decode($this->curl->get($this->endpoint . $url, $vars), true);
  }
  public function post($url, $vars) {
    return json_decode($this->curl->post($this->endpoint . $url, $vars), true);
  }
  public function put($url, $vars) {
    return json_decode($this->curl->put($this->endpoint . $url, $vars), true);
  }
  public function delete($url, $vars) {
    return json_decode($this->curl->delete($this->endpoint . $url, $vars), true);
  }
}
