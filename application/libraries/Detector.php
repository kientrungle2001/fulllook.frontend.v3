<?php
require_once FCPATH . '3rdparty/Mobile-Detect/2.8.33/Mobile_Detect.php';
class Detector {
	public $_detector;
	
	public function __construct() {
		$this->_detector = new Mobile_Detect();
	}

	public function isMobile() {
		return $this->getDetector()->isMobile() && !$this->getDetector()->isTablet();
	}

	public function isTablet() {
		return $this->getDetector()->isTablet();
	}

	public function isDesktop() {
		return !$this->getDetector()->isMobile();
	}

	public function getDetector() {
		return $this->_detector;
	}

}