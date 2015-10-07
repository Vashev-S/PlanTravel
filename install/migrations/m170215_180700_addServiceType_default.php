<?php

class m170215_180700_addServiceType_default extends yupe\components\DbMigration
{
  public function safeUp()
  {
    $this->createTable(
      "{{pt_addServiceType}}",
      [
        "id" => "pk",
        "name" => "varchar(255) not null",
      ],
      $this->getOptions()
    );
  }

  public function safeDown()
  {
    $this->dropTable("{{pt_addServiceType}}");
  }
}