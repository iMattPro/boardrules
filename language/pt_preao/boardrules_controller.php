<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
* @Traduzido por: http://phpbbportugal.com - segundo as normas do Acordo Ortográfico
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ » “ ” …
//

$lang = array_merge($lang, array(
	'BOARDRULES_HEADER'			=> 'Regras do Fórum',
	'BOARDRULES_EXPLAIN'		=> 'Estas regras servem para esclarecer as várias responsabilidades de todos os membros da comunidade %s. Devem ser respeitadas por todos para garantir que o nosso Fórum funciona sem problemas e oferece uma experiência divertida e produtiva para todos os membros da comunidade.',
	'BOARDRULES_CATEGORIES'		=> 'Secções de Regras',
	'BOARDRULES_CATEGORY_ANCHOR'=> 'seccao-%s',
	'BOARDRULES_RULE_ANCHOR'	=> 'regra-%s',
));
