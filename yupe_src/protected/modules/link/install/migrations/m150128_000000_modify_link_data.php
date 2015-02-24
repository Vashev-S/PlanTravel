<?php

class m150128_000000_modify_link_data extends CDbMigration
{
    public function safeUp()
    {
        $this->alterColumn("{{link_links}}", 'data', 'text');
    }

    public function safeDown()
    {
        $this->alterColumn("{{link_links}}", 'data', 'varchar(255)');
    }
}
