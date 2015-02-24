<?php

class m170215_181400_tourType_default extends yupe\components\DbMigration
{
  public function safeUp()
  {
    $this->createTable(
      "{{pt_tourType}}",
      [
        "id" => "pk",
        "name" => "varchar(127) not null",
      ],
      $this->getOptions()
    );
  }

  public function safeDown()
  {
    $this->dropTable("{{pt_tourType}}");
  }
}