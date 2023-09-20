<?php
/* Smarty version 4.3.2, created on 2023-09-13 17:43:16
  from '/home/smarty_APP_01/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_65017624b4e451_99581931',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '682435718154763c00941f1f0e7705005ce33f18' => 
    array (
      0 => '/home/smarty_APP_01/templates/index.tpl',
      1 => 1694593168,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65017624b4e451_99581931 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title><?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES, 'UTF-8');?>
</title>
<style>
.red{ color: #ff0000; }
</style>
</head>
<body>
    <h1><?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES, 'UTF-8');?>
</h1>
    <p class="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['class']->value, ENT_QUOTES, 'UTF-8');?>
">Hello! <?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8');?>
</p>
</body>
</html>
<?php }
}
