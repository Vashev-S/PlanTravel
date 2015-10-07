<?php

class m170215_180900_addService_default extends yupe\components\DbMigration
{
  public function safeUp()
  {
    $this->createTable(
      "{{pt_addService}}",
      [
        "id" => "pk",
        "price" => "float not null",
        "service_type_id" => "integer default 0",
        "partner_id" => "integer not null",
      ],
      $this->getOptions()
    );

    $this->addForeignKey("fk_{{pt_addService}}_addServiceType", "{{pt_addService}}", "service_type_id", "{{pt_addServiceType}}", "id", "SET NULL", "CASCADE");
    $this->addForeignKey("fk_{{pt_addService}}_partner", "{{pt_addService}}", "partner_id", "{{pt_partner}}", "id", "CASCADE", "CASCADE");
  }

  public function safeDown()
  {
    $this->dropTable("{{pt_addService}}");
  }
}