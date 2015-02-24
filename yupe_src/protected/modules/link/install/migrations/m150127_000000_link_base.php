<?php

class m150127_000000_link_base extends yupe\components\DbMigration
{
    public function safeUp()
    {
        $this->createTable(
            "{{link_links}}",
            [
                "id" => "pk",
                "url" => "varchar(255) not null default ''",
                "code" => "varchar(255) not null",
                "data" => "varchar(255)",
                "type" => "tinyint not null default '0'",
            ],
            $this->getOptions()
        );
    }

    public function safeDown()
    {
        $this->dropTable("{{link_links}}");
    }
}
