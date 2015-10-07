<?php

class m170215_183200_roomType_default extends yupe\components\DbMigration
{
  public function safeUp()
  {
    $this->createTable(
      "{{pt_roomType}}",
      [
        "id" => "pk",
        "name" => "varchar(63) not null",
      ],
      $this->getOptions()
    );
  }

  public function safeDown()
  {
    $this->dropTable("{{pt_roomType}}");
  }
}