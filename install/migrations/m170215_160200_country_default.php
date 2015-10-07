<?php

class m170215_160200_country_default extends yupe\components\DbMigration
{
  public function safeUp()
  {
    $this->createTable(
      "{{pt_country}}",
      [
        "id" => "pk",
        "name" => "varchar(127) not null",
        "description" => "varchar(255) not null"
      ],
      $this->getOptions()
    );
  }

  public function safeDown()
  {
    $this->dropTable("{{pt_country}}");
  }
}
