# OneSignal PHP Library
###### This PHP Library help You Integrate OneSignal Push Notification Easily in your website , This Library One Support Laravel Framework

## Features 
##### Te Ways You Can Send The Notification
* Send Notification To all Subscribed Users
* Send To Specific User 
* Send To Segment 
  
    
------------

#### Notification Features
* Send With Custom Logo icons (Required)
* Send With Large Image (Optional)
* Send With Custom Badge (Optional)
* Send With Unlimited Customized Buttons (Optional)
  
    
------------

### Installation 
 whether you re using laravel or not just install the package wit
 ```
 composer require youssef20000/onesignal-php  
 ```
 > if you are using laravel >= 5.6 The Package will be detected automatically    
 
#### Laravel Only 
Publish the Config File For The Library 
```
 php artisan vendor:publish --tag=config
```
 
 ### How To Use It ? 
 
 Requiring And Initialize The Library  
 ```php
<?php 
// Require The Outload File For Composeer 
use Youssef\OneSignal\OneSignal;
$notification = new OneSignal();

?>
```
 The Properties to change 
 
 | Property Name | Is Required | The Value  |
 | ------------ | ------------ | ------------ |
 | $heading |  :tw-2714: | The Title Heading With language code in array  ` $notification->heading = ["en"=>"hello World !","ar"=>"مرحبا بالعالم"] ` |
 | $content |  :tw-2714: | The Notification Body With language code like the `$heading` |
 | $logo    |  :tw-2714: | The Logo Url `String` |
 | $image   |  --  | The Big Image Url `String` |
 | $Url     |  --  | The Action Url That Will Opened `String` |
 | $appUrl  |  --  | If You Have App Url You Want Notification Redirect user To `String` | 
 | $buttons |  --  | The Buttons Array Examples At [The Official Docs](https://documentation.onesignal.com/reference#section-action-buttons "The Official Docs") | 
 | $badge   |  --  | The Notification Bage Icon Url `string` |
 
 ------
 
 ##### EX1: Send To All Users 
 
 ```php
   $notification->sendToAll(); // This Will Reqturn A JSON With The Response From OneSginal
 ```
  
 ##### EX2: Send To Specific User 
 
 ```php
   $notification->sendToSpecific($userSuscribtionID); // This Will Reqturn A JSON With The Response From OneSginal
 ```
 
   
 ##### EX3: Send To Custom Segments  
 
 ```php
   $notification->sendToSegment($segmentsArray); // This Will Reqturn A JSON With The Response From OneSginal
 ```

 ## To Do 
 
 * [ ] Add Send To Multi Users
 * [ ] Add Unit Test
 * [ ] Handle Exceptions 
 * [ ] Add Send To  Custom Devices  
