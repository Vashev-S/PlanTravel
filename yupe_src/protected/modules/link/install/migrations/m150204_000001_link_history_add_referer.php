<?php

class m150204_000001_link_history_add_referer extends yupe\components\DbMigration
{
    public function safeUp()
    {
        $this->addColumn('{{link_history}}', 'referrer', 'varchar(255)');
    }

    public function safeDown()
    {
        $this->dropColumn('{{link_history}}', 'referrer');
    }
}
