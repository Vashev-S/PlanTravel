<?php

class m170215_161500_airport_default extends yupe\components\DbMigration
{
  public function safeUp()
  {
    $this->createTable(
      "{{pt_airport}}",
      [
        "id" => "pk",
        "name" => "varchar(45) not null",
        "code" => "varchar(7) not null",
        "city_id" => "integer not null",
      ],
      $this->getOptions()
    );

    $this->addForeignKey("fk_{{pt_airport}}_city", "{{pt_airport}}", "city_id", "{{pt_city}}", "id", "CASCADE", "CASCADE");
  }

  public function safeDown()
  {
    $this->dropTable("{{pt_airport}}");
  }
}
