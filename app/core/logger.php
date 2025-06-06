<?php

namespace DEFAULTNAMESPACE\app\core;
class logger {

   private static $print_error = false;

   public static function customErrorMsg($e = '') {
       echo "<p>Es ist ein Fehler aufgetreten.</p>";
       echo "<p>$e</p>";
       exit;
   }

   public static function exception_handler($e) {
   
       self::newMessage($e);
       self::customErrorMsg($e);
  

   }

   public static function error_handler($number, $message, $file, $line) {
       $msg = "$message in $file on line $line";

       if ( ($number !== E_NOTICE) && ($number < 2048) ) {
           self::errorMessage($msg);
           // self::customErrorMsg($e);
       }

       return 0;
   }

   public static function newMessage($e, $print_error = false, $clear = false, $error_file = 'errorlog.html')
           {

      $message = $e->getMessage();
      $code = $e->getCode();
      $file = $e->getFile();
      $line = $e->getLine();
      $trace = $e->getTraceAsString();
      $date = date('M d, Y G:iA');
     
      $log_message = "<h3>Exception information:</h3>\n
         <p><strong>Date:</strong> {$date}</p>\n
         <p><strong>Message:</strong> {$message}</p>\n
         <p><strong>Code:</strong> {$code}</p>\n
         <p><strong>File:</strong> {$file}</p>\n
         <p><strong>Line:</strong> {$line}</p>\n
         <h3>Stack trace:</h3>\n
         <pre>{$trace}</pre>\n
         <hr />\n";

      if (is_file($error_file) === false) {
         file_put_contents($error_file, '');
      }

      if ($clear) {
         $content = '';
      } else {
         $content = file_get_contents($error_file);
      }

      file_put_contents($error_file, $log_message . $content);

      if ($print_error == true) {
         echo $log_message;
         exit;
      }
   }

   public static function errorMessage($error, $print_error = false, $error_file = 'errorlog.html') {

      $date = date('M d, Y G:iA');
      $log_message = "<p>Error on $date - $error</p>\n\n";

      file_put_contents($error_file, $log_message, FILE_APPEND);

      if ($print_error == true) {
         echo $log_message;
         exit;
      }
   }
}
?>
