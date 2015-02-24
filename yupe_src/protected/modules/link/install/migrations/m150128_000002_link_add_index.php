<?php

class m150128_000002_link_add_index extends yupe\components\DbMigration
{
    public function safeUp()
    {
        $this->createIndex("ux_{{link_links}}_code", '{{link_links}}', "code", true);
    }

    public function safeDown()
    {
        $this->dropIndex("ux_{{link_links}}_code",'{{link_links}}');
    }
}
