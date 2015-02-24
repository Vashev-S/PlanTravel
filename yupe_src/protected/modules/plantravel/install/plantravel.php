<?php
/**
 *
 * Файл конфигурации модуля client
 *
 * @author SergeyV <ussamabenladen@gmail.com>
 * @package yupe.modules.planTravel.install
 *
 */
return array(
  'module'   => array(
    'class'  => 'application.modules.plantravel.PlantravelModule',
  ),
  'import'    => array(
    'application.modules.plantravel.models.*',
  ),
  // обязательно явно прописываем все публичне урл-адреса, так как у нас CUrlManager::useStrictParsing === true
  'rules'     => array(
  ),
    'component' => array()
);