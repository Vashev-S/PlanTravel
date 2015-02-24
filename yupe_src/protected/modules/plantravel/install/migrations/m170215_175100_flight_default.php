<?php

class m170215_175100_flight_default extends yupe\components\DbMigration
{
  public function safeUp()
  {
    $this->createTable(
      "{{pt_flight}}",
      [
        "id" => "pk",
        "price_adult" => "float not null",
        "price_child" => "float not null",
        "start" => "time not null",
        "finish" => "time not null",
        "available_from" => "date not null",
        "available_to" => "date not null",
        "from_port" => "integer not null",
        "to_port" => "integer not null",
        "flight_type" => "integer default 0",
      ],
      $this->getOptions()
    );

    $this->addForeignKey("fk_{{pt_flight}}_from_airport", "{{pt_flight}}", "from_port", "{{pt_airport}}", "id", "CASCADE", "CASCADE");
    $this->addForeignKey("fk_{{pt_flight}}_to_airport", "{{pt_flight}}", "to_port", "{{pt_airport}}", "id", "CASCADE", "CASCADE");
    $this->addForeignKey("fk_{{pt_flight}}_typeOfFlight", "{{pt_flight}}", "flight_type", "{{pt_typeOfFlight}}", "id", "SET NULL", "CASCADE");
  }

  public function safeDown()
  {
    $this->dropTable("{{pt_flight}}");
  }
}