<?php

class m170215_180200_transType_default extends yupe\components\DbMigration
{
  public function safeUp()
  {
    $this->createTable(
      "{{pt_transType}}",
      [
        "id" => "pk",
        "name" => "varchar(127) not null",
      ],
      $this->getOptions()
    );
  }

  public function safeDown()
  {
    $this->dropTable("{{pt_transType}}");
  }
}