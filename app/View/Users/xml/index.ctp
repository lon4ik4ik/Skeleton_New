// app/View/Users/xml/index.ctp
// Do some formatting and manipulation on
// the $users array.
$xml = Xml::fromArray(array('response' => $users));
echo $xml->asXML();