<?php

include_once "lib/gettext.php";

include_once "lib/streams.php";


/*include_once 'lib/gettext.inc';

define('PROJECT_DIR', realpath('./'));
define('LOCALE_DIR', PROJECT_DIR .DIRECTORY_SEPARATOR . 'locale');
define('DEFAULT_LOCALE', 'en_US');

$supported_locales = array('en_US', 'sr_CS', 'de_CH');
$encoding = 'UTF-8';

$locale = (isset($_GET['lang']))? $_GET['lang'] : DEFAULT_LOCALE;

// gettext setup
T_setlocale(LC_MESSAGES, $locale);
// Set the text domain as 'messages'
$domain = 'message';
T_bindtextdomain($domain, LOCALE_DIR);
T_bind_textdomain_codeset($domain, $encoding);
T_textdomain($domain);*/

$locale_lang = $_GET['lang'];

$locale_file = new FileReader("locale/$locale_lang/LC_MESSAGES/message.mo");

$locale_fetch = new gettext_reader($locale_file);

function tr_($text)
{
    global $locale_fetch;

    return $locale_fetch->translate($text);
}

function tn_($singular, $plural, $number)
{
    global $locale_fetch;

    return $locale_fetch->ngettext($singular, $plural, $number);
}

$trans = tr_("А сега да видим кво ще стане");
?>



<h3><?php echo sprintf(tn_("Аз имам %d долар", "%d долара", 2),2);?></h3>
<h3><?php echo ($trans);?></h3>

<!--<h3><?php /*echo T_('Аз много обичам гет текст');*/?></h3>
<h3><?php /*echo T_('Здравей');*/?></h3>
<h3><?php /*echo sprintf(T_ngettext("Аз имам %d долар", "%d долара", 1), 1);*/?></h3>


-->