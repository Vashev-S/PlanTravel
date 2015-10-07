<?php

class m170215_182100_transForTour_default extends yupe\components\DbMigration
{
  public function safeUp()
  {
    $this->createTable(
      "{{pt_transForTour}}",
      [
        "id" => "pk",
        "tour_id" => "integer not null",
        "trans_id" => "integer not null",
        "price" => "float not null",
      ],
      $this->getOptions()
    );

    $this->addForeignKey("fk_{{pt_transForTour}}_tour", "{{pt_transForTour}}", "tour_id", "{{pt_tour}}", "id", "CASCADE", "CASCADE");
    $this->addForeignKey("fk_{{pt_transForTour}}_trans", "{{pt_transForTour}}", "trans_id", "{{pt_trans}}", "id", "CASCADE", "CASCADE");
  }

  public function safeDown()
  {
    $this->dropTable("{{pt_transForTour}}");
  }
}