<?php
  function PHPNameToPageName($PHPName) {
    switch ($PHPName) {
      case 'index':
        $PageName = 'TechNow';
        break;
      case 'signin':
        $PageName = 'Sign In';
        break;
      case 'signup':
        $PageName = 'Sign Up';
        break;
      case 'cart':
          $PageName = 'Cart';
          break;
      case 'payment':
          $PageName = 'Payment';
          break;
      case 'contact':
          $PageName = 'Contact';
          break;
    }
    return $PageName;
  }

  function PHPNameToCSSName($PHPName) {
    switch ($PHPName) {
      case 'signin':
        $CSSName = 'signin.css';
        break;
      case 'signup':
        $CSSName = 'signup.css';
        break;

      default:
        $CSSName = 'style.css';
    }
    return $CSSName;
  }

  function PHPNameToJSName($PHPName) {
    switch ($PHPName) {
      case 'signin':
        $JSName = 'login.js';
        break;
      case 'signup':
        $JSName = 'login.js';
        break;
        
      default:
        $JSName = 'main.js';
    }
    return $JSName;
  }
?>