<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends CI_Model
{
  public function get_info(){
    return array('auteur' => 'Rado Fanomezana',
                  'date' => '24/08/12',
                  'email' => 'email@ndd.fr');
  }
}
