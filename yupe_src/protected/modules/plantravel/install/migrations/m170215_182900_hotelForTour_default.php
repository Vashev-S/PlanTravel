<?php

class m170215_182900_hotelForTour_default extends yupe\components\DbMigration
{
  public function safeUp()
  {
    $this->createTable(
      "{{pt_hotelForTour}}",
      [
        "id" => "pk",
        "tour_id" => "integer not null",
        "hotel_id" => "integer not null",
      ],
      $this->getOptions()
    );

    $this->addForeignKey("fk_{{pt_hotelForTour}}_tour", "{{pt_hotelForTour}}", "tour_id", "{{pt_tour}}", "id", "CASCADE", "CASCADE");
    $this->addForeignKey("fk_{{pt_hotelForTour}}_hotel", "{{pt_hotelForTour}}", "hotel_id", "{{pt_hotel}}", "id", "CASCADE", "CASCADE");
  }

  public function safeDown()
  {
    $this->dropTable("{{pt_hotelForTour}}");
  }
}