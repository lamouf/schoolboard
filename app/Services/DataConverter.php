<?php

namespace App\Services;

/**
 * Class ObjectConverter
 */
class DataConverter
{

    /**
     * @var array
     */
    private $data = [];

    /**
     * @var
     */
    private $xml;

    /**
     * @param array $data
     * @return mixed
     */
   public static function convertToXml(array $data)
   {
       // "Create" the document.
       $xml = new \DOMDocument("1.0", "ISO-8859-15");

       $xml_student = $xml->createElement("Student");
       foreach ($data as $key => $value) {

           if (!is_array($value)) {
               $element = $xml->createElement($key, $value);
               $xml_student->appendChild($element);
           } else {
               if (is_array($value)) {
                   $element = $xml->createElement($key , implode(';', $value));
                   $xml_student->appendChild($element);
               }
           }

       }
       $xml->appendChild($xml_student);
       return $xml->saveXML();

   }

}