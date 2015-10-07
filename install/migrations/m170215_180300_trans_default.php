<?php

class m170215_180300_trans_default extends yupe\components\DbMigration
{
  public function safeUp()
  {
    $this->createTable(
      "{{pt_trans}}",
      [
        "id" => "pk",
        "price" => "float not null",
        "trans_type_id" => "integer default 0",
        "partner_id" => "integer not null",
      ],
      $this->getOptions()
    );

    $this->addForeignKey("fk_{{pt_trans}}_transType", "{{pt_trans}}", "trans_type_id", "{{pt_transType}}", "id", "SET NULL", "CASCADE");
    $this->addForeignKey("fk_{{pt_trans}}_partner", "{{pt_trans}}", "partner_id", "{{pt_partner}}", "id", "CASCADE", "CASCADE");
  }

  public function safeDown()
  {
    $this->dropTable("{{pt_trans}}");
  }
}