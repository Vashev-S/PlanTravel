<?php

class m170215_160700_city_default extends yupe\components\DbMigration
{
  public function safeUp()
  {
    $this->createTable(
      "{{pt_city}}",
      [
        "id" => "pk",
        "name" => "varchar(127) not null",
        "country_id" => "integer not null",
      ],
      $this->getOptions()
    );

    $this->addForeignKey("fk_{{pt_city}}_country", "{{pt_city}}", "country_id", "{{pt_country}}", "id", "CASCADE", "CASCADE");
  }

  public function safeDown()
  {
    $this->dropTable("{{pt_city}}");
  }
}
