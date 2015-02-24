<?php

class m170215_183600_partnerRoomPrice_default extends yupe\components\DbMigration
{
  public function safeUp()
  {
    $this->createTable(
      "{{pt_partnerRoomPrice}}",
      [
        "id" => "pk",
        "max_day" => "tinyint",
        "min_day" => "tinyint",
        "day_price" => "float not null",
        "room_id" => "integer not null",
        "partner_id" => "integer not null",
      ],
      $this->getOptions()
    );

    $this->addForeignKey("fk_{{pt_partnerRoomPrice}}_room", "{{pt_partnerRoomPrice}}", "room_id", "{{pt_room}}", "id", "CASCADE", "CASCADE");
    $this->addForeignKey("fk_{{pt_partnerRoomPrice}}_partner", "{{pt_partnerRoomPrice}}", "partner_id", "{{pt_partner}}", "id", "CASCADE", "CASCADE");
  }

  public function safeDown()
  {
    $this->dropTable("{{pt_partnerRoomPrice}}");
  }
}