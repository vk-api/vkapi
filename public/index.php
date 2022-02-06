<?php

namespace Vkapi;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';

if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

$dotenv = new \Symfony\Component\Dotenv\Dotenv();
$dotenv->load(dirname(__DIR__, 1) . '/.env', dirname(__DIR__, 1) . '/.env.dev');

// $data = readInput(dirname('php://input');

$data = \Vkapi\readinput\readInput(dirname(__DIR__, 1) . '/tests/fixtures/wall_post_new_with_poll.json');
$type = \Vkapi\parsers\root\getValue($data, ['type']);
$event = "Vkapi\\events\\event\\{$type}";
$result = $event($data);
var_export($result);

//  $prop = \Vkapi\parsers\root\getValue($data, ["object", "id"]);
//  var_dump($prop);

// $prop2 = \Vkapi\parsers\root\getValue($data, ["type"]);
// var_dump($prop2);


//$collection = collect($data);
//$value = $collection->get('id');
//var_dump($value);

//$arr = ['group_id' => 123611341];
//Funct\Collection\findWhere('123611341', '123611341');

//$aname = \Vkapi\api\getUsers(11412368);
//print_r($aname);
//var_dump(\Vkapi\buildvalues\getAutorName($aname));

// $dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__, 1));
// $dotenv->load();
// print_r($_ENV);
// print_r(\Dotenv\Dotenv::parse("FOO=Bar\nBAZ=\"Hello \${FOO}\""));

//use Symfony\Component\Dotenv\Dotenv;
//$dotenv = new \Symfony\Component\Dotenv\Dotenv();
//$dotenv->load(dirname(__DIR__, 1).'/.yml');
// you can also load several files
//$dotenv->load(dirname(__DIR__, 1).'/.env', dirname(__DIR__, 1).'/.env.dev');
//print_r($_ENV);
//[$CONFIRMATION_TOKEN, $SECRET_TOKEN, $GROUP_ID] = explode(' ', $_ENV['GROUP_1']);
//echo "{$CONFIRMATION_TOKEN} {$SECRET_TOKEN} {$GROUP_ID}";
//echo $_ENV['SYMFONY_DOTENV_VARS'];
