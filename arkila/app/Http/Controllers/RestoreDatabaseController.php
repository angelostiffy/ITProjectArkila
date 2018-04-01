<?php

namespace App\Http\Controllers;
use BackupManager\Manager;

class RestoreDatabaseController extends Controller{
    protected $manager;


    public function __construct(Manager $manager) {
        $this->manager = $manager;
    }

    public function restoreDatabase() {
        $this->manager->makeRestore()->run('local', '/database-backup/arkilaBackup2018_04_01', 'mysql', 'null');
    }
}
