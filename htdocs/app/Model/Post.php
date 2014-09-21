<?php
/**
 * Created by PhpStorm.
 * User: MrTien
 * Date: 8/24/14
 * Time: 10:28 AM
 */

class Post extends AppModel {
       public $validate = array(
           'title' => array('rule' => 'notEmpty'),
           'body' => array('rule' => 'notEmpty')
       );

} 