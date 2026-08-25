<?php
declare(strict_types=1);
if(session_status()!==PHP_SESSION_ACTIVE) session_start();
require_once __DIR__.'/database.php';
function e(string $v):string{return htmlspecialchars($v,ENT_QUOTES,'UTF-8');}
function csrf_token():string{if(empty($_SESSION['csrf']))$_SESSION['csrf']=bin2hex(random_bytes(32));return $_SESSION['csrf'];}
function verify_csrf():void{if(!hash_equals($_SESSION['csrf']??'',$_POST['csrf']??'')){http_response_code(403);exit('CSRF validation failed.');}}
function customer():?array{global $pdo;if(empty($_SESSION['customer_id']))return null;$s=$pdo->prepare('SELECT * FROM customers WHERE id=?');$s->execute([(int)$_SESSION['customer_id']]);return $s->fetch()?:null;}
function subscription_active(?array $c):bool{return $c && $c['status']==='active' && !empty($c['subscription_expiry']) && strtotime($c['subscription_expiry'])>time();}
function require_customer():array{$c=customer();if(!subscription_active($c)){header('Location: /index.php?expired=1');exit;}return $c;}
function admin():?array{global $pdo;if(empty($_SESSION['admin_id']))return null;$s=$pdo->prepare('SELECT * FROM admins WHERE id=?');$s->execute([(int)$_SESSION['admin_id']]);return $s->fetch()?:null;}
function require_admin():array{$a=admin();if(!$a){header('Location: /admin/login.php');exit;}return $a;}
