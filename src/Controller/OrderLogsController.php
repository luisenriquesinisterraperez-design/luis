<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;

/**
 * OrderLogs Controller
 *
 * @property \App\Model\Table\OrderLogsTable $OrderLogs
 */
class OrderLogsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->OrderLogs->find()
            ->contain(['Users'])
            ->orderBy(['OrderLogs.created' => 'DESC']);
        
        $orderLogs = $this->paginate($query);

        $this->set(compact('orderLogs'));
    }
}
