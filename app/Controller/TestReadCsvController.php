<?php
  class TestReadCsvController extends AppController {

    /*
     * Function test read file csv
     */
    function read_csv() {
      $csv = $this->csv('test');
      $posts = $this->csv('posts');
      $list = $csv->find($csv->data, '0','rating');
      $a = $csv->find($list,'ngo duy trung','title');
    //die(var_dump($a));
    }
  }
?>
