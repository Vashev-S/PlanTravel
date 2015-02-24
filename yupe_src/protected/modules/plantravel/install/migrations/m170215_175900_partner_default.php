<?php

class m170215_175900_partner_default extends yupe\components\DbMigration
{
  public function safeUp()
  {
    $this->createTable(
      "{{pt_partner}}",
      [
        "id" => "pk",
        "name" => "varchar(127) not null",
        "info" => "varchar(255)",
        "country_id" => "integer not null",
      ],
      $this->getOptions()
    );

    $this->addForeignKey("fk_{{pt_partner}}_country", "{{pt_partner}}", "country_id", "{{pt_country}}", "id", "CASCADE", "CASCADE");
  }

  public function safeDown()
  {
    $this->dropTable("{{pt_partner}}");
  }
}