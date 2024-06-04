<?php

namespace App\Helpers;

use Config;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Helpers
{
  public static function appClasses()
  {

    $data = config('custom.custom');


    // default data array
    $DefaultData = [
      'myLayout' => 'vertical',
      'myTheme' => 'theme-default',
      'myStyle' => 'light',
      'myRTLSupport' => true,
      'myRTLMode' => true,
      'hasCustomizer' => true,
      'showDropdownOnHover' => true,
      'displayCustomizer' => true,
      'contentLayout' => 'compact',
      'headerType' => 'fixed',
      'navbarType' => 'fixed',
      'menuFixed' => true,
      'menuCollapsed' => false,
      'footerFixed' => false,
      'customizerControls' => [
        'rtl',
        'style',
        'headerType',
        'contentLayout',
        'layoutCollapsed',
        'showDropdownOnHover',
        'layoutNavbarOptions',
        'themes',
      ],
      //   'defaultLanguage'=>'en',
    ];

    // if any key missing of array from custom.php file it will be merge and set a default value from dataDefault array and store in data variable
    $data = array_merge($DefaultData, $data);

    // All options available in the template
    $allOptions = [
      'myLayout' => ['vertical', 'horizontal', 'blank', 'front'],
      'menuCollapsed' => [true, false],
      'hasCustomizer' => [true, false],
      'showDropdownOnHover' => [true, false],
      'displayCustomizer' => [true, false],
      'contentLayout' => ['compact', 'wide'],
      'headerType' => ['fixed', 'static'],
      'navbarType' => ['fixed', 'static', 'hidden'],
      'myStyle' => ['light', 'dark', 'system'],
      'myTheme' => ['theme-default', 'theme-bordered', 'theme-semi-dark'],
      'myRTLSupport' => [true, false],
      'myRTLMode' => [true, false],
      'menuFixed' => [true, false],
      'footerFixed' => [true, false],
      'customizerControls' => [],
      // 'defaultLanguage'=>array('en'=>'en','fr'=>'fr','de'=>'de','ar'=>'ar'),
    ];

    //if myLayout value empty or not match with default options in custom.php config file then set a default value
    foreach ($allOptions as $key => $value) {
      if (array_key_exists($key, $DefaultData)) {
        if (gettype($DefaultData[$key]) === gettype($data[$key])) {
          // data key should be string
          if (is_string($data[$key])) {
            // data key should not be empty
            if (isset($data[$key]) && $data[$key] !== null) {
              // data key should not be exist inside allOptions array's sub array
              if (!array_key_exists($data[$key], $value)) {
                // ensure that passed value should be match with any of allOptions array value
                $result = array_search($data[$key], $value, 'strict');
                if (empty($result) && $result !== 0) {
                  $data[$key] = $DefaultData[$key];
                }
              }
            } else {
              // if data key not set or
              $data[$key] = $DefaultData[$key];
            }
          }
        } else {
          $data[$key] = $DefaultData[$key];
        }
      }
    }
    $styleVal = $data['myStyle'] == "dark" ? "dark" : "light";
    if (isset($_COOKIE['mode'])) {
      if ($_COOKIE['mode'] === "system") {
        if (isset($_COOKIE['colorPref'])) {
          $styleVal = Str::lower($_COOKIE['colorPref']);
        }
      } else {
        $styleVal = $_COOKIE['mode'];
      }
    }
    //layout classes
    $layoutClasses = [
      'layout' => $data['myLayout'],
      'theme' => $data['myTheme'],
      'style' => $styleVal,
      'styleOpt' => $data['myStyle'],
      'rtlSupport' => $data['myRTLSupport'],
      'rtlMode' => $data['myRTLMode'],
      'textDirection' => $data['myRTLMode'],
      'menuCollapsed' => $data['menuCollapsed'],
      'hasCustomizer' => $data['hasCustomizer'],
      'showDropdownOnHover' => $data['showDropdownOnHover'],
      'displayCustomizer' => $data['displayCustomizer'],
      'contentLayout' => $data['contentLayout'],
      'headerType' => $data['headerType'],
      'navbarType' => $data['navbarType'],
      'menuFixed' => $data['menuFixed'],
      'footerFixed' => $data['footerFixed'],
      'customizerControls' => $data['customizerControls'],
    ];

    // sidebar Collapsed
    if ($layoutClasses['menuCollapsed'] == true) {
      $layoutClasses['menuCollapsed'] = 'layout-menu-collapsed';
    }

    // Header Type
    if ($layoutClasses['headerType'] == 'fixed') {
      $layoutClasses['headerType'] = 'layout-menu-fixed';
    }
    // Navbar Type
    if ($layoutClasses['navbarType'] == 'fixed') {
      $layoutClasses['navbarType'] = 'layout-navbar-fixed';
    } elseif ($layoutClasses['navbarType'] == 'static') {
      $layoutClasses['navbarType'] = '';
    } else {
      $layoutClasses['navbarType'] = 'layout-navbar-hidden';
    }

    // Menu Fixed
    if ($layoutClasses['menuFixed'] == true) {
      $layoutClasses['menuFixed'] = 'layout-menu-fixed';
    }


    // Footer Fixed
    if ($layoutClasses['footerFixed'] == true) {
      $layoutClasses['footerFixed'] = 'layout-footer-fixed';
    }

    // RTL Supported template
    if ($layoutClasses['rtlSupport'] == true) {
      $layoutClasses['rtlSupport'] = '/rtl';
    }

    // RTL Layout/Mode
    if ($layoutClasses['rtlMode'] == true) {
      $layoutClasses['rtlMode'] = 'rtl';
      $layoutClasses['textDirection'] = 'rtl';
    } else {
      $layoutClasses['rtlMode'] = 'ltr';
      $layoutClasses['textDirection'] = 'ltr';
    }

    // Show DropdownOnHover for Horizontal Menu
    if ($layoutClasses['showDropdownOnHover'] == true) {
      $layoutClasses['showDropdownOnHover'] = true;
    } else {
      $layoutClasses['showDropdownOnHover'] = false;
    }

    // To hide/show display customizer UI, not js
    if ($layoutClasses['displayCustomizer'] == true) {
      $layoutClasses['displayCustomizer'] = true;
    } else {
      $layoutClasses['displayCustomizer'] = false;
    }

    return $layoutClasses;
  }

  public static function updatePageConfig($pageConfigs)
  {
    $demo = 'custom';
    if (isset($pageConfigs)) {
      if (count($pageConfigs) > 0) {
        foreach ($pageConfigs as $config => $val) {
          Config::set('custom.' . $demo . '.' . $config, $val);
        }
      }
    }
  }
  public static function getProfileById()
  {
    $data = DB::select('select u.*, rs.rs_name , ra.ra_name ,r.role_name  from users u, role_structure rs, role_access ra, role r 
        where u.role_structure=rs.rs_id 
        and u.role_access=ra.ra_id 
        and u.role=r.role_id 
        and id = ' . Auth::user()->id . '');
    return $data[0];
  }
  public static function aplikasi()
  {
    $aplikasi = DB::table('aplikasi')->first();
    return $aplikasi;
  }
  public static function getStatus()
  {
    $data = DB::table('status')->get();
    return $data;
  }
  public static function getRoleStructure()
  {
    if (Auth::user()->role_structure == Helpers::getRoleStructureJson()[3]) {
      $data = DB::table('role_structure')->where('rs_status', 'ACTIVE')->get();
    } else {
      $data = DB::table('role_structure')->whereNot('rs_id', Helpers::getRoleStructureJson()[3])->where('rs_status', 'ACTIVE')->get();
    }
    return $data;
  }
  public static function getRoleStructureJson()
  {
    $data = ['1', '2', '3', '4'];
    return $data;
  }

  public static function getRoleaccess()
  {
    if (Auth::user()->role_access == Helpers::getRoleStructureJson()[2]) {
      $data = DB::table('role_access')->where('ra_status', 'ACTIVE')->get();
    } else {
      $data = DB::table('role_access')->whereNot('ra_id', Helpers::getRoleStructureJson()[2])->where('ra_status', 'ACTIVE')->get();
    }
    return $data;
  }
  public static function getRole()
  {
    if (Auth::user()->role == Helpers::getRoleStructureJson()[3]) {
      $data = DB::table('role')->where('role_status', 'ACTIVE')->get();
    } else {
      $data = DB::table('role')->whereNot('role_id', Helpers::getRoleStructureJson()[3])->where('role_status', 'ACTIVE')->get();
    }
    return $data;
  }
  public static function sendMessage($request)
  {

    foreach ($request->kontak as $key => $kontak) {

      $body = array(
        "api_key" => self::aplikasi()->token_whatsapp,
        "receiver" => $kontak,
        "data" => array("message" => $request->message)
      );

      $curl = curl_init();
      curl_setopt_array($curl, [
        CURLOPT_URL => "https://wa.sppapp.com/api/send-message",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($body),
        CURLOPT_HTTPHEADER => [
          "Accept: */*",
          "Content-Type: application/json",
        ],
      ]);

      $response = curl_exec($curl);
      $err = curl_error($curl);
      return $response;
    }
  }
  public static function sendMessageAll($request)
  {
    $body = array(
      "api_key" => self::aplikasi()->token_whatsapp,
      "receiver" => $request->kontak,
      "data" => array("message" => $request->message)
    );

    $curl = curl_init();
    curl_setopt_array($curl, [
      CURLOPT_URL => "https://wa.sppapp.com/api/send-message",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => json_encode($body),
      CURLOPT_HTTPHEADER => [
        "Accept: */*",
        "Content-Type: application/json",
      ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);
    return $response;
  }
}
