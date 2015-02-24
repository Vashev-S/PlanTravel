<?php

class m170215_183400_room_default extends yupe\components\DbMigration
{
  public function safeUp()
  {
    $this->createTable(
      "{{pt_room}}",
      [
        "id" => "pk",
        "room_type_id" => "integer not null",
        "hotel_id" => "integer not null",
      ],
      $this->getOptions()
    );

    $this->addForeignKey("fk_{{pt_room}}_roomType", "{{pt_room}}", "room_type_id", "{{pt_roomType}}", "id", "CASCADE", "CASCADE");
    $this->addForeignKey("fk_{{pt_room}}_hotel", "{{pt_room}}", "hotel_id", "{{pt_hotel}}", "id", "CASCADE", "CASCADE");
  }

  public function safeDown()
  {
    $this->dropTable("{{pt_room}}");
  }
}