<?php
  
class BrowserDetective {
  
  public $user_agent;
  public $platform;
  public $browser_name;
  
  public function __construct() {
    $this->set_user_agent();
    $this->reset();
  }
  
  public function set_user_agent() {
    if(isset($_SERVER['HTTP_USER_AGENT'])) {
      $this->user_agent = $_SERVER['HTTP_USER_AGENT'];
    } else {
      $this->user_agent = '';
    }
  }
  
  public function reset() {
    $this->platform = 'Unknown';
    $this->browser_name = 'Unknown';
  }
  
  public function detect() {
    $this->detect_platform();
    $this->detect_browser();
    return array($this->platform, $this->browser_name);
  }
  
  public function detect_platform() {
    if(preg_match('/linux/i', $this->user_agent)) {
      $this->platform = 'Linux';
    } elseif(preg_match('/macintosh|mac os/i', $this->user_agent)) {
      $this->platform = 'Mac';
    } elseif(preg_match('/windows|win32/i', $this->user_agent)) {
      $this->platform = 'Windows';
    }
  }
  
  public function detect_browser() {
    if(preg_match('/MSIE/i', $this->user_agent)) {
      $this->browser_name = 'Internet Explorer';
    } elseif(preg_match('/Firefox/i', $this->user_agent)) {
      $this->browser_name = 'Firefox';
    } elseif(preg_match('/Chrome/i', $this->user_agent)) {
      $this->browser_name = 'Chrome';
    } elseif(preg_match('/Safari/i', $this->user_agent)) {
      $this->browser_name = 'Safari';
    } elseif(preg_match('/Opera/i', $this->user_agent)) {
      $this->browser_name = 'Opera';
    } elseif(preg_match('/Netscape/i', $this->user_agent)) {
      $this->browser_name = 'Netscape';
    }
  }
  
}
  
?>



