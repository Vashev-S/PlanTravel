<?php

class m170215_181600_tour_default extends yupe\components\DbMigration
{
  public function safeUp()
  {
    $this->createTable(
      "{{pt_tour}}",
      [
        "id" => "pk",
        "tour_type_id" => "integer default 0",
        "add_service" => "integer default 0",
        "create_date" => "datetime not null",
        "user" => "integer not null",
        "min_price" => "float",
        "formula" => "varchar(63)",
      ],
      $this->getOptions()
    );

    $this->addForeignKey("fk_{{pt_tour}}_tourType", "{{pt_tour}}", "tour_type_id", "{{pt_tourType}}", "id", "SET NULL", "CASCADE");
    $this->addForeignKey("fk_{{pt_tour}}_addService", "{{pt_tour}}", "add_service", "{{pt_addService}}", "id", "SET NULL", "CASCADE");
  }

  public function safeDown()
  {
    $this->dropTable("{{pt_tour}}");
  }
}