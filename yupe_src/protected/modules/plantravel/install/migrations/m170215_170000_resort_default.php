<?php

class m170215_170000_resort_default extends yupe\components\DbMigration
{
  public function safeUp()
  {
    $this->createTable(
      "{{pt_resort}}",
      [
        "id" => "pk",
        "name" => "varchar(127) not null",
        "country_id" => "integer not null",
      ],
      $this->getOptions()
    );

    $this->addForeignKey("fk_{{pt_resort}}_city", "{{pt_resort}}", "country_id", "{{pt_country}}", "id", "CASCADE", "CASCADE");
  }

  public function safeDown()
  {
    $this->dropTable("{{pt_resort}}");
  }
}
