<?php
declare(strict_types=1);

namespace App\Controller;

class ExpensesController extends AppController
{
    public function index()
    {
        $query = $this->Expenses->find()->orderBy(['date' => 'DESC']);
        $expenses = $this->paginate($query);
        $this->set(compact('expenses'));
    }

    public function add()
    {
        $expense = $this->Expenses->newEmptyEntity();
        if ($this->request->is('post')) {
            $expense = $this->Expenses->patchEntity($expense, $this->request->getData());
            if ($this->Expenses->save($expense)) {
                $this->Flash->success(__('Gasto registrado.'));
            } else {
                $this->Flash->error(__('No se pudo registrar el gasto.'));
            }
        }
        return $this->redirect(['action' => 'index']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $expense = $this->Expenses->get($id);
        if ($this->Expenses->delete($expense)) {
            $this->Flash->success(__('Gasto eliminado.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
