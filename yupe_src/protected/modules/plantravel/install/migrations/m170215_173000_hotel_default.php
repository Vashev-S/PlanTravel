<?php

class m170215_173000_hotel_default extends yupe\components\DbMigration
{
  public function safeUp()
  {
    $this->createTable(
      "{{pt_hotel}}",
      [
        "id" => "pk",
        "name" => "varchar(127) not null",
        "type" => "varchar(31)",
        "resort_id" => "integer not null",
        "location_id" => "integer default 0",
      ],
      $this->getOptions()
    );

    $this->addForeignKey("fk_{{pt_hotel}}_resort", "{{pt_hotel}}", "resort_id", "{{pt_resort}}", "id", "CASCADE", "CASCADE");
    $this->addForeignKey("fk_{{pt_hotel}}_location", "{{pt_hotel}}", "location_id", "{{pt_location}}", "id", "SET NULL", "CASCADE");
  }

  public function safeDown()
  {
    $this->dropTable("{{pt_hotel}}");
  }
}