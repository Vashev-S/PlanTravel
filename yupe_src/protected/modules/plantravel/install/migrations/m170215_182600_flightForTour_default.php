<?php

class m170215_182600_flightForTour_default extends yupe\components\DbMigration
{
  public function safeUp()
  {
    $this->createTable(
      "{{pt_flightForTour}}",
      [
        "id" => "pk",
        "tour_id" => "integer not null",
        "flight_id" => "integer not null",
        "priority_order" => "tinyint not null",
      ],
      $this->getOptions()
    );

    $this->addForeignKey("fk_{{pt_flightForTour}}_tour", "{{pt_flightForTour}}", "tour_id", "{{pt_tour}}", "id", "CASCADE", "CASCADE");
    $this->addForeignKey("fk_{{pt_flightForTour}}_flight", "{{pt_flightForTour}}", "flight_id", "{{pt_flight}}", "id", "CASCADE", "CASCADE");
  }

  public function safeDown()
  {
    $this->dropTable("{{pt_flightForTour}}");
  }
}