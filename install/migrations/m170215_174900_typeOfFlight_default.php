<?php

class m170215_174900_typeOfFlight_default extends yupe\components\DbMigration
{
  public function safeUp()
  {
    $this->createTable(
      "{{pt_typeOfFlight}}",
      [
        "id" => "pk",
        "name" => "varchar(45) not null",
      ],
      $this->getOptions()
    );
  }

  public function safeDown()
  {
    $this->dropTable("{{pt_typeOfFlight}}");
  }
}