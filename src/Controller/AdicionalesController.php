<?php
declare(strict_types=1);

namespace App\Controller;

class AdicionalesController extends AppController
{
    public function index()
    {
        $adicionales = $this->Adicionales->find()
            ->orderBy(['name' => 'ASC'])
            ->all();

        if ($this->request->is('post')) {
            $adicional = $this->Adicionales->newEmptyEntity();
            $adicional = $this->Adicionales->patchEntity($adicional, $this->request->getData());
            if ($this->Adicionales->save($adicional)) {
                $this->Flash->success(__('Adicional guardado.'));
            } else {
                $msg = 'No se pudo guardar.';
                $errors = $adicional->getErrors();
                if (!empty($errors)) {
                    $flat = [];
                    array_walk_recursive($errors, function ($v) use (&$flat) {
                        $flat[] = $v;
                    });
                    $msg .= ' ' . implode(' | ', $flat);
                }
                $this->Flash->error(__($msg));
            }

            return $this->redirect(['action' => 'index']);
        }

        $this->set(compact('adicionales'));
    }

    public function edit($id = null)
    {
        $adicional = $this->Adicionales->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adicional = $this->Adicionales->patchEntity($adicional, $this->request->getData());
            if ($this->Adicionales->save($adicional)) {
                $this->Flash->success(__('Adicional actualizado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo actualizar.'));
        }
        $this->set(compact('adicional'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $adicional = $this->Adicionales->get($id);
        if ($this->Adicionales->delete($adicional)) {
            $this->Flash->success(__('Adicional eliminado.'));
        } else {
            $this->Flash->error(__('No se pudo eliminar.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
