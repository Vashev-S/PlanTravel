<?php

class m150127_000001_link_add_dataurl extends yupe\components\DbMigration
{
    public function safeUp()
    {
        $this->addColumn('{{link_links}}', 'data_url', 'varchar(255)');
    }

    public function safeDown()
    {
        $this->dropColumn('{{link_links}}', 'data_url');
    }
}
