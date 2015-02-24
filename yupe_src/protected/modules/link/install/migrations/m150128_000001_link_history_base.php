<?php

class m150128_000001_link_history_base extends yupe\components\DbMigration
{
    public function safeUp()
    {
        $this->createTable(
            "{{link_history}}",
            [
                "id" => "pk",
                "link_id" => 'integer NOT NULL',
                "link_code" => "varchar(255) not null",
                "link_info" => "text",
                'ip'      => 'varchar(50) NOT NULL',
                'visit'   => 'datetime DEFAULT NULL',
            ],
            $this->getOptions()
        );

        $this->createIndex("ix_{{link_history}}_link_id", '{{link_history}}', "link_id", false);
    }

    public function safeDown()
    {
        $this->dropTable('{{link_history}}');
    }
}
