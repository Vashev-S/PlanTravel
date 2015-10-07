<?php

class m170215_172900_location_default extends yupe\components\DbMigration
{
  public function safeUp()
  {
    $this->createTable(
      "{{pt_location}}",
      [
        "id" => "pk",
        "name" => "varchar(127) not null",
      ],
      $this->getOptions()
    );
  }

  public function safeDown()
  {
    $this->dropTable("{{pt_location}}");
  }
}