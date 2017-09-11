<?php

require_once ('Core/Model.php');
require_once ('Entities/User.php');
require_once ('Entities/Post.php');
require_once ('Core/MyIterator.php');

use Core\MyIterator;
use Entities\User;
use Entities\Post;

$user = new User(1, '123456789A', 'José Gabriel', 'González');
$post = new Post();

// var_dump($user->getMyClassName());
// var_dump($post->getMyClassName());
//
// var_dump(User::getMyClassNameFromStatic());
// var_dump(Post::getMyClassNameFromStatic());
//
// $iterator = new MyIterator();
//
// foreach($iterator as $key => $value) {
//     var_dump($key, $value);
//     echo "\n";
// }
//
// var_dump(count($iterator));

// var_dump(User::isValidate('21/12/2014'));

require_once ('Templates/index.php');